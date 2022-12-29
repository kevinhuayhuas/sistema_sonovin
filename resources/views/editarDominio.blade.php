@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Editar Dominio : {{ $dominio->nombre_dominio }}
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dominios/'.$dominio->id_dominio) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtCliente" class="col-form-label">Cliente:</label>
                                        <select class="form-select" id="txtCliente" name="txtCliente">
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
                                        <input type="text" class="form-control" id="txtDominio" name="txtDominio" value="{{$dominio->nombre_dominio}}">
                                        @error('txtDominio')
                                        <p class="text-danger">Completar este campo</p>
                                       @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="txtRegistro" class="col-form-label">Fecha de Registro:</label>
                                    <input type="date" class="form-control" id="txtRegistro" name="txtRegistro" value="{{$dominio->registro}}">
                                    @error('txtRegistro')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="txtActualizacion" class="col-form-label">Fecha de Actualizacion :</label>
                                    <input type="date" class="form-control" id="txtActualizacion" name="txtActualizacion" value="{{$dominio->actualizacion}}">
                                    @error('txtActualizacion')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="txtExpira" class="col-form-label">Fecha de Expiracion:</label>
                                    <input type="date" class="form-control" id="txtExpira" name="txtExpira" value="{{$dominio->expira}}">
                                    @error('txtExpira')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="txtEstado" class="col-form-label">Estado:</label>
                                    <select class="form-select" id="txtEstado" name="txtEstado">
                                        
                                        <option value="1" @if($dominio->estado==1){{"selected"}}@endif>Activo</option>
                                        <option value="2" @if($dominio->estado==2){{"selected"}}@endif>Suspendido</option>
                                      </select>
                                    @error('txtEstado')
                                    <p class="text-danger">Completar este campo</p>
                                    @enderror
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