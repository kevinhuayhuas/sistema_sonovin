@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Editar Cliente : {{ $cliente->nombre }}
                    </div>
                    <div class="card-body">
                        <form action="{{ url('clientes/' . $cliente->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtNombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                            value="{{ $cliente->nombre }}">
                                        @error('txtNombre')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtApellidos" class="col-form-label">Apellidos:</label>
                                        <input type="text" class="form-control" id="txtApellidos" name="txtApellidos"
                                        value="{{ $cliente->apellidos }}">
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
                                        value="{{ $cliente->empresa }}">
                                        @error('txtEmpresa')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtDni" class="col-form-label">Dni :</label>
                                        <input type="text" class="form-control" id="txtDni" name="txtDni"
                                        value="{{ $cliente->dni }}">
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
                                        value="{{ $cliente->ruc }}">
                                        @error('txtRuc')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtCorreo" class="col-form-label">Correo :</label>
                                        <input type="text" class="form-control" id="txtCorreo" name="txtCorreo"
                                        value="{{ $cliente->correo }}">
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
                                        value="{{ $cliente->telefono }}">
                                        @error('txtTelefono')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtCelular" class="col-form-label">Celular :</label>
                                        <input type="text" class="form-control" id="txtCelular" name="txtCelular"
                                        value="{{ $cliente->celular }}">
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
                                        value="{{ $cliente->web }}">
                                        @error('txtWeb')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtDistrito" class="col-form-label">Distrito:</label>
                                        <input type="text" class="form-control" id="txtDistrito" name="txtDistrito"
                                        value="{{ $cliente->distrito }}">
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
                                            name="txtDepartamento" value="{{ $cliente->departamento }}">
                                        @error('txtDepartamento')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtDireccion" class="col-form-label">Direccion:</label>
                                        <input type="text" class="form-control" id="txtDireccion"
                                            name="txtDireccion" value="{{ $cliente->direccion }}">
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
                                        value="{{ $cliente->inmueble }}">
                                        @error('txtInmueble')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-secondary"
                                            >Cerrar</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"
                                                aria-hidden="true"></i>
                                            Guardar Cambios</button>
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
