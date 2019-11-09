<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Gallery::all();
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
        $gallery = new Gallery;
        

        $gallery->id_school=$request->id_school;

        //

        

        $gallery->image=$request->image;

        if($gallery->save()){
            
            $path = Storage::disk('public')->put('images/school_gallery/'.$gallery->id.".".$request->type,base64_decode($request->content));

            //$gallery->image = public_path().'/images/school_gallery/'.$gallery->id.".".$request->type;
            
            $update = Gallery::where('id_gallery',$gallery->id)
                        ->update([
                            'image'=>'http://localhost/~mugi-ya/respaldo-laravel/public/images/school_gallery/'.$gallery->id.".".$request->type
                        ]);

            return response()->json([
                'success'=>true,
                'data' => 'http://localhost/~mugi-ya/respaldo-laravel/public/images/school_gallery/'.$gallery->id.".".$request->type
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
        $gallery = Gallery::where('id_gallery', $id)->get();
        if($gallery->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$gallery
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
        $delete = Gallery::where('id_gallery',$id)->delete();
        if($delete){
            return response()->json([
                'success'=>true
            ]);
        }
        return response()->json([
            'success'=>false
        ]);
    }
}
