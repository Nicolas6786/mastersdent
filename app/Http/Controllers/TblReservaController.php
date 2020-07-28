<?php

namespace App\Http\Controllers;

use App\tbl_reserva;
use App\tbl_servicio;
use App\tbl_cliente;
use Illuminate\Http\Request;

class TblReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $date = date('Y-m-d');
        $date2= date("Y-m-d",strtotime($date."+ 2 days"));
        $data=tbl_reserva::select("*")->
        whereBetween("fecha",[$date,$date2])->get();
        return response()->json([
            "status"=>true,
            "objects"=>$data
        ]);
    }

    public function index_cliente()
    {
        $credentials=request(['id']);
        $data=tbl_reserva::select("*")->where("cliente_id",$credentials)->get();
        return response()->json([
            "status"=>true,
            "objects"=>$data
        ]);
    }

    public function index_cambio()
    {
        $data=tbl_reserva::select("*")->where("cambio",true)->get();
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
        $fecha=$request->input('fecha');
        $hora=$request->input('hora');
        $monto=$request->input('monto');
        $servicio=$request->input('service_id');
        $cliente=$request->input('client_id');
        $tbl_reserva=new tbl_reserva;
        $tbl_reserva->fecha=$fecha;
        $tbl_reserva->hora=$hora;
        $tbl_reserva->monto=$monto;
        $tbl_reserva->estado=true;
        $tbl_reserva->cambio=false;
        $tbl_reserva->cliente_id=$cliente;
        $tbl_reserva->servicio_id=$servicio;
        $tbl_reserva->save();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_reserva
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\tbl_reserva  $tbl_reserva
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbl_reserva=tbl_reserva::find($id);
        $tbl_cliente=tbl_cliente::find($tbl_reserva->cliente_id);
        $tbl_servicio=tbl_servicio::find($tbl_reserva->servicio_id);
        $data=array("reserva"=>$tbl_reserva,"cliente"=>$tbl_cliente,"servicio"=>$tbl_servicio);
        return response()->json([
            "status"=>true,
            "object"=>$data
        ]);
    }
    public function existencia()
    {
        $hora=request(['hora']);
        $fecha=request(['fecha']);
        $tbl_reserva=tbl_reserva::select("id")
        ->where("fecha",$fecha)
        ->where("hora",$hora)
        ->where("estado",true)->get();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_reserva
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tbl_reserva  $tbl_reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_reserva $tbl_reserva)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tbl_reserva  $tbl_reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tbl_reserva=tbl_reserva::find($id);
        $tbl_reserva->fecha=$request->input("fecha");
        $tbl_reserva->hora=$request->input("hora");
        $tbl_reserva->monto=$request->input("monto");
        $tbl_reserva->estado=$request->input("estado");
        $tbl_reserva->estado_pago=$request->input("cambio");
        $tbl_reserva->servicio_id=$request->input("servicio");
        $tbl_reserva->update();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_reserva
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbl_reserva  $tbl_reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tbl_reserva=tbl_reserva::find($id);
        $tbl_reserva->delete();
    }
    public function show_edit()
    {
        $credentials=request(['id']);
        $tbl_reserva=tbl_reserva::find($credentials);
        $tbl_servicio=tbl_servicio::all();
        $data = array("reserva"=>$tbl_reserva[0],"servicio"=>$tbl_servicio);
        return response()->json([
            "status"=>true,
            "object"=>$data,
        ]);
    }
}
