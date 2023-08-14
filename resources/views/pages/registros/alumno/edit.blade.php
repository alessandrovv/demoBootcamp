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
                                <div class="card-header">
                                    <h2 class="m-0">Editar Alumno</h2>
                                </div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('alumno/update',['id'=>$alumno->id]) }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                      <div>
                                        <h4>Datos del alumno:</h4>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-2">
                                                <label for="">Codigo</label>
                                                <input type="text" class="form-control" id="txtCodigo" name="codEstudiante" required placeholder="1513300123"
                                                value="{{ old('codEstudiante', $alumno->codEstudiante) }}">
                                                @error('codEstudiante')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xs-12 col-md-5">
                                                <label for="">Nombres</label>
                                                <input type="text" class="form-control" id="txtNombre" name="nombres"
                                                    required placeholder="Nombre" value="{{ old('nombres', $alumno->nombres) }}">
                                                @error('nombres')
                                                    <div class="text-danger">{{ 'Ingrese nombres validos' }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xs-12 col-md-5">
                                                <label for="">Apellidos</label>
                                                <input type="text" class="form-control" id="txtApellido" name="apellidos"
                                                    required placeholder="apellidos" value="{{ old('apellidos', $alumno->apellidos) }}">
                                                    @error('apellidos')
                                                        <div class="text-danger">{{ 'Ingrese apellidos validos' }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                                <label for="">Area</label>
                                                <select class="form-control" name="area" id="cboArea">
                                                    <option {{ old('area', $alumno->area) == 'CIENCIAS' ? 'selected' : '' }} value="CIENCIAS">Ciencias</option>
                                                    <option {{ old('area', $alumno->area) == 'LETRAS' ? 'selected' : '' }} value="LETRAS">Letras</option>
                                                    <option {{ old('area', $alumno->area) == 'MEDICINA' ? 'selected' : '' }} value="MEDICINA">Medicina</option>
                                                </select>
                                                @error('area')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <label for="">Modalidad</label>
                                                <select class="form-control" name="modalidad" id="cboModalidad">
                                                    <option {{ old('modalidad', $alumno->modalidad) == 'CIENCIAS' ? 'selected' : '' }} value="ORDINARIO">Ordinario</option>
                                                    <option {{ old('modalidad', $alumno->modalidad) == 'CEPUNT' ? 'selected' : '' }} value="CEPUNT">CEPUNT</option>
                                                    <option {{ old('modalidad', $alumno->modalidad) == 'EXCELENCIA' ? 'selected' : '' }} value="EXCELENCIA">Excelencia</option>
                                                </select>
                                                @error('modalidad')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <label for="">Turno</label>
                                                <select class="form-control" name="turno" id="cboTurno">
                                                    <option {{ old('turno', $alumno->turno) == 'AMBOS' ? 'selected' : '' }} value="AMBOS">Mañana - Tarde</option>
                                                    <option {{ old('turno', $alumno->turno) == 'MAÑANA' ? 'selected' : '' }} value="MAÑANA">Mañana</option>
                                                    <option {{ old('turno', $alumno->turno) == 'TARDE' ? 'selected' : '' }} value="TARDE">Tarde</option>
                                                </select>
                                                @error('turno')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div>
                                        <h4>Datos Apoderado</h4>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-16 col-md-6">
                                                <label for="">Nombres</label>
                                                <input type="text" class="form-control" id="txtNombreApoderado"
                                                    name="nombresApoderado" required placeholder="Nombre" value="{{ old('nombresApoderado', $alumno->nombresApoderado) }}">
                                                    @error('nombresApoderado')
                                                        <div class="text-danger">{{ 'Ingrese nombres validos' }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-xs-16 col-md-6">
                                                <label for="">Apellidos</label>
                                                <input type="text" class="form-control" id="txtApellidoApoderado"
                                                    name="apellidosApoderado" required placeholder="apellidos" value="{{ old('apellidosApoderado', $alumno->apellidosApoderado) }}">
                                                    @error('apellidosApoderado')
                                                        <div class="text-danger">{{ 'Ingrese apellidos validos' }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-16 col-md-8">
                                                <label for="">Correo</label>
                                                <input type="email" class="form-control" id="txtEmailApoderado"
                                                    name="emailApoderado" required placeholder="example@example.com" value="{{ old('emailApoderado', $alumno->emailApoderado) }}">
                                                    @error('emailApoderado')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-xs-16 col-md-4">
                                                <label for="">Celular</label>
                                                <input type="text" class="form-control" id="txtCelApoderado"
                                                    name="celularApoderado" required placeholder="999888555" value="{{ old('celularApoderado', $alumno->celApoderado) }}">
                                                    @error('celularApoderado')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                      <br>
                                      <div class="d-flex justify-content-end" style="gap: 5px">
                                          <button type="submit" class="btn btn-primary">Aceptar</button>
                                          <a role="button" class="btn btn-danger" href="{{ route('alumno') }}">Cancelar</a>
                                      </div>
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
