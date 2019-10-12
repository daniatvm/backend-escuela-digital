<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Access_Type;

class Access_TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $access_type = new Access_Type;
        $access_type->name=$request->name;
        $access_type->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bar_post(Request $request)
    {
        $data = ['id_user'=>1,'id_employee'=>1,'id_access_type'=>1,'username'=>$request->username];
        if ($request->username == 'admin' && $request->password == 'admin') {
            return response()->json([
                'success'=>true,
                'data'=>json_encode($data)
            ]);
        } else {
            return response()->json([
                'success'=>false
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bar($id)
    {
        $data = [
            'name'=>'Escuela República Dominicana',
            'description'=>'La escuela es una de las instituciones más importantes en la vida de una persona, quizás también una de las primordiales luego de la familia.',
            'lat'=> 9.911337,
            'lng'=> -84.056983,
            'address'=> 'San Francisco de dos Ríos.',
            'image'=> '',
            'email'=> 'escuelarepublicadominicana@yahoo.es',
            'cellphone'=> '7525-3654',
            'telephone'=> '2536-5145'
        ];
        return response()->json([
            'success'=>true,
            'data'=>json_encode($data)
        ]);
    }
    public function show($id)
    {
        return Access_Type::where('id_access_type', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bar_update(Request $request, $id)
    {
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
