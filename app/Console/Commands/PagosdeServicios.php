<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\MailPagosDeServicios;
use DB;
use Mail;
use Carbon\Carbon;

class PagosdeServicios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pagos:servicios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Estos son los pagos de servicios por hacer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {       
            $diasprevios = 7;
            //actualizar el estado segun la fecha de hoy
            $this->verificarFacturassVencidas();
            //Consultamos la base de datos
            $cronogramas = DB::table('cronogramas')
            ->select('cronogramas.*', 'pagos.*')
            ->join('pagos', 'pagos.id', '=', 'cronogramas.gasto_id')
            ->orderBy('fecha_vencimiento','asc')->get();
            $arrayCronogramas=$cronogramas;
            //capturar la fecha actual
            $fecha=Carbon::now();
            //darle formato a la fecha
            $hoy=$fecha->format('Y-m-d');
            //crear nueva colleccion
            $facturasPorPagar=collect();
            $facturasVencidas=collect();
            foreach ($arrayCronogramas as $cronograma) {
                $fechaVencimiento = Carbon::parse($cronograma->fecha_vencimiento);
                if ($hoy < $fechaVencimiento) {
                    $diasDiferencia = $fechaVencimiento->diffInDays($hoy);
                    if($diasDiferencia >= 0 && $diasDiferencia <= $diasprevios){
                        //agregamos el valor de los dias que faltan por vencer
                        $cronograma->dias_restantes=$diasDiferencia;
                        $facturasPorPagar->push($cronograma);
                    }
                }elseif($hoy > $fechaVencimiento){
                    $facturasVencidas->push($cronograma);
                }
            }
        //Enviar correo
        if(count($facturasPorPagar)>0 || count($facturasVencidas)>0){
            Mail::to([ 'kevin.huayhuas@gmail.com' , 'forzaken.mg@hotmail.com'])->send(new MailPagosDeServicios($facturasPorPagar,$facturasVencidas));
        }

    }
    public function verificarFacturassVencidas(){
        $hoy = new Carbon();
        DB::table('cronogramas')->where("fecha_vencimiento","<", $hoy->format('Y-m-d'))->where("estado","!=","1")->update(["estado"=>2]);
    }
}
