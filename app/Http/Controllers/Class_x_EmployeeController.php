<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class_x_Employee;

class Class_x_EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Class_x_Employee::all();
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
        $class_x_employee = new Class_x_Employee;
        $class_x_employee->id_class=$request->id_class;
        $class_x_employee->id_employee=$request->id_employee;
        $class_x_employee->type=$request->type;
        if($class_x_employee->save()){
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
        $class_x_employee = Class_x_Employee::where('id_class_x_employee', $id)->get();
        if($class_x_employee->isEmpty()){
            return response()->json([
                'success'=>false
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$class_x_employee
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
