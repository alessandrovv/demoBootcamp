{{-- Extends layout --}}
@extends('layout.default')

@section('styles')
  <style>
    .bg-control-access{
      padding-block: 25px;
      background: linear-gradient(
        to right,
        #4CC2C2 0%,
        #4CC2C2 25%,
        #FFFFFF 25%,
        #FFFFFF 100%
      );
    }
    .strong-control-access{
      font-weight: 900;
    }

    .p-control-access{
      margin-bottom: 0.25rem ;
      font-size: 100%;
      font-family:'Poppins';
      font-weight: 500;
    }
    .success-control-access{
      background: #0DA618;
      color: #FFFFFF;
      font-size: 120%;
      font-weight: 500;
      text-align: center;
      padding-block: 10px;
    }
    .denied-control-access{
      background: #FF0000;
      color: #FFFFFF;
      font-size: 120%;
      font-weight: 500;
      text-align: center;
      padding-block: 10px;
    }
  </style>
    
@endsection

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row">
        <div class="container text-center">
            <div class="row justify-content-center">
              <div class="col-12 ">
                <div></div>
                <H1>Control de Acceso</H1>
                <form @if ($isAsistenciaHabilitada) action='#' @else action="{{route('asistencia.habilitar')}}" @endif  method="get">
                  <button class="btn btn-primary" @if ($isAsistenciaHabilitada) disabled  @endif><i class="fas fa-toggle-on"></i> Habilitar Asistencias de Hoy</button>
                </form>
                
                
              </div>

              <div class="col-md-auto ">
                <div class="row justify-content-center">
                  <div class="col col-lg-7 input-group flex-nowrap " style="padding:20px;">
                      <span class="input-group-text" id="addon-wrapping">Código:</span>
                      <input type="text" class="form-control" id="codigoAlumnoInput" @if($isAsistenciaHabilitada) onkeyup="verificarAlumno(event);" @else disabled @endif  aria-label="Username" aria-describedby="addon-wrapping">
                  </div>
                  <div class="row col col-lg-7 bg-control-access">
                    <div class="col-5">
                        <img src="{{asset('media/users/blank.png')}}" class="img-fluid h-100 w-100" alt="">
                    </div>
                    <div class="col-7 text-left">
                      <img src="{{asset('media/images/logo.png')}}" class="img-fluid mb-4" style="width: 60%;" alt="">
                      <div class="mb-5">
                        <p class="p-control-access"><strong class="strong-control-access">NOMBRE&nbsp;&nbsp;</strong>: <span id="nombreAlumno">MARCELA ANDRADE</span></p>
                        <p class="p-control-access"><strong class="strong-control-access">CODIGO&nbsp;&nbsp;&nbsp;</strong>: <span id="codigoAlumno">1513300219</span></p>
                        <p class="p-control-access"><strong class="strong-control-access">GRUPO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <span id="grupoAlumno">CIENCIAS</span></p>
                      </div>
                      <div class="denied-control-access" id="checkAccess">
                        ACCESO DENEGADO
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                {{-- <img src="media/bg/1.png" style="width:60%;" class="mt-3"> --}}
              </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
      function verificarAlumno(event){
        let codigoAlumnoInput = document.getElementById('codigoAlumnoInput');
        let nombreAlumno = document.getElementById('nombreAlumno');
        let codigoAlumno = document.getElementById('codigoAlumno');
        let grupoAlumno = document.getElementById('grupoAlumno');
        let checkAccess = document.getElementById('checkAccess');

        

        if(event.keyCode == 13){
          axios.get(`/verificar/${codigoAlumnoInput.value}`)
            .then(({data})=>{

              if(data.success && data.success==1){
                checkAccess.classList.remove('success-control-access');
                checkAccess.classList.remove('denied-control-access');
                nombreAlumno.innerText = `${data.alumno.nombres} ${data.alumno.apellidos}`.toUpperCase();
                codigoAlumno.innerText = (data.alumno.codEstudiante).toUpperCase();
                grupoAlumno.innerText = (data.grupo.descripcion).toUpperCase();

                if(data.acceso == true){
                  checkAccess.classList.add('success-control-access');
                  checkAccess.innerText = 'ACCESO PERMITIDO';
                  alert(data.message);
                }else{
                  checkAccess.classList.add('denied-control-access');
                  checkAccess.innerText = 'ACCESO DENEGADO';
                  alert(data.message);
                }
              }else{
                alert(data.message);
              }
              console.log(data);
            })
            .catch(function(data){
              console.log(data);
            });
        }
      }
    </script>
    
@endsection
