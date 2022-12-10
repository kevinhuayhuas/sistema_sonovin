<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\DominioVencido;
use App\Mail\DominioSuspendido;
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
    protected $signature = 'dominios:renovar';

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
        /*
        $resultado->first() // Si es null es porque está vacío
        $resultado->isEmpty() // true o false
        $resultado->count() // La cantidad de elementos
        count($resultado) // La cantidad de elementos
        */
        $dominios = DB::table('dominios')
                    ->select('dominios.*', 'clientes.*')
                    ->join('clientes', 'clientes.id', '=', 'dominios.cliente_id')
                    ->orderBy('expira','desc')->get();
        $arrayDominios=$dominios;
        //capturar la fecha actual
        $fecha=Carbon::now();
        //darle formato a la fecha
        $hoy=$fecha->format('Y-m-d');
        //crear una coleccion o array
        $dominiosPorVencer=collect();
        //recorrer los dominios
        $dominiosSuspendidos=collect();
        foreach($arrayDominios as $dominio){
            //calcular los dias que falten para vencer
            $fechaExpiracion = Carbon::parse($dominio->expira);
            if($hoy < $fechaExpiracion){
                $diasDiferencia = $fechaExpiracion->diffInDays($hoy);
                //agregamos el valor de los dias que faltan por vencer
                $dominio->dias_restantes=$diasDiferencia;
                if($diasDiferencia <= 7 && $diasDiferencia >= 1){
                    $dominiosPorVencer->push($dominio);
                }
            }elseif($hoy > $fechaExpiracion){
                $dominiosSuspendidos->push($dominio);
            }
        }
        //Enviar correo
        if (count($dominiosPorVencer)>0){
            Mail::to([ 'kevinene.hc@gmail.com' , 'forzaken.mg@hotmail.com'])->send(new DominioVencido($dominiosPorVencer));
        }
        if(count($dominiosSuspendidos)>0){
            //Mail::to([ 'kevinene.hc@gmail.com' , 'forzaken.mg@hotmail.com'])->send(new DominioSuspendido($dominiosSuspendidos));
        }
    }
}
