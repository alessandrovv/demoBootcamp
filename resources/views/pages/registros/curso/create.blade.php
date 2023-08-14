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
                                <div class="card-header">Registrar Curso</div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('curso.store')}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group">
                                        <label for="" >Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required onkeypress="return validarSoloLetras(event)">
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="">Docente</label>
                                        <select class="form-control" id="idDocente" name="docente" required >
                                            <option value="">Seleccionar</option>
                                           
                                            <option value="Elvis Daga">Elvis Daga</option>
                                            <option value="Frans Leiva">Frans Leiva</option>
                                            <option value="Leo Benjamin">Leo Benjamin</option>
                                            <option value="Edwin Rodriguez">Edwin Rodriguez</option>
                                            <option value="Carlos Julca">Carlos Julca</option>
                                        </select>
                                      </div>    
                                      <div class="form-group">
                                        <label for="">Área</label>
                                        <select class="form-control" id="area" name="area" required>
                                            <option value="">Seleccionar</option>
                                           
                                            <option value="Ciencias">Ciencias</option>
                                            <option value="Letras">Letras</option>

                                        </select>
                                      </div> 
                                      <div class="form-group">
                                        <label for="">Nivel</label>
                                        <select class="form-control" id="nivel" name="nivel" required>
                                            <option value="">Seleccionar</option>
                                           
                                            <option value="Basico">Basico</option>
                                            <option value="Intermedio">Intermedio</option>
                                            <option value="Avanzado">Avanzado</option>

                                        </select>
                                      </div>                                  
                                      <br>
                                      <button type="submit" class="btn btn-primary">Aceptar</button>
                                      <button class="btn btn-danger"><a style="color: white" href="{{route('curso.index')}}">Volver</a></button>
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
        <script>
            function validarSoloLetras(event) {
                var charCode = event.which || event.keyCode;
                var charTyped = String.fromCharCode(charCode);
                var regex = /^[A-Za-z\s]+$/; // Expresión regular para letras y espacio en blanco
                if (!regex.test(charTyped)) {
                    event.preventDefault();
                    return false;
                }
                return true;
            }
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
