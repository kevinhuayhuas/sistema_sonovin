@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#nuevoDominio">Nuevo
                        Dominio</button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Lista de Dominios
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @if (is_array($arrayDominios) || is_object($arrayDominios))
                                        @foreach ($arrayDominios as $dominio)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $dominio->nombre }} {{ $dominio->apellidos }}</td>
                                                <td>{{ $dominio->nombre_dominio }} </td>
                                                <td>{{ $dominio->registro }}</td>
                                                <td>{{ $dominio->actualizacion }}</td>
                                                <td> {{ $dominio->expira }}</td>
                                                <td>
                                                    @if ($dominio->estado == 1)
                                                        <p class="text-success">ACTIVO</p>
                                                    @elseif($dominio->estado == 0)
                                                        <p class="text-danger">SUSPENDIDO</p>
                                                    @endif
                                                </td>
                                                <td>{{ $dominio->dias_restantes }}</td>
                                                <td>
                                                    <button class="btn btn-info" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                    <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal nuevo -->
    <div class="modal fade" id="nuevoDominio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="txtNuevoDominio">Nuevo Dominio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
