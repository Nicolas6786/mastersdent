<?php

namespace App\Http\Controllers;

use App\tbl_historial;
use Illuminate\Http\Request;

class TblHistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tbl_historial::all();
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
        $nombres=$request->input('nombres');
        $apellidos=$request->input('apellios');
        $fecha_nac=$request->input('fecha_nac');
        $direccion=$request->input('direccion');
        $observacion=$request->input('observacion');
        $antecedente=$request->input('antecedente');
        $alergia=$request->input('alergia');
        $ocupacion=$request->input('ocupacion');
        $embarazo=$request->input('embarazo');
        $diagnostico=$request->input('diagnostico');
        $auxiliar=$request->input('auxiliar');
        $presupuesto=$request->input('presupuesto');
        $adelanto=$request->input('adelanto');
        $fecha=$request->input('fecha');
        $doctor=$request->input('doctor_id');
        $tbl_historial=new tbl_reserva;
        $tbl_historial->fecha=$fecha;
        $tbl_historial->nombres_paciente=$nombres;
        $tbl_historial->apellidos_paciente=$apellios;
        $tbl_historial->fecha_nac=$fecha_nac;
        $tbl_historial->observacion=$observacion;
        $tbl_historial->antecedentes=$antecedente;
        $tbl_historial->alergias=$alergia;
        $tbl_historial->ocupacion=$ocupacion;
        $tbl_historial->embarazo=$embarazo;
        $tbl_historial->direccion=$direccion;
        $tbl_historial->diagnostico=$diagnostico;
        $tbl_historial->examen_auxiliar=$auxiliar;
        $tbl_historial->presupuesto=$presupuesto;
        $tbl_historial->adelanto=$adelanto;
        $tbl_historial->doctor_id=$doctor_id;
        $tbl_historial->save();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_historial
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tbl_historial  $tbl_historial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbl_historial=tbl_historial::find($id);
        return response()->json([
            "status"=>true,
            "object"=>$tbl_historial
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tbl_historial  $tbl_historial
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_historial $tbl_historial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tbl_historial  $tbl_historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tbl_historial=tbl_historial::find($id);
        $tbl_historial->fecha=$request->input("fecha");
        $tbl_historial->nombres_paciente=$request->input("nombres");
        $tbl_historial->apellidos_paciente=$request->input("apellidos");
        $tbl_historial->fecha_nac=$request->input("fecha_nac");
        $tbl_historial->observacion=$request->input("observacion");
        $tbl_historial->antecedentes=$request->input("antecedente");
        $tbl_historial->alergias=$request->input("alergia");
        $tbl_historial->direccion=$request->input("direccion");
        $tbl_historial->ocupacion=$request->input("ocupacion");
        $tbl_historial->embarazo=$request->input("embarazo");
        $tbl_historial->diagnostico=$request->input("diagnostico");
        $tbl_historial->examen_auxiliar=$request->input("auxiliar");
        $tbl_historial->presupuesto=$request->input("presupuesto");
        $tbl_historial->adelanto=$request->input("adelanto");
        $tbl_historial->update();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_historial
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbl_historial  $tbl_historial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tbl_historial=tbl_historial::find($id);
        $tbl_historial->delete();
    }
}
