<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Dominio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;


class DominioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dominios = DB::table('dominios')->get();
        $arrayDominios=$dominios;
        //capturar la fecha actual
        $fecha=Carbon::now();
        //darle formato a la fecha
        $hoy=$fecha->format('Y-m-d');
        //crear una coleccion o array
        $dominiosPorVencer=collect();
        //recorrer los dominios
        foreach($arrayDominios as $dominio){
            //calcular los dias que falten para vencer
            $fechaExpiracion = Carbon::parse($dominio->expira);
            $diasDiferencia = $fechaExpiracion->diffInDays($hoy);
            //agregamos el valor de los dias que faltan por vencer
            $dominio->dias_restantes=$diasDiferencia;
            if($diasDiferencia<=7){
                $dominiosPorVencer->push($dominio);
            }
        }
        return view('dominio', compact('arrayDominios','dominiosPorVencer'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function show(Dominio $dominio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function edit(Dominio $dominio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dominio $dominio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dominio $dominio)
    {
        //
    }
}
