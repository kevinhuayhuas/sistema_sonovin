@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Detalles del Dominio : {{ $dominio->nombre_dominio }}
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dominios/'.$dominio->id_dominio) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtCliente" class="col-form-label">Cliente:</label>
                                        <select class="form-select" id="txtCliente" name="txtCliente" disabled>
                                            @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->id}}" @if($dominio->cliente_id==$cliente->id){{"selected"}}@endif>{{$cliente->nombre}} {{$cliente->apellidos}}</option>
                                            @endforeach
                                          </select>
                                        @error('txtCliente')
                                         <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtDominio" class="col-form-label">Nombre Dominio:</label>
                                        <input type="text" class="form-control" id="txtDominio" name="txtDominio" value="{{$dominio->nombre_dominio}}" readonly>
                                        @error('txtDominio')
                                        <p class="text-danger">Completar este campo</p>
                                       @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="txtRegistro" class="col-form-label">Fecha de Registro:</label>
                                    <input type="date" class="form-control" id="txtRegistro" name="txtRegistro" value="{{$dominio->registro}}" readonly>
                                    @error('txtRegistro')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="txtActualizacion" class="col-form-label">Fecha de Actualizacion :</label>
                                    <input type="date" class="form-control" id="txtActualizacion" name="txtActualizacion" value="{{$dominio->actualizacion}}" readonly>
                                    @error('txtActualizacion')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="txtExpira" class="col-form-label">Fecha de Expiracion:</label>
                                    <input type="date" class="form-control" id="txtExpira" name="txtExpira" value="{{$dominio->expira}}" readonly>
                                    @error('txtExpira')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="txtEstado" class="col-form-label">Estado:</label>
                                    <input type="text" class="form-control" id="txtEstado" name="txtEstado" value="@if($dominio->estado==1){{"Activo"}}@elseif($dominio->estado==2){{"Suspendido"}}@endif" readonly>
                                    @error('txtEstado')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ url('dominios/') }}" class="btn btn-secondary">Cerrar</a>
                                        <a href="{{ url('dominios/') }}" type="submit" class="btn btn-primary"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                            Aceptar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
 <script>
   alert("hola");
   </script>
@endsection