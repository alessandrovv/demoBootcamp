<div class="form-group">
    <div>
        <h4>Datos del alumno:</h4>
    </div>

    <div class="row">
        <button type="button" class="btn btn-primary ml-3 mb-4" onclick="limpiarCampos();"><i class="fas fa-broom"></i> Limpiar Campos</button>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <label for="">Codigo</label>
            <div class="d-flex">
                <input @if ($modo>1) disabled @endif type="text" class="form-control" id="txtCodigo" name="codEstudiante" @if (isset($data) && $data!=null) value="{{$data->codEstudiante}}" @endif required placeholder="1513300123">
                @if ($modo==1)
                <button onclick="buscarAlumno();" type="button" class="btn btn-success ml-1"><i class="fas fa-search"></i></button>
                @endif
                
            </div>
            @error('codEstudiante')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-md-5">
            <label for="">Nombres</label>
            <input @if ($modo>1) disabled @endif type="text" class="form-control" id="txtNombre" name="nombres" @if (isset($data) && $data!=null) value="{{$data->nombres}}" @endif
                required placeholder="Nombre" >
            @error('nombres')
                <div class="text-danger">{{ 'Ingrese nombres validos' }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-md-4">
            <label for="">Apellidos</label>
            <input @if ($modo>1) disabled @endif type="text" class="form-control" id="txtApellido" name="apellidos" @if (isset($data) && $data!=null) value="{{$data->apellidos}}" @endif
                required placeholder="apellidos" >
                @error('apellidos')
                    <div class="text-danger">{{ 'Ingrese apellidos validos' }}</div>
                @enderror
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <label for="">Area</label>
            <select @if ($modo>1) disabled @endif class="form-control" name="area" id="cboArea">
                <option  value="">Seleccionar...</option>
                <option @if (isset($data) && $data!=null && $data->area == "CIENCIAS") selected @endif value="CIENCIAS">Ciencias</option>
                <option @if (isset($data) && $data!=null && $data->area == "LETRAS")   selected @endif value="LETRAS">Letras</option>
                <option @if (isset($data) && $data!=null && $data->area == "MEDICINA") selected @endif value="MEDICINA">Medicina</option>
            </select>
            @error('area')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-md-4">
            <label for="">Modalidad</label>
            <select @if ($modo>1) disabled @endif class="form-control" name="modalidad" id="cboModalidad">
                <option value="">Seleccionar...</option>
                <option @if (isset($data) && $data!=null && $data->modalidad == "ORDINARIO") selected @endif value="ORDINARIO">Ordinario</option>
                <option @if (isset($data) && $data!=null && $data->modalidad == "CEPUNT")   selected @endif value="CEPUNT">CEPUNT</option>
                <option @if (isset($data) && $data!=null && $data->modalidad == "EXCELENCIA") selected @endif value="EXCELENCIA">Excelencia</option>
            </select>
            @error('modalidad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-md-4">
            <label for="">Turno</label>
            <select @if ($modo>1) disabled @endif class="form-control" name="turno" id="cboTurno">
                <option value="">Seleccionar...</option>
                <option @if (isset($data) && $data!=null && $data->turno == "AMBOS") selected @endif value="AMBOS">Mañana - Tarde</option>
                <option @if (isset($data) && $data!=null && $data->turno == "MAÑANA")   selected @endif value="MAÑANA">Mañana</option>
                <option @if (isset($data) && $data!=null && $data->turno == "TARDE") selected @endif value="TARDE">Tarde</option>
            </select>
            @error('turno')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <hr>
    <div>
        <h4>Datos Apoderado</h4>
    </div>

    <div class="row">
        <div class="col-xs-16 col-md-6">
            <label for="">Nombres</label>
            <input @if ($modo>1) disabled @endif type="text" class="form-control" id="txtNombreApoderado"
                name="nombresApoderado" @if (isset($data) && $data!=null) value="{{$data->nombresApoderado}}" @endif required placeholder="Nombre" >
                @error('nombresApoderado')
                    <div class="text-danger">{{ 'Ingrese nombres validos' }}</div>
                @enderror
        </div>
        <div class="col-xs-16 col-md-6">
            <label for="">Apellidos</label>
            <input @if ($modo>1) disabled @endif type="text" class="form-control" id="txtApellidoApoderado"
                name="apellidosApoderado" @if (isset($data) && $data!=null) value="{{$data->apellidosApoderado}}" @endif required placeholder="apellidos" >
                @error('apellidosApoderado')
                    <div class="text-danger">{{ 'Ingrese apellidos validos' }}</div>
                @enderror
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-16 col-md-8">
            <label for="">Correo</label>
            <input @if ($modo>1) disabled @endif type="email" class="form-control" id="txtEmailApoderado"
                name="emailApoderado" @if (isset($data) && $data!=null) value="{{$data->emailApoderado}}" @endif required placeholder="example@example.com" >
                @error('emailApoderado')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-xs-16 col-md-4">
            <label for="">Celular</label>
            <input @if ($modo>1) disabled @endif type="text" class="form-control" id="txtCelApoderado"
                name="celApoderado" @if (isset($data) && $data!=null) value="{{$data->celApoderado}}" @endif required placeholder="999888555" >
                @error('celApoderado')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
    </div>
</div>
<script type="text/javascript">
    function buscarAlumno(){
            let codigo = document.getElementById('txtCodigo').value;
            const txtNombre = document.getElementById('txtNombre');
            const txtApellido = document.getElementById('txtApellido');
            const cboArea = document.getElementById('cboArea');
            const cboModalidad = document.getElementById('cboModalidad');
            const cboTurno = document.getElementById('cboTurno');
            const txtNombreApoderado = document.getElementById('txtNombreApoderado');
            const txtApellidoApoderado = document.getElementById('txtApellidoApoderado');
            const txtEmailApoderado = document.getElementById('txtEmailApoderado');
            const txtCelApoderado = document.getElementById('txtCelApoderado');
            
            const txtIdAlumno = document.getElementById('txtIdAlumno');

            if( codigo || codigo != '' ){
                axios.get(`/buscarCodigo/${codigo}`)
                .then(function(data){
                    if(data.data.alumno && data.data.alumno != null){
                        let alumno = data.data.alumno;
                        txtNombre.value = alumno.nombres;
                        txtApellido.value = alumno.apellidos;
                        cboArea.value = alumno.area;
                        cboModalidad.value = alumno.modalidad;
                        cboTurno.value = alumno.turno;
                        txtNombreApoderado.value = alumno.nombresApoderado;
                        txtApellidoApoderado.value = alumno.apellidosApoderado;
                        txtEmailApoderado.value = alumno.emailApoderado;
                        txtCelApoderado.value = alumno.celApoderado;
                    }
                    console.log(data);
                })
                .catch(function(error){

                })
            }
        }

        function limpiarCampos(){
            let codigo = document.getElementById('txtCodigo');
            const txtNombre = document.getElementById('txtNombre');
            const txtApellido = document.getElementById('txtApellido');
            const cboArea = document.getElementById('cboArea');
            const cboModalidad = document.getElementById('cboModalidad');
            const cboTurno = document.getElementById('cboTurno');
            const txtNombreApoderado = document.getElementById('txtNombreApoderado');
            const txtApellidoApoderado = document.getElementById('txtApellidoApoderado');
            const txtEmailApoderado = document.getElementById('txtEmailApoderado');
            const txtCelApoderado = document.getElementById('txtCelApoderado');

            codigo.value = '';
            txtNombre.value = '';
            txtApellido.value = '';
            cboArea.value = '';
            cboModalidad.value = '';
            cboTurno.value = '';
            txtNombreApoderado.value = '';
            txtApellidoApoderado.value = '';
            txtEmailApoderado.value = '';
            txtCelApoderado.value = '';

            codigo.focus();
        }
</script>