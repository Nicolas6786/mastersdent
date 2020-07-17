<?php

namespace App\Http\Controllers;

use App\tbl_servicio;
use Illuminate\Http\Request;

class TblServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tbl_servicio::all();
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
        $nombre=$request->input('name');
        $price=$request->input('price');
        $description=$request->input('description');
        $image=$request->input('image');
        $tbl_servicio=new tbl_servicio;
        $tbl_servicio->nombre=$nombre;
        $tbl_servicio->price=$price;
        $tbl_servicio->image=$image;
        $tbl_servicio->description=$description;
        $tbl_servicio->save();
        return response()->json([
            "status"=>true,
            "object"=>$tbl_servicio
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tbl_servicio  $tbl_servicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=tbl_servicio::find($id);
        return response()->json([
            "status"=>true,
            "object"=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tbl_servicio  $tbl_servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_servicio $tbl_servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tbl_servicio  $tbl_servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_servicio $tbl_servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbl_servicio  $tbl_servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_servicio $tbl_servicio)
    {
        //
    }
}
