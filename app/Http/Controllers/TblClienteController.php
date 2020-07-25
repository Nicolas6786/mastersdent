<?php

namespace App\Http\Controllers;

use App\tbl_cliente;
use App\User;
use Illuminate\Http\Request;
use Hash;

class TblClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tbl_cliente::all();
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
        $email=$request->input('email');
        $password=Hash::make($request->input('password'));
        //guardar datos
        $user=new User;
        $user->email=$email;
        $user->password=$password;
        $user->tipo=false;
        //crear usuario
        $user->save();
        //capturar id
        $user_id=$user->id;
        $nombres=$request->input('nombres_cliente');
        $apellidos=$request->input('apellidos_cliente');
        $telefono=$request->input('telefono_cliente');
        $fecha_nac=$request->input('fecha_nac');
        $cliente=new tbl_cliente;
        //guardar datos
        $cliente->nombres_cliente=$nombres;
        $cliente->apellidos_cliente=$apellidos;
        $cliente->telefono_cliente=$telefono;
        $cliente->fecha_nac=$fecha_nac;
        $cliente->user_id=$user_id;
        //crear cliente
        $cliente->save();
        return response()->json([
            "status"=>true,
            "object"=>$cliente
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tbl_cliente  $tbl_cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=tbl_cliente::find($id);
        $usuario=User::find($data->user_id);
        $todo=array("client"=>$data,"user"=>$usuario);
        return response()->json([
            "status"=>true,
            "object"=>$todo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tbl_cliente  $tbl_cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_cliente $tbl_cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tbl_cliente  $tbl_cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tbl_cliente=tbl_cliente::find($id);
        $tbl_cliente->nombres_cliente=$request->input("name");
        $tbl_cliente->apellidos_cliente=$request->input("last_name");
        $tbl_cliente->fecha_nac=$request->input("fecha_nac");
        $tbl_cliente->telefono_cliente=$request->input("telefono");
        $tbl_cliente->update();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_doctor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbl_cliente  $tbl_cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_cliente $tbl_cliente)
    {
        //
    }
    public function user_client()
    {
        $credentials=request(['email']);
        $user=User::select("*")->where('email',$credentials)->get();
        return response()->json([
            "status"=>true,
            "object"=>$user[0]
        ]);
    }
    public function traer_client()
    {
        $credentials=request(['id']);
        $tbl_cliente=tbl_cliente::select("*")->where('user_id',$credentials)->get();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_cliente[0]
        ]);
    }
    public function show_cliente()
    {
        $nombres=request(['nombres']);
        $apellidos=request(['apellidos']);
        $data=tbl_cliente::select("*")->
        where("nombres_cliente",$nombres)->
        where("apellidos_cliente",$apellidos)->get();
        return response()->json([
            "status"=>true,
            "objects"=>$data
        ]);
    }
}
