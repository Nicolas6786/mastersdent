<?php

namespace App\Http\Controllers;

use App\tbl_doctor;
use App\User;
use Illuminate\Http\Request;

class TblDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tbl_doctor::all();
        return response()->json([
            "status"=>true,
            "objects"=>$data
        ]); 
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
        //$email=$request->input('email');
        //$password=$request->input('password');
        //$user=new User;
        //$user->email=$email;
        //$user->password=$password;
        //$user->tipo=true;
        //$user->save();
        //$user_id=$user->id;
        //$nombres=$request->input('nombres_doctor');
        //$apellidos=$request->input('apellidos_doctor');
        //$telefono=$request->input('telefono_doctor');
        //$dni=$request->input('dni');
        //$doctor=new tbl_doctor;
        //$doctor->nombres_doctor=$nombres;
        //$doctor->apellidos_doctor=$apellidos;
        //$doctor->telefono_doctor=$telefono;
        //$doctor->dni_doctor=$dni;
        //$doctor->user_id=$user_id;
        //$doctor->estado=true;
        //$doctor->save();
        //return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tbl_doctor  $tbl_doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=tbl_doctor::find($id);
        $usuario=User::find($data->user_id);
        $todo=array("doctor"=>$data,"user"=>$usuario);
        return response()->json([
            "status"=>true,
            "object"=>$todo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tbl_doctor  $tbl_doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_doctor $tbl_doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tbl_doctor  $tbl_doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_doctor $tbl_doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbl_doctor  $tbl_doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_doctor $tbl_doctor)
    {
        //
    }
}
