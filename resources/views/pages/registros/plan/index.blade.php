{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row">
        <div class="container text-center">
            <div class="row justify-content-md-center">
              <div class="col">
                <H1>Lista de Planes</H1>
              </div>
            </div>
            
              <div class="row container text-left">
               
                <div class="col-8">
                  <div class="form-group">
                    <a href="{{ route('plan.create')}}" class="btn btn-primary btn-sm">Crear plan</a>
                  </div>
                </div>
                
                <div class="col-4 text-right">
                  <input id="txtBuscar" placeholder="Buscar..." class="form-control" type="text">
                </div>
              </div>
            

            <div class="row justify-content-md-center">
              <div class="col">
                    <div class="table-responsive">
                        <table class="table caption top">
                            <caption>Lista de Planes</caption>
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">descripcion</th>
                                <th scope="col">Costo</th>
                                 <th scope="col">Opciones</th>


                              </tr>
                            </thead>
                            <tbody id="tblDatos">
                                @foreach ($plan as $plan)
                                    <tr>
                                      <td>{{$loop->index + 1}}
                                    </td>
                                      <td class="busqueda">{{$plan->descripcion}}</td>
                                      <td class="busqueda">{{$plan->costo}}</td>
                                      <td>
                                        <button type="button" style="padding:3px" class="btn btn-warning"><a style="color: white" href="{{ route('plan.edit', $plan->id) }}">Editar</a></button>
                                        <form action="{{ route('plan.destroy', $plan->id) }}" style="display: inline"
                                          method="POST">
                                          @csrf
                                          {{ method_field('DELETE') }}

                                          <button type="submit" style="padding:3px" class="btn btn-danger">Eliminar</button>
                                      </form>
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

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
