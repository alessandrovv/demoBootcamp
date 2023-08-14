<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asistencia;
use App\Models\Contrato;
use App\Models\DetalleAsistencias;
use App\Models\DetalleContrato;
use App\Models\Grupo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $date = Carbon::parse($now)->toDateString();
        $asistenciaHoy = Asistencia::whereDate('fecha', $date)->first();
        $isAsistenciaHabilitada = (isset($asistenciaHoy) && $asistenciaHoy!=null)?true:false;
        
        return view('pages.control_acceso', compact('isAsistenciaHabilitada'));
    }

    public function habilitarAsistencia(){
        $now = Carbon::now();
        $date = Carbon::parse($now)->toDateString();
        $asistenciaHoy = Asistencia::whereDate('fecha', $date)->first();
        $alumnos = Alumno::all();
        $isAsistenciaHabilitada = (isset($asistenciaHoy) && $asistenciaHoy!=null)?true:false;
        if(!isset($asistenciaHoy) || $asistenciaHoy==null){
            $asistencia = new Asistencia();
            $asistencia->fecha = $date;
            $isAsistenciaHabilitada = $asistencia->save();

            if($isAsistenciaHabilitada){
                foreach($alumnos as $alumno){
                    $detalleAsistencias = new DetalleAsistencias();
                    $detalleAsistencias->idAsistencia = $asistencia->id;
                    $detalleAsistencias->idAlumno = $alumno->id;
                    $detalleAsistencias->idEstado = 2;
                    $detalleAsistencias->save();
                }
            }
        }

        return redirect()->route('control');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function verificarAcceso($codigo){
        $now = Carbon::now();
        $date = Carbon::parse($now)->toDateString();
        $response = array();
        $alumno = Alumno::where('codEstudiante', 'like',$codigo)->orderBy('id','desc')->first();
        if(isset($alumno) && $alumno != null){
            $contrato = Contrato::where('idAlumno', $alumno->id)->orderBy('id', 'desc')->first();
            if(isset($contrato) && $alumno != null){
                $grupo = Grupo::find($contrato->idGrupo);
                $pagosPendientes = DetalleContrato::where('idContrato', $contrato->id)->whereDate('fechaPago', '<', $date)->where('pagado', false)->get();
                $acceso = count($pagosPendientes)>0?false:true;
                $pagoPendienteHoy = DetalleContrato::where('idContrato', $contrato->id)->whereDate('fechaPago', $date)->where('pagado', false)->get();

                $asistenciaHoy = Asistencia::whereDate('fecha', $date)->first();

                if(isset($asistenciaHoy) && $asistenciaHoy!=null){

                    $asistenciaAlumno = DetalleAsistencias::where('idAsistencia', $asistenciaHoy->id)->where('idAlumno', $alumno->id)->first();
                    $asistenciaAlumno->idEstado = $acceso?1:4;
                    $asistenciaAlumno->update();

                    $response = array(
                        'pagosPendientes'=>$pagosPendientes,
                        'pagoPendienteHoy'=>$pagoPendienteHoy,
                        'acceso'=> $acceso,
                        'alumno'=>$alumno,
                        'grupo'=>$grupo,
                        'success'=>1,
                        'message'=> $acceso? 'Asistencia registrada.' : 'Al alumno le hace falta pago(s).',
                    );
                }else{
                    $response = array(
                        'success'=>0,
                        'message'=>'La asistencia de hoy no se encuentra habilitada.',
                    );
                }
        
                
            }else{
                $response = array(
                    'success'=>0,
                    'message'=>'El alumno no tiene contrato.',
                );    
            }
            
        }else{
            $response = array(
                'success'=>0,
                'message'=>'No se encontró al alumno con este código',
                'alumno'=>$alumno
            );
        }
        

        return json_encode($response);
    }
}
