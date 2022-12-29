@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Detalles de {{ $pago->nombre_pago }}
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txtNombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="{{ $pago->nombre_pago }}" readonly>
                                        @error('txtNombre')
                                            <p class="text-danger">Completar este campo</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtDetalle" class="col-form-label">Detalle:</label>
                                        <input type="text" class="form-control" id="txtDetalle" name="txtDetalle" value="{{ $pago->detalle_pago }}" readonly >
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="txtEntidad" class="col-form-label">Entidad:</label>
                                    <input type="text" class="form-control" id="txtEntidad" name="txtEntidad" value="{{ $pago->entidad }}" readonly>
                                    @error('txtEntidad')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="txtCodigo" class="col-form-label">Codigo :</label>
                                    <input type="text" class="form-control" id="txtCodigo" name="txtCodigo" value="{{ $pago->codigo_pago }}" readonly>
                                    @error('txtCodigo')
                                        <p class="text-danger">Completar este campo</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ url('pagos/') }}" class="btn btn-secondary">Cerrar</a>
                                        <a href="{{ url('pagos/') }}" type="submit" class="btn btn-primary"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                            Aceptar</a>
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