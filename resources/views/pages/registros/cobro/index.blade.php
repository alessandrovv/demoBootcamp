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
                    <H1>Lista de Cobros Vencidos</H1>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row container text-left">
                    <div class="col-8">
                  </div>
                    <div class="col-4 text-right">
                      <input id="txtBuscar" placeholder="Buscar..." class="form-control" type="text">
                    </div>
                  </div>
                <div class="row justify-content-md-center">
                  <div class="col">
                        <div class="table-responsive">
                            <table class="table caption top table-striped">
                                <caption>Lista de Cobros Vencidos</caption>
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Fecha de Pago</th>
                                    <th scope="col">Monto</th>

                                  </tr>
                                </thead>
                                <tbody id="tblDatos">
                                    @if (sizeof($cobroVencido)==0)
                                        <tr>
                                            <td colspan="4">No hay registros</td>
                                        </tr>
                                    @endif
                                    @foreach ($cobroVencido as $cobro)
                                    <tr>
                                        <th scope="row">{{$loop->index + 1}}</th>
                                        <td class="busqueda">{{ $cobro->nombres }} {{ $cobro->apellidos }}</td>
                                        <td class="busqueda">{{ Carbon::parse($cobro->fechaPago)->format('d-m-Y') }} </td>
                                        <td class="busqueda">{{ $cobro->montoPrevisto }} </td>
                                      </tr>
                                    @endforeach
                                   

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
