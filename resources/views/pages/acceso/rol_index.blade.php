{{-- Extends layout --}}
@extends('layout.default')

@php
$vista = false;
foreach ($rol as $rol) {
  if($rol->id == 2){ 
    $vista = true;
  }} 
@endphp

@if($vista==true)

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row">
        <div class="container text-center">
            <div class="row justify-content-md-center">
              <div class="col">
                <H1>Lista de Roles</H1>
              </div>
            </div>
            <div class="row container text-left">        
              <div class="col">
                <div class="form-group">
                  <a href="{{ route('rol.create')}}" class="btn btn-primary btn-sm">Crear rol</a>
              </div>
            </div>
              
            </div>
            <div class="row justify-content-md-center">
              <div class="col">
                    <div class="table-responsive">
                        <table class="table caption top">
                            <caption>Lista de Roles</caption>
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $roles) 
                                    <tr>
                                      <td> {{$loop->index + 1}} </td>
                                      <td>{{ $roles->name}}</td>
                                      <td>{{$roles->descripcion}}</td>  
                                      
                                      <td>
                                        @if ($roles->id!=1) 
                                        <button type="button" style="padding:3px" class="btn btn-info"><a style="color: white" href="{{ route('rol.permisos.edit', $roles->id) }}">Permisos</a></button>
                                        <button type="button" style="padding:3px" class="btn btn-warning"><a style="color: white" href="{{ route('rol.edit', $roles->id) }}">Editar</a></button>
                                        
                                          <form action="{{ route('rol.destroy', $roles->id) }}" style="display: inline"
                                            method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <button type="submit" style="padding:3px" class="btn btn-danger">Eliminar</button>
                                        </form>
                                        
                                        @endif
                                      </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                      </div></div>
            </div>           
        </div>
    </div>

@endsection
@endif
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
