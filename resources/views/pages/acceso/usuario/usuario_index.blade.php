{{-- Extends layout --}}
@extends('layout.default')

@php
$vista = false;
foreach ($rol as $rol) {
  if($rol->id == 1){ 
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
                <H1>Lista de Usuarios</H1>
              </div>
            </div>
            <div class="row container text-left">        
              <div class="col">
                <div class="form-group">
                  <a href="{{ route('usuario.create')}}" class="btn btn-primary btn-sm">Crear usuario</a>
              </div>
            </div>
              
            </div>
            <div class="row justify-content-md-center">
              <div class="col">
                    <div class="table-responsive">
                        <table class="table caption top">
                            <caption>Lista de usuarios</caption>
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Login</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($usuarios as $usuario)
                                  <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{$usuario->rol->name}}</td>
                                    <td>
                                      <a href="{{route('usuario.edit', $usuario->id)}}" type="button" style="padding:3px" class="btn btn-warning">editar</a>
                                      @if ($usuario->rol->id != 1)
                                      <form action="{{route('usuario.destroy', $usuario->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding:3px" class="btn btn-danger">eliminar</button>
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
