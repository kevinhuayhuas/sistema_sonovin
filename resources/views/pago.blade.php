@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#nuevoPago"><i
                            class="fa fa-plus-square" aria-hidden="true"></i> Nuevo
                        Pago</button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Lista de Pagos
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
                                        Detalle
                                    </th>
                                    <th>
                                        Entidad
                                    </th>
                                    <th>
                                        Codigo
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($pagos as $pago)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $pago->nombre_pago }}</td>
                                            <td>{{ $pago->detalle_pago }} </td>
                                            <td>{{ $pago->entidad }}</td>
                                            <td>{{ $pago->codigo_pago }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ url('pagos/'.$pago->id ) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a class="btn btn-warning"  href="{{ url('editpago/'.$pago->id ) }}" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></a>
                                                <a class="btn btn-danger" href="{{ url('eliminarpago/'.$pago->id ) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    <!-- modal nuevo -->
    <div class="modal fade" id="nuevoPago" tabindex="-1" aria-labelledby="modalNuevoPago" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="txtTitulo"><i class="fa fa-plus-square" aria-hidden="true"></i> Nuevo
                        Pago</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('pagos') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtNombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                                    @error('txtNombre')
                                     <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="txtDetalle" class="col-form-label">Detalle:</label>
                                    <input type="text" class="form-control" id="txtDetalle" name="txtDetalle">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="txtEntidad" class="col-form-label">Entidad:</label>
                                <input type="text" class="form-control" id="txtEntidad" name="txtEntidad">
                                @error('txtEntidad')
                                <p class="text-danger">Completar este campo</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="txtCodigo" class="col-form-label">Codigo :</label>
                                <input type="text" class="form-control" id="txtCodigo" name="txtCodigo">
                                @error('txtCodigo')
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
