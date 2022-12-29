@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#nuevoDominio">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Nuevo Dominio</button>
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
                                                    @elseif($dominio->estado == 2)
                                                        <p class="text-danger">SUSPENDIDO</p>
                                                    @endif
                                                </td>
                                                <td>{{ $dominio->dias_restantes }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ url('dominios/'.$dominio->id_dominio ) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a class="btn btn-warning"  href="{{ url('editdominio/'.$dominio->id_dominio ) }}" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></a>
                                                    <a class="btn btn-danger" href="{{ url('eliminardominio/'.$dominio->id_dominio ) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                <form action="{{ url('dominios') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtCliente" class="col-form-label">Cliente:</label>
                                    <select class="form-select" id="txtCliente" name="txtCliente">
                                        <option selected>Seleccione un Cliente</option>
                                        @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellidos}}</option>
                                        @endforeach
                                      </select>
                                    @error('txtCliente')
                                     <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="txtDominio" class="col-form-label">Nombre Dominio:</label>
                                    <input type="text" class="form-control" id="txtDominio" name="txtDominio" placeholder="Ejemplo: www.tudominio.com">
                                    @error('txtDominio')
                                    <p class="text-danger">Completar este campo</p>
                                   @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="txtRegistro" class="col-form-label">Fecha de Registro:</label>
                                <input type="date" class="form-control" id="txtRegistro" name="txtRegistro">
                                @error('txtRegistro')
                                <p class="text-danger">Completar este campo</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="txtActualizacion" class="col-form-label">Fecha de Actualizacion :</label>
                                <input type="date" class="form-control" id="txtActualizacion" name="txtActualizacion">
                                @error('txtActualizacion')
                                <p class="text-danger">Completar este campo</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="txtExpira" class="col-form-label">Fecha de Expiracion:</label>
                                <input type="date" class="form-control" id="txtExpira" name="txtExpira">
                                @error('txtExpira')
                                <p class="text-danger">Completar este campo</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="txtEstado" class="col-form-label">Estado:</label>
                                <select class="form-select" id="txtEstado" name="txtEstado">
                                    <option selected value="1">Activo</option>
                                    <option value="2">Suspendido</option>
                                  </select>
                                @error('txtEstado')
                                <p class="text-danger">Completar este campo</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Crear Nuevo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
