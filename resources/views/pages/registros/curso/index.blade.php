{{-- Extends layout --}}
@extends('layout.default')

@php
$agregar = false;
foreach ($rol as $rol) {
  if($rol->id == 4){
    $agregar = true;
  }}
@endphp


{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row">
        <div class="container text-center">
            <div class="row justify-content-md-center">
              <div class="col">
                <H1>Lista de Cursos</H1>
              </div>
            </div>
            
              <div class="row container text-left">
                @if ($agregar==true) 
                <div class="col-8">
                  <div class="form-group">
                    <a href="{{ route('curso.create')}}" class="btn btn-primary btn-sm">Crear curso</a>
                  </div>
                </div>
                @endif
                <div class="col-4 text-right">
                  <input id="txtBuscar" placeholder="Buscar..." class="form-control" type="text">
                </div>
              </div>
            

            <div class="row justify-content-md-center">
              <div class="col">
                    <div class="table-responsive">
                        <table class="table caption top">
                            <caption>Lista de Cursos</caption>
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Area</th>
                                <th scope="col">Nivel</th>
                                <?php if ($agregar==true) { ?>
                                 <th scope="col">Opciones</th>
                                <?php } ?>

                              </tr>
                            </thead>
                            <tbody id="tblDatos">
                                @foreach ($curso as $curso)
                                    <tr>
                                      <td>{{$loop->index + 1}}
                                    </td>
                                      <td class="busqueda">{{$curso->nombre}}</td>
                                      <td class="busqueda">{{$curso->docente}}</td>
                                      <td class="busqueda">{{$curso->area}}</td>
                                      <td class="busqueda">{{$curso->nivel}}</td>
                                      @if ($agregar==true)
                                      <td>
                                        <button type="button" style="padding:3px" class="btn btn-warning"><a style="color: white" href="{{ route('curso.edit', $curso->id) }}">Editar</a></button>
                                        <form action="{{ route('curso.destroy', $curso->id) }}" style="display: inline"
                                          method="POST">
                                          @csrf
                                          {{ method_field('DELETE') }}

                                          <button type="submit" style="padding:3px" class="btn btn-danger">Eliminar</button>
                                      </form>
                                      </td>
                                      @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div></div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
