{{-- Extends layout --}}
@extends('layout.default')
@php
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$agregar = false;
foreach ($rol as $rol) {
  if($rol->id == 3){ 
    $agregar = true;
  }} 
@endphp
{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row">
        <div class="card container text-center">
            <div class="card-header">
                <div class="row justify-content-md-start">
                  <div class="col-12">
                    <h1>{{$alumno->nombres}} {{$alumno->apellidos}}</h1>
                  </div>
                  <br>
                  <div>
                    <h3>REPORTE DE ASISTENCIAS:</h3>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                <div class="col">
                        <div class="table-responsive">
                            <table class="table caption top table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Dia de la Semana</th>
                                        <th scope="col">Estado Asistencia</th>
                                    </tr>
                                </thead>
                                <tbody id="tblDatos">
                                    @if (sizeof($reporte)==0)
                                        <tr>
                                            <td colspan="3">No hay registros</td>
                                        </tr>
                                    @endif
                                    @foreach ($reporte as $report)
                                    <tr>
                                        <th class="busqueda" scope="row">{{ date_format(date_create($report->asistencia->fecha), 'd/m/Y')  }}</th>
                                        <td class="busqueda">{{ $dias[date('w', strtotime($report->asistencia->fecha))]  }}</td>
                                        <td class="busqueda">{{ $report->estado->descripcion }}</td>
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
