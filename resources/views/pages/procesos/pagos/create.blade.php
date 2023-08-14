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
                                <h2 class="m-0">Registrar Pago</h2>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form action="{{ route('pago.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                         
                                        <div>
                                            <h4>Datos del Contrato:</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="" style="font-weight: bold">Nombre:</label>
                                                <label for="">{{$alumno->nombres}}</label><br>
                                            </div>
                                            <div class="col-6">
                                                <label for="" style="font-weight: bold">Apellidos:</label>
                                                <label for="">{{$alumno->apellidos}}</label><br>
                                            </div>
                                            
                                        </div>
                                        <div class="d-flex mb-3">
                                            <h5 class="pt-3 mx-2">Fecha de pagos restantes:</h5>
                                            
                                        </div>
                                        @foreach ($detalleContrato as $detalle)

                                            <div id="detalleFechas">
                                                <div class="d-flex mb-2">
                                                    <input type="date"  class="form-control w-25 mr-2" name="fechas[]" value="{{$detalle->fechaPago}}" readonly>
                                                    
                                                    <input type="text"  class="form-control w-25 mr-2" placeholder="Monto Cuota" name="montoCuotas[]" value="S/.{{$detalle->montoPrevisto}}" readonly>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                        <div class="d-flex mb-3">
                                            <h5 class="pt-3 mx-2">Fecha de pago a cancelar:</h5>
                                            <div class="col-xs-12 col-md-3">
                                                <select required name="cboPago" id="cboPago" class="form-control">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach ($detalleContrato as $detalle)
                                                        <option value="{{$detalle->id}}">{{$detalle->fechaPago}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-end" style="gap: 5px">
                                        <button type="submit" class="btn btn-primary">Registrar Pago</button>
                                        <a role="button" class="btn btn-danger" href="{{ route('pago.index') }}">Volver</a>
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
                                <button class="btn btn-danger" disabled type="button"><i class="fas fa-times px-0"></i></button>
                            </div>`;
                }else{
                    fila = `<div class="d-flex mb-3">
                                <input required type="date" class="form-control w-25 mr-2" name="fechas[]">
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
                                <button class="btn btn-danger" type="button" onclick="eliminar(event);"><i class="fas fa-times px-0"></i></button>`;
            
            detalleFechas.appendChild(fila);

        }
    </script>
@endsection