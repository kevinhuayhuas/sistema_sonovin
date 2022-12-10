@extends('layouts.app')
@section('content')
<table class="table table-hover">
<thead>
    <th>
        N°
    </th>
    <th>
        Cliente
    </th>
    <th>
        Dominio
    </th>
    <th>
        Registro 
    </th>
    <th>
        Actualizacion 
    </th>
    <th>
        Expira
    </th>
    <th>
        Estado
    </th>
    <th>
        Dias restantes
    </th>
</thead>
    <tbody>
        @php
            $count=1;
        @endphp
        @if (is_array($arrayDominios) || is_object($arrayDominios))
            @foreach ($arrayDominios as $dominio )
            <tr>
                <td>{{$count}}</td>
                <td>{{$dominio->nombre}} {{$dominio->apellidos}}</td>
                <td>{{$dominio->nombre_dominio}} </td>
                <td>{{$dominio->registro}}</td>
                <td>{{$dominio->actualizacion}}</td>
                <td> {{$dominio->expira}}</td>
                <td>
                    @if ($dominio->estado==1)
                        <span style="background-color: green; text-align: center; color: white;padding: 5px">ACTIVO</span>
                    @elseif($dominio->estado==0)
                        <span style="background-color: red; text-align: center; color: white;padding: 5px">SUSPENDIDO</span>
                    @endif
                </td>
                <td>{{$dominio->dias_restantes}}</td>
            </tr>
            @php
                $count++;
            @endphp
            @endforeach
        @else
            <p>No es ni arreglo y objeto</p>
        @endif
    </tbody>
</table>
@endsection
