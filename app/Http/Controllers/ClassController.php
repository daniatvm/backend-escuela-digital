<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class_Room;
use App\Class_x_Employee;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Class_Room::where('status',1)->get();
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
        $class = new Class_Room;
        $class->id_level=$request->id_level;
        $class->name=$request->name;
        $class->status=1;
        if($class->save()){
            $class_x_employee = new Class_x_Employee;
            $class_x_employee->id_class=$class->id;
            $class_x_employee->id_employee=$request->id_employee;
            $class_x_employee->type=$request->type;
            if($class_x_employee->save()){
                return response()->json([
                    'success'=>true
                ]);
            }
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
        $class = Class_Room::where('id_class', $id)->get();
        if($class->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$class
        ]);
    }

    public function byEmployee($id)
    {
        $classes = Class_x_Employee::join('class','class_x_employee.id_class','=','class.id_class')->select('class.id_level','class.id_class','class.name','class_x_employee.id_class_x_employee')->where('class_x_employee.id_employee',$id)->where('status',1)->get();
        if($classes->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$classes
        ]);
    }

    public function byNotEmployee($id)
    {
        $notClasses = Class_x_Employee::join('class','class_x_employee.id_class','=','class.id_class')->select('class.id_class')->where('class_x_employee.id_employee',$id)->get();
        if($notClasses->isEmpty()){
            $classes = Class_Room::select('id_level','id_class','name')->where('status',1)->get();
            if(!$classes->isEmpty()){
                return response()->json([
                    'success'=>true,
                    'data'=>$classes
                ]);
            }
        }else{
            
            $classes = Class_Room::select('id_level','id_class','name')->whereNotIn('id_class',$notClasses->pluck('id_class'))->where('status',1)->get();
            if(!$classes->isEmpty()){
                return response()->json([
                    'success'=>true,
                    'data'=>$classes
                ]);
            }
        }
        return response()->json([
            'success'=>false
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Class_Room::where('id_class',$id)->update($request->all());
        if($update){
            return response()->json([
                'success'=>true
            ]);
        }
        return response()->json([
            'success'=>false
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
        $update = Class_Room::where('id_class',$id)->update(['status'=>0]);
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
