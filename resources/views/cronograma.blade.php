@extends('layouts.app')
@section('content')
    @php
        $dia = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        $mes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    @endphp
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#nuevoDominio"><i class="fa fa-plus-square" aria-hidden="true"></i> Generar Cronograma
                        </button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">Facturas Vencidas</div>
                    <div class="card-body">
                        <p class="text-center" style="font-size:20px;">{{ $facturasVencias }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">Facturas Pagadas</div>
                    <div class="card-body">
                        <p class="text-center" style="font-size:20px;">{{ $facturasPagadas }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">Facturas Por Pagar</div>
                    <div class="card-body">
                        <p class="text-center" style="font-size:20px;">{{ $facturasPorPagar }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cronograma del año : {{Carbon\Carbon::parse(new \Carbon\Carbon())->format('Y')}}</div>
                    <div class="card-body">
                        <table class="table table-hove">
                            <thead>
                                <th>N°</th>
                                <th>Servicio</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                    $codigo=null;
                                    // evitar que devuelva cero 
                                    $listCodigos = collect('primer valor');
                                @endphp
                                @foreach ($cronogramas as $cronograma)
                                            @php
                                                //eliminar espacios
                                                $codigo = trim($cronograma->codigo_pago);
                                                $buscar = $listCodigos->search($codigo,true);
                                            @endphp

                                        @if ($buscar)
                                                
                                        @else
                                            @php
                                                $listCodigos->push($codigo);
                                            @endphp
                                                <tr>
                                                    <td>
                                                        {{ $count." no existe"}} 
                                                    <td>
                                                        {{ $cronograma->nombre_pago }}
                                                    </td>
                                                    <td class="enero">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 1)
                                                            {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="febrero">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 2)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="marzo">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 3)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="abril">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 4)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="mayo">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 5)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                    @else
                                                        {{ "----" }}
                                                    @endif
                                                    </td>
                                                    <td class="junio">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 6)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="julio">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 7)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="agosto">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 8)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="septiembre">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 9)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="octubre">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 10)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="noviembre">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 11)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    <td class="diciembre">
                                                        @if (Carbon\Carbon::parse($cronograma->fecha_vencimiento )->format('m') == 12)
                                                        {{ $cronograma->fecha_vencimiento }}
                                                        @else
                                                            {{ "----" }}
                                                        @endif
                                                    </td>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                </tr>
                                        @endif

                                @endforeach
                             </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Fecha de hoy :
                        @php
                            $fechahoy = new \Carbon\Carbon();
                            $numeroDia = Carbon\Carbon::parse($fechahoy)->format('w');
                            $numeroDiaMes = Carbon\Carbon::parse($fechahoy)->format('d');
                            $year = Carbon\Carbon::parse($fechahoy)->format('Y');
                            $numeroMes = Carbon\Carbon::parse($fechahoy)->format('m');
                        @endphp
                        @if ($numeroDia == 0)
                            @php
                                //si es 0 el dia es domingo
                                $numeroDia = 7;
                            @endphp
                        @endif
                        <strong>{{ $dia[$numeroDia - 1] . ' ' . $numeroDiaMes . ' - ' . $mes[$numeroMes - 1] . ' - ' . $year }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($cronogramas as $cronograma)
                                        <tr>
                                            <td>
                                                {{ $count }}
                                            </td>
                                            <td>
                                                {{ $cronograma->nombre_pago }}
                                            </td>
                                            <td>
                                                {{ $cronograma->entidad }}
                                            </td>
                                            <td>
                                                <strong>{{ $cronograma->codigo_pago }}</strong>
                                            </td>
                                            <td>
                                                @if ($cronograma->fecha_facturacion == '0000-00-00')
                                                    <p>sin factura</p>
                                                @else
                                                    @php
                                                        $numeroDia = Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('w');
                                                        $numeroDiaMes = Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('d');
                                                        $year = Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('Y');
                                                        $numeroMes = Carbon\Carbon::parse($cronograma->fecha_facturacion)->format('m');
                                                    @endphp
                                                    @if ($numeroDia == 0)
                                                        @php
                                                            //si es 0 el dia es domingo
                                                            $numeroDia = 7;
                                                        @endphp
                                                    @endif
                                                    {{ $numeroDiaMes . ' - ' . $mes[$numeroMes - 1] . ' - ' . $year }}
                                                @endif
                                            </td>
                                            <td>

                                                @php
                                                    $numeroDia = Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('w');
                                                    $numeroDiaMes = Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('d');
                                                    $year = Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('Y');
                                                    $numeroMes = Carbon\Carbon::parse($cronograma->fecha_vencimiento)->format('m');
                                                @endphp
                                                @if ($numeroDia == 0)
                                                    @php
                                                        //si es 0 el dia es domingo
                                                        $numeroDia = 7;
                                                    @endphp
                                                @endif
                                                {{ $numeroDiaMes . ' - ' . $mes[$numeroMes - 1] . ' - ' . $year }}
                                            </td>
                                            <td>
                                                <strong>S/ {{ number_format($cronograma->importe_total, 2) }}</strong>
                                            </td>
                                            <td>
                                                @if ($cronograma->estado == 1)
                                                    <p class="text-success">
                                                        <strong>PAGADO</strong></p>
                                                @elseif($cronograma->estado == 0)
                                                    <p
                                                    class="text-warning">
                                                        <strong>PENDIENTE</strong></p>
                                                @elseif($cronograma->estado == 2)
                                                    <p
                                                    class="text-danger">
                                                        <strong>SIN PAGAR</strong></p>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-info" type="button" data-bs-target="#verDetalle"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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


    </div>
@endsection
