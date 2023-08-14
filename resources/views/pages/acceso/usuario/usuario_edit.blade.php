{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class=" overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header"><b>Registrar Usuario</b></div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btnCloseAlert">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                        </div>
                                    @endif
                                    <form action="{{ route('usuario.update', $usuario->id)}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                      <div class="form-group">
                                        <label for="" >Nombre</label>
                                        <input type="text" value="{{$usuario->name}}" class="form-control" id="name" name="name" required placeholder="Estela Villar">
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="">Rol</label>
                                        <select class="form-control" id="idRol" name="idRol" required>
                                        <option value="">Seleccionar</option>
                                       
                                        @foreach($roles as $rol)
                                            <option @if($usuario->idRol == $rol->id) selected @endif value="{{$rol->id}}">{{$rol->name}}</option>
                                        @endforeach
                                      
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" value="{{$usuario->email}}" id="email" name="email" required placeholder="estela@example.com">
                                      </div>

                                      <div class="form-group">
                                        <label for="">Ingrese Contraseña Actual</label>
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="******">
                                      </div>

                                      <div class="form-group">
                                        <label for="">Ingrese Contraseña Nueva</label>
                                        <input type="password" class="form-control" id="password1" name="password1" required placeholder="******">
                                      </div>
                                                                             
                                      <br>
                                      <button type="submit" class="btn btn-primary">Aceptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
        @stack('modals')
        <script>
            let darkMode;
            if(
            window.localStorage.getItem('darkMode') == null){
                window.localStorage.setItem('darkMode',false);
                darkMode = false
            }else{
                if(window.localStorage.getItem('darkMode') ==='true')
                    darkMode = true
                else{
                    darkMode = false
                }
            }

            console.log(window.localStorage.getItem('darkMode'));
            document.addEventListener('alpine:init',()=>{
                Alpine.store('darkMode',{
                    on: darkMode,
                    toggle(){
                        this.on = !this.on;
                        window.localStorage.setItem('darkMode',!darkMode);
                    }
                })
            })
        </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
        @isset($js)
            {{ $js }}
        @endisset
      
  
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
