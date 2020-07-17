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
        $data=tbl_reserva::all();
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
        $tbl_reserva->estado_pago=true;
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
        $data = array("reserva"=>$tbl_reserva,"servicio"=>$tbl_servicio);
        return response()->json([
            "status"=>true,
            "object"=>$data,
        ]);
    }
}
