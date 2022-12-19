@extends('layouts.app')
@section('content')
@php

   $dia = array("Lunes", "Martes","Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
   $mes =  array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");                 
@endphp
<div class="container">
     <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">Facturas Vencidas</div>
                <div class="card-body">
                    <p class="text-center" style="font-size:20px;">{{$facturasVencias}}</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Facturas Pagadas</div>
                <div class="card-body">
                    <p class="text-center" style="font-size:20px;">{{$facturasPagadas}}</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Facturas Por Pagar</div>
                <div class="card-body">
                    <p class="text-center" style="font-size:20px;">{{$facturasPorPagar}}</p>
                </div>
            </div>
        </div>
     </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Fecha de hoy : 
                    @php
                        $fechahoy = new \Carbon\Carbon();
                        $numeroDia = Carbon\Carbon::parse($fechahoy)->format('w');
                        $numeroDiaMes= Carbon\Carbon::parse($fechahoy)->format('d');
                        $year= Carbon\Carbon::parse($fechahoy)->format('Y');
                        $numeroMes = Carbon\Carbon::parse($fechahoy)->format('m');
                    @endphp
                    @if ($numeroDia == 0)
                        @php
                            //si es 0 el dia es domingo
                            $numeroDia =7
                        @endphp
                    @endif
                    <strong>{{$dia[$numeroDia-1]." ".$numeroDiaMes." - ".$mes[$numeroMes-1]." - ".$year}}</strong>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                N°
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Entidad
                            </th>
                            <th>
                                Codigo de Pago 
                            </th>
                            <th>
                                Fecha de facturacion  
                            </th>
                            <th>
                                Fecha de Vencimiento  
                            </th>
                            <th>
                                Importe Total
                            </th>
                            <th>
                                Estado
                            </th>
                        </thead>
                        <tbody>
                                @php
                                $count=1;
                                @endphp
                            @foreach ($cronogramas as $cronograma)
                                <tr>
                                    <td>
                                        {{$count}}
                                    </td>
                                    <td>
                                        {{$cronograma->nombre_pago}}
                                    </td>
                                    <td>
                                        {{$cronograma->entidad}}
                                    </td>
                                    <td>
                                        <strong>{{$cronograma->codigo_pago}}</strong>
                                    </td>
                                    <td>
                                        @if ($cronograma->fecha_facturacion == "0000-00-00")
                                            <p>sin factura</p>
                                        @else
                                            @php
                                                $numeroDia = Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('w');
                                                $numeroDiaMes= Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('d');
                                                $year= Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('Y');
                                                $numeroMes = Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('m');
                                            @endphp
                                            @if ($numeroDia == 0)
                                                @php
                                                    //si es 0 el dia es domingo
                                                    $numeroDia =7
                                                @endphp
                                            @endif
                                        {{$numeroDiaMes." - ".$mes[$numeroMes-1]." - ".$year}}
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @php
                                            $numeroDia = Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('w');
                                            $numeroDiaMes= Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('d');
                                            $year= Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('Y');
                                            $numeroMes = Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('m');
                                        @endphp
                                        @if ($numeroDia == 0)
                                            @php
                                                //si es 0 el dia es domingo
                                                $numeroDia =7
                                            @endphp
                                        @endif
                                        {{$numeroDiaMes." - ".$mes[$numeroMes-1]." - ".$year}}
                                    </td>
                                    <td>
                                        <strong>S/ {{number_format($cronograma->importe_total,2)}}</strong>
                                    </td>
                                    <td>
                                        @if ($cronograma->estado==1)
                                            <p style="background-color: rgb(1, 138, 1); text-align: center; color: white;"><strong>PAGADO</strong></p>
                                        @elseif($cronograma->estado==0)
                                            <p style="background-color: rgb(255, 187, 0); text-align: center; color: rgb(0, 0, 0);"><strong>PENDIENTE</strong></p>
                                        @elseif($cronograma->estado==2)
                                        <p style="background-color: rgb(212, 2, 2); text-align: center; color: rgb(255, 255, 255);"><strong>SIN PAGAR</strong></p>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                $count++;
                                @endphp
                            @endforeach
                    
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


</div>

@endsection

