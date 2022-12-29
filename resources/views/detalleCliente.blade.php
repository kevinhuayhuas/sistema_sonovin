@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Detalle de Cliente : {{ $cliente->nombre }}
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtNombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                            value="{{ $cliente->nombre }}" readonly>
                                        @error('txtNombre')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtApellidos" class="col-form-label">Apellidos:</label>
                                        <input type="text" class="form-control" id="txtApellidos" name="txtApellidos"
                                        value="{{ $cliente->apellidos }}" readonly>
                                        @error('txtApellidos')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtEmpresa" class="col-form-label">Empresa:</label>
                                        <input type="text" class="form-control" id="txtEmpresa" name="txtEmpresa"
                                        value="{{ $cliente->empresa }}" readonly>
                                        @error('txtEmpresa')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtDni" class="col-form-label">Dni :</label>
                                        <input type="text" class="form-control" id="txtDni" name="txtDni"
                                        value="{{ $cliente->dni }}" readonly>
                                        @error('txtDni')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtRuc" class="col-form-label">Ruc:</label>
                                        <input type="text" class="form-control" id="txtRuc" name="txtRuc"
                                        value="{{ $cliente->ruc }}" readonly>
                                        @error('txtRuc')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtCorreo" class="col-form-label">Correo :</label>
                                        <input type="text" class="form-control" id="txtCorreo" name="txtCorreo"
                                        value="{{ $cliente->correo }}" readonly>
                                        @error('txtCorreo')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtTelefono" class="col-form-label">Telefono:</label>
                                        <input type="text" class="form-control" id="txtTelefono" name="txtTelefono"
                                        value="{{ $cliente->telefono }}" readonly>
                                        @error('txtTelefono')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtCelular" class="col-form-label">Celular :</label>
                                        <input type="text" class="form-control" id="txtCelular" name="txtCelular"
                                        value="{{ $cliente->celular }}" readonly>
                                        @error('txtCelular')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtWeb" class="col-form-label">Web :</label>
                                        <input type="text" class="form-control" id="txtWeb" name="txtWeb" 
                                        value="{{ $cliente->web }}" readonly>
                                        @error('txtWeb')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtDistrito" class="col-form-label">Distrito:</label>
                                        <input type="text" class="form-control" id="txtDistrito" name="txtDistrito"
                                        value="{{ $cliente->distrito }}" readonly>
                                        @error('txtDistrito')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtDepartamento" class="col-form-label">Departamento :</label>
                                        <input type="text" class="form-control" id="txtDepartamento"
                                            name="txtDepartamento" value="{{ $cliente->departamento }}" readonly>
                                        @error('txtDepartamento')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtDireccion" class="col-form-label">Direccion:</label>
                                        <input type="text" class="form-control" id="txtDireccion"
                                            name="txtDireccion" value="{{ $cliente->direccion }}" readonly>
                                        @error('txtDireccion')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtInmueble" class="col-form-label">Inmueble :</label>
                                        <input type="text" class="form-control" id="txtInmueble" name="txtInmueble"
                                        value="{{ $cliente->inmueble }}" readonly>
                                        @error('txtInmueble')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ url('clientes/') }}"  class="btn btn-secondary">Cerrar</a>
                                        <a href="{{ url('clientes/') }}" type="submit" class="btn btn-primary"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                            Aceptar </a>
                                    </div>
                                </div>
                            </div>

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
