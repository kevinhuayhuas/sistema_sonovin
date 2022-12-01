<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\DominioVencido;
use DB;
use Mail;
use Carbon\Carbon;

class DominiosPorVencer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dominios:porvencer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Estos son los dominios que estan por vencer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
                Mail::to([ 'kevinene.hc@gmail.com' , 'forzaken.mg@hotmail.com'])->send(new dominiovencido($dominio));
            }
        }
    }
}
