{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="m-0">Registrar Contrato</h2>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form action="{{ route('contrato.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="form-group">
                                        <div class="row col-4">
                                            <label for="">Buscar Codigo Alumno</label>
                                            <div class="d-flex">
                                                <input type="text" id="txtCodigo" required name="codEstudiante" class="form-control mr-1" placeholder="1513300123">
                                                <button onclick="buscarAlumno();" type="button" class="btn btn-success"><i class="fas fa-search"></i></button>
                                            </div>
                                            
                                        </div>
                                    </div> --}}

                                    @include('pages.procesos.componentes.form-alumno', ['data'=>null, 'modo'=>1])
                                    
                                    <div class="form-group">
                                        {{-- <div class="row">
                                            <div class="col-xs-16 col-md-6">
                                                <input type="text" hidden id="txtIdAlumno" required name="idAlumno">
                                                <div>
                                                    <h4>Datos del Apoderado:</h4>
                                                </div>
                                                <div>
                                                    <p><strong>Nombre: </strong><span id="nombreApoderado"></span></p>
                                                    <p><strong>Email: </strong><span id="emailApoderado"></span></p>
                                                    <p><strong>Teléfono: </strong><span id="telefonoApoderado"></span></p>
                                                </div>
                                            </div>
                                            <div class="col-xs-16 col-md-6">
                                                <div>
                                                    <h4>Datos del Alumno:</h4>
                                                </div>
                                                <div>
                                                    <p><strong>Nombre: </strong><span id="nombreEstudiante"></span></p>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <hr>
                                        <div>
                                            <h4>Datos del Contrato:</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                                <label for="">Periodo de Matricula</label>
                                                <input type="text" class="form-control" id="txtPeriodo" name="periodoMatricula"
                                                     placeholder="Periodo" required>
                                            </div>
                                            <div class="col-xs-12 col-md-3">
                                                <label for="">Grupo</label>
                                                <select required name="grupo" id="cboGrupo" class="form-control">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach ($grupos as $grupo)
                                                        <option value="{{$grupo->id}}">{{$grupo->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-3">
                                                <label for="">Plan</label>
                                                <select required name="plan" id="cboPlan" class="form-control">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach ($planes as $plan)
                                                        <option value="{{$plan->id}}">{{$plan->descripcion}} - S/ {{$plan->costo}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-2">
                                                <label for="">Nº Cuotas</label>
                                                <div class="d-flex">
                                                    <input type="number" value="1" min="1" class="form-control mr-1" id="txtNroCuotas" name="nroCuotas"
                                                    required>
                                                    <button onclick="generarFechas();"  title="Generar cuotas" type="button" class="btn btn-primary"><i class="fas fa-file-invoice-dollar px-0"></i></button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                                <label for="">Descuento</label>
                                                <input type="text" class="form-control" id="txtDescuento" name="descuento"
                                                     placeholder="Descuento">
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <label for="">¿Descuento por Porcentaje?</label>

                                                <span class="switch switch-info switch-icon ">
                                                    <label>
                                                        <input type="checkbox"  name="descuentoPorcentaje"/>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="d-flex mb-3">
                                            <h5 class="pt-3 mx-2">Fecha de Pagos:</h5>
                                            <button onclick="agregar();" title="Agregar cuota" type="button" class="btn btn-success"><i class="fas fa-plus px-0"></i></button>
                                        </div>
                                        <div id="detalleFechas">
                                            <div class="d-flex mb-3">
                                                <input type="date" required class="form-control w-25 mr-2" name="fechas[]">
                                                <input type="text" required class="form-control w-25 mr-2" placeholder="Monto Cuota" name="montoCuotas[]">
                                                <button class="btn btn-danger" disabled type="button"><i class="fas fa-times px-0"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-end" style="gap: 5px">
                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                        <a role="button" class="btn btn-danger" href="{{ route('contrato.index') }}">Cancelar</a>
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
        if (
            window.localStorage.getItem('darkMode') == null) {
            window.localStorage.setItem('darkMode', false);
            darkMode = false
        } else {
            if (window.localStorage.getItem('darkMode') === 'true')
                darkMode = true
            else {
                darkMode = false
            }
        }

        console.log(window.localStorage.getItem('darkMode'));
        document.addEventListener('alpine:init', () => {
            Alpine.store('darkMode', {
                on: darkMode,
                toggle() {
                    this.on = !this.on;
                    window.localStorage.setItem('darkMode', !darkMode);
                }
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    @isset($js)
        {{ $js }}
    @endisset


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        let nroCuotas = 0;

        function generarFechas(){
            let cuotas = document.getElementById('txtNroCuotas').value;
            let detalleFechas = document.getElementById('detalleFechas');
            console.log(cuotas);
            nroCuotas = cuotas;
            let fechas = '';
            for(let i=0; i<nroCuotas; i++){
                let fila = '';
                if(i==0){
                    fila = `<div class="d-flex mb-3">
                                <input required type="date" class="form-control w-25 mr-2" name="fechas[]">
                                <input type="text" required placeholder="Monto Cuota" class="form-control w-25 mr-2" name="montoCuotas[]">
                                <button class="btn btn-danger" disabled type="button"><i class="fas fa-times px-0"></i></button>
                            </div>`;
                }else{
                    fila = `<div class="d-flex mb-3">
                                <input required type="date" class="form-control w-25 mr-2" name="fechas[]">
                                <input type="text" required placeholder="Monto Cuota" class="form-control w-25 mr-2" name="montoCuotas[]">
                                <button class="btn btn-danger"  type="button" onclick="eliminar(event);"><i class="fas fa-times px-0"></i></button>
                            </div>`;
                }
                
                fechas += fila;
            }

            detalleFechas.innerHTML = fechas;
        }

        function eliminar(event){
            console.log(event);
            console.log(event.target.closest('div'));
            event.target.closest('div').remove();
            nroCuotas -=1;
        }

        function agregar(){

            nroCuotas +=1;
            document.getElementById('txtNroCuotas').value = nroCuotas;
            let detalleFechas = document.getElementById('detalleFechas');

            let fila = document.createElement('div');
            fila.classList.add('d-flex');
            fila.classList.add('mb-3');
            fila.innerHTML = `<input type="date" required class="form-control w-25 mr-2" name="fechas[]">
                                <input type="text" required placeholder="Monto Cuota" class="form-control w-25 mr-2" name="montoCuotas[]">
                                <button class="btn btn-danger" type="button" onclick="eliminar(event);"><i class="fas fa-times px-0"></i></button>`;
            
            detalleFechas.appendChild(fila);

        }
    </script>
@endsection