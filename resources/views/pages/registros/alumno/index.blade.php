{{-- Extends layout --}}
@extends('layout.default')
@php
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
                <div class="row justify-content-md-center">
                  <div class="col">
                    <H1>Lista de Alumnos</H1>
                  </div>
                </div>
            </div>
            <div class="card-body">
              <?php if ($agregar==true) { ?>
                <div class="row container text-left">
                  <div class="col-8"><a role="button" href="{{ route('alumno/create') }}"  class="btn btn-primary btn-sm">Crear Alumno</a></div>
                  <div class="col-4 text-right">
                    <input id="txtBuscar" placeholder="Buscar..." class="form-control" type="text">
                  </div>
                </div>
                <?php } ?>
                <div class="row justify-content-md-center">
                  <div class="col">
                        <div class="table-responsive">
                            <table class="table caption top table-striped">
                                <caption>Lista de alumnos</caption>
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombres y Apellidos</th>
                                    <th scope="col">GRUPO</th>
                                    <th scope="col">MODALIDAD</th>
                                    <?php if ($agregar==true) { ?>
                                      <th scope="col">Opciones</th>
                                     <?php } ?>
                                  </tr>
                                </thead>
                                <tbody id="tblDatos">
                                    @if (sizeof($alumnos)==0)
                                        <tr>
                                            <td colspan="4">No hay registros</td>
                                        </tr>
                                    @endif
                                    @foreach ($alumnos as $alumno)
                                    <tr>
                                        <th class="busqueda" scope="row">{{ $alumno->id }}</th>
                                        <td class="busqueda">{{ $alumno->nombres }} {{ $alumno->apellidos }}</td>
                                        <td class="busqueda">{{ $alumno->area }}</td>
                                        <td class="busqueda">{{ $alumno->modalidad }}</td>
                                        <?php if ($agregar==true) { ?>
                                          <td>
                                            <div class="d-flex justify-content-center">
                                                <a role="button" href="{{ route('alumno/edit', ['id'=>$alumno->id]) }}"  style="padding:3px" class="btn btn-primary mr-2">editar</a>
                                                <form method="POST" action="{{ route('alumno/delete', ['id'=>$alumno->id]) }}" >
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" style="padding:3px" class="btn btn-danger mr-2">eliminar</button>
                                                </form>
                                                <a role="button" href="{{ route('alumno.reporte', ['id'=>$alumno->id]) }}"  style="padding:3px" class="btn btn-secondary mr-2">asistencias</a>
                                            </div>
                                          </td>
                                         <?php } ?>
                                        
                                      </tr>
                                    @endforeach
                                    @if ($agregar)
                                    <tr hidden="true" id="not_data">
                                      <td colspan="5">No hay registros</td>
                                    </tr>
                                    @else
                                    <tr hidden="true" id="not_data">
                                      <td colspan="4">No hay registros</td>
                                    </tr>
                                    @endif                                    
                                     
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
