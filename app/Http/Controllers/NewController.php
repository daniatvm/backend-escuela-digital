<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = News::where('status',1)->get();
        if($all->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$all
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new News;
        $new->id_new_type=$request->id_new_type;
        $new->id_user=$request->id_user;
        $new->id_class=$request->id_class;
        $new->title=$request->title;
        $new->description=$request->description;
        $new->date=$request->date;
        $new->image=$request->image;
        $new->status=1;
        if($new->save()){
            return response()->json([
                'success'=>true
            ]);
        }
        return response()->json([
            'success'=>false
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::where('id_new', $id)->where('status',1)->get();
        if($new->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$new
        ]);
    }

    public function byNewType($id){
        $news = News::where('id_new_type',$id)->where('status',1)->get();
        if($news->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$news
        ]);
    }

    public function byUser($id){
        $news = News::where('id_user',$id)->where('status',1)->get();
        if($news->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$news
        ]);
    }

    public function byClass($id){
        $news = News::where('id_class',$id)->where('status',1)->get();
        if($news->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$news
        ]);
    }

    public function bySpecific($id1,$id2,$id3)
    {
        $new = News::join('user','new.id_user','=','user.id_user')->join('employee','employee.id_employee','=','user.id_employee')->join('class','class.id_class','=','new.id_class')->select('employee.name','employee.last_name','employee.second_last_name','class.name as class_name','new.*')->where('new.id_user',$id1)->where('new.id_new_type',$id2)->where('new.id_class',$id3)->get();
        if($new->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$new
        ]);
    }

    public function byGeneral($id1,$id2)
    {
        $new = News::where('id_user',$id1)->where('id_new_type',$id2)->get();
        if($new->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$new
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update = News::where('id_new',$id)->update(['status'=>0]);
        if($update){
            return response()->json([
                'success'=>true
            ]);
        }
        return response()->json([
            'success'=>false
        ]);
    }
}
