{{-- Extends layout --}}
@extends('layout.default')

@php
    use Carbon\Carbon;
@endphp
{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row">
        <div class="card container text-center">
            <div class="card-header">
                <div class="row justify-content-md-center">
                  <div class="col">
                    <H1>Lista de Pagos</H1>
                  </div>
                </div>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row container text-left">
                  <div class="col-8">
                    <form action="{{ route('pago.create') }}" enctype="multipart/form-data" >
                        <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="txtCodigo" name="codEstudiante" placeholder="Codigo del alumno" required>
                                    
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Registrar Pago</button>
                                </div>
                            
                        </div>
                    </form>
                    
                </div>
                  <div class="col-4 text-right">
                    <input id="txtBuscar" placeholder="Buscar..." class="form-control" type="text">
                  </div>
                </div>

                <div class="row justify-content-md-center">
                  <div class="col">
                        <div class="table-responsive">
                            <table class="table caption top table-striped">
                                <caption>Lista de Pagos</caption>
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Fecha de Pago</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Opciones</th>
                                  </tr>
                                </thead>
                                <tbody id="tblDatos">
                                    @if (sizeof($pagos)==0)
                                        <tr>
                                            <td colspan="5">No hay registros</td>
                                        </tr>
                                    @endif
                                    @foreach ($pagos as $pago)
                                    <tr>
                                        <td> {{$loop->index + 1}} </td>
                                        <td class="busqueda">{{$pago->detalleContrato->contrato->alumnos->nombres }} {{$pago->detalleContrato->contrato->alumnos->apellidos }}</td>
                                        <td class="busqueda">{{Carbon::parse($pago->created_at)->format('d-m-Y') }}</td>
                                        <td class="busqueda">{{ $pago->monto }}</td>
                                        
                                          <td>
                                            <div class="d-flex justify-content-center">
                                                <form method="POST" action="{{ route('pago.destroy', $pago->id) }}" >
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" style="padding:3px" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                          </td>
                                      </tr>
                                    @endforeach

                                </tbody>
                            </table>
                          </div></div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
