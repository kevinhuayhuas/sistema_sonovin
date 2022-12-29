@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#nuevoCliente"><i
                            class="fa fa-plus-square" aria-hidden="true"></i> Nuevo
                        Cliente</button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Lista de Clientes
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
                                        Apellidos
                                    </th>
                                    <th>
                                        Empresa
                                    </th>
                                    <th>
                                        Dni
                                    </th>
                                    <th>
                                        RUC
                                    </th>
                                    <th>
                                        Celular
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($arrayClientes as $cliente)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->apellidos }} </td>
                                            @if (strlen($cliente->empresa)>=50)
                                            <td>{{ substr($cliente->empresa,0,30)."..." }}</td>
                                            @else
                                            <td>{{ $cliente->empresa }}</td>
                                            @endif
                                            <td>{{ $cliente->dni }}</td>
                                            <td>{{ $cliente->ruc }}</td>
                                            <td>{{ $cliente->celular }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ url('clientes/' . $cliente->id) }}"><i
                                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a class="btn btn-warning" href="{{ url('editcliente/' . $cliente->id) }}"
                                                    type="button"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></i></a>
                                                <a class="btn btn-danger"
                                                    href="{{ url('eliminarcliente/' . $cliente->id) }}"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    <div class="modal fade" id="nuevoCliente" tabindex="-1" aria-labelledby="modalNuevoPago" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="txtTitulo"><i class="fa fa-plus-square" aria-hidden="true"></i> Nuevo
                        Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('clientes') }}" method="post">
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
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtApellidos" class="col-form-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="txtApellidos" name="txtApellidos">
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
                                    <input type="text" class="form-control" id="txtEmpresa" name="txtEmpresa">
                                    @error('txtEmpresa')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtDni" class="col-form-label">Dni :</label>
                                    <input type="text" class="form-control" id="txtDni" name="txtDni">
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
                                    <input type="text" class="form-control" id="txtRuc" name="txtRuc">
                                    @error('txtRuc')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtCorreo" class="col-form-label">Correo :</label>
                                    <input type="text" class="form-control" id="txtCorreo" name="txtCorreo">
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
                                    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono">
                                    @error('txtTelefono')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtCelular" class="col-form-label">Celular :</label>
                                    <input type="text" class="form-control" id="txtCelular" name="txtCelular">
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
                                    <input type="text" class="form-control" id="txtWeb" name="txtWeb">
                                    @error('txtWeb')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtDistrito" class="col-form-label">Distrito:</label>
                                    <input type="text" class="form-control" id="txtDistrito" name="txtDistrito">
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
                                    <input type="text" class="form-control" id="txtDepartamento" name="txtDepartamento">
                                    @error('txtDepartamento')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtDireccion" class="col-form-label">Direccion:</label>
                                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
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
                                    <input type="text" class="form-control" id="txtInmueble" name="txtInmueble">
                                    @error('txtInmueble')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Crear Nuevo</button>
                    </div>
            </div>
        </div>

        </form>
    </div>
@endsection
