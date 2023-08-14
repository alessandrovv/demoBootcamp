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
                    <H1>Lista de Contratos</H1>
                  </div>
                </div>
            </div>
            <div class="card-body">
              <?php if ($agregar==true) { ?>
                <div class="row container text-left">
                  <div class="col-8"><a role="button" href="{{ route('contrato.create') }}"  class="btn btn-primary btn-sm">Crear Contrato</a></div>
                  <div class="col-4 text-right">
                    <input id="txtBuscar" placeholder="Buscar..." class="form-control" type="text">
                  </div>
                </div>
                <?php } ?>
                <div class="row justify-content-md-center">
                  <div class="col">
                        <div class="table-responsive">
                            <table class="table caption top table-striped">
                                <caption>Lista de Contratos</caption>
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Periodo Matricula</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Plan</th>
                                    <?php if ($agregar==true) { ?>
                                      <th scope="col">Opciones</th>
                                     <?php } ?>
                                  </tr>
                                </thead>
                                <tbody id="tblDatos">
                                    @if (sizeof($contratos)==0)
                                        <tr>
                                            <td colspan="4">No hay registros</td>
                                        </tr>
                                    @endif
                                    @foreach ($contratos as $contrato)
                                    <tr>
                                        <th scope="row">{{ $contrato->id }}</th>
                                        <td class="busqueda">{{ $contrato->alumnos->nombres }} {{$contrato->alumnos->apellidos}} </td>
                                        <th scope="row">{{ $contrato->periodoMatricula }}</th>
                                        <th scope="row">{{ $contrato->grupos->descripcion }}</th>
                                        <th scope="row">{{ $contrato->planes->descripcion }}</th>
                                        <?php if ($agregar==true) { ?>
                                          <td>
                                            <div class="d-flex justify-content-center">
                                                <a role="button" href="{{ route('contrato.edit',$contrato->id) }}"  style="padding:3px" class="btn btn-primary mr-2">editar</a>
                                                <form method="POST" action="{{ route('contrato.destroy', $contrato->id) }}" >
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" style="padding:3px" class="btn btn-danger">eliminar</button>
                                                </form>
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
