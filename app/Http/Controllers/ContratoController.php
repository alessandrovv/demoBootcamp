<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Contrato;
use App\Models\DetalleContrato;
use App\Models\Grupo;
use App\Models\Plan;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::where('activo',1)->get();
        $rol = Auth()->user()->rol->permisos;
        // dd($alumnos);
        return view('pages.procesos.contratos.index', compact('contratos', 'rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::all();
        $planes = Plan::all();
        return view('pages.procesos.contratos.create', compact('grupos', 'planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $idAlumno = 0;
        $codEstudiante = $request->input('codEstudiante');
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $area = $request->input('area');
        $modalidad = $request->input('modalidad');
        $turno = $request->input('turno');
        $nombresApoderado = $request->input('nombresApoderado');
        $apellidosApoderado = $request->input('apellidosApoderado');
        $emailApoderado = $request->input('emailApoderado');
        $celApoderado = $request->input('celApoderado');

        $periodoMatricula = $request->input('periodoMatricula');
        $grupo = $request->input('grupo');
        $plan = $request->input('plan');
        $nroCuotas = $request->input('nroCuotas');
        $descuento = $request->input('descuento');
        $descuentoPorcentaje = $request->input('descuentoPorcentaje');
        $fechas = $request->input('fechas');
        $montoCuotas = $request->input('montoCuotas');

        $montoPlan = Plan::find($plan)->costo;

        $montoTotal = 0;
        if(isset($descuento) && $descuento !=null){
            if($descuentoPorcentaje != null){
                $montoTotal = $montoPlan - $montoPlan*$descuento/100;
            }else{
                $montoTotal = $montoPlan - $descuento;
            }
        }

        $alumno = Alumno::where('codEstudiante', 'like',$codEstudiante)->orderBy('id','desc')->first();

        // monto por cuota
        $precio = Plan::find($plan);
        $montoPrevisto = ($precio->costo/$nroCuotas);


        if(isset($alumno) && $alumno!=null){
            $idAlumno = $alumno->id;
        }else{
            $newAlumno = new Alumno();
            $newAlumno->codEstudiante = $codEstudiante;
            $newAlumno->nombres = $nombres;
            $newAlumno->apellidos = $apellidos;
            $newAlumno->area = $area;
            $newAlumno->modalidad = $modalidad;
            $newAlumno->turno = $turno;
            $newAlumno->nombresApoderado = $nombresApoderado;
            $newAlumno->apellidosApoderado = $apellidosApoderado;
            $newAlumno->emailApoderado = $emailApoderado;
            $newAlumno->celApoderado = $celApoderado;
            $newAlumno->save();
            $idAlumno = $newAlumno->id;
        }

        $contrato = new Contrato();
        $contrato->idAlumno = $idAlumno;
        $contrato->periodoMatricula = $periodoMatricula;
        $contrato->idGrupo = $grupo;
        $contrato->idPlan = $plan;
        $contrato->nroCuotas = $nroCuotas;
        $contrato->descuento = $descuento;
        $contrato->descuentoPorcentaje = $descuentoPorcentaje!=null?true:false;;
        $contrato->montoTotal = $montoTotal;
        $contrato->estado = 'A';
        $contratoSave =  $contrato->save();

        if($contratoSave){
            $index = 0;
            foreach($fechas as $fecha){
                $detalleContrato = new DetalleContrato();
                $detalleContrato->idContrato = $contrato->id;
                $detalleContrato->fechaPago = $fecha;
                $detalleContrato->montoPrevisto = $montoCuotas[$index];
                $detalleContrato->save();
                $index++;
            }

            return redirect()->route('contrato.index')->with('success', 'Contrato creado correctamente.');
        }else{
            return redirect()->back()->withInput()->with('error', 'Error al guardar contrato.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contrato::find($id);
        $fechas = DetalleContrato::where('idContrato', $contrato->id)->where('eliminado', false)->orderBy('id', 'asc')->get();
        $isFechaPagada = count(DetalleContrato::where('idContrato', $contrato->id)->where('eliminado',false)->where('pagado', true)->get())>0?true:false;
        $alumno = Alumno::where('id', $contrato->idAlumno)->first();
        $grupos = Grupo::all();
        $planes = Plan::all();
        //dd($isFechaPagada);
        return view('pages.procesos.contratos.edit', compact('grupos', 'planes', 'contrato', 'fechas', 'alumno', 'isFechaPagada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $idAlumno = $request->input('idAlumno');
        $periodoMatricula = $request->input('periodoMatricula');
        $grupo = $request->input('grupo');
        $plan = $request->input('plan');
        $nroCuotas = $request->input('nroCuotas');
        $descuento = $request->input('descuento');
        $descuentoPorcentaje = $request->input('descuentoPorcentaje');

        $idFechas = $request->input('idFechas');
        $eliminados = $request->input('eliminados');
        $fechas = $request->input('fechas');
        $montoCuotas = $request->input('montoCuotas');

        $montoPlan = Plan::find($plan)->costo;

        $montoTotal = 0;
        if(isset($descuento) && $descuento !=null){
            if($descuentoPorcentaje != null){
                $montoTotal = $montoPlan - $montoPlan*$descuento/100;
            }else{
                $montoTotal = $montoPlan - $descuento;
            }
        }

        $contrato = Contrato::find($id);
        //$contrato->idAlumno = $idAlumno;
        $contrato->periodoMatricula = $periodoMatricula;
        $contrato->idGrupo = $grupo;
        $contrato->idPlan = $plan;
        $contrato->nroCuotas = $nroCuotas;
        $contrato->descuento = $descuento;
        $contrato->descuentoPorcentaje = $descuentoPorcentaje!=null?true:false;;
        $contrato->montoTotal = $montoTotal;
        $contratoSave =  $contrato->update();

        //$result = DetalleContrato::where('idContrato', $id)->delete();
        if($contratoSave){
            for($i=0;$i<count($idFechas); $i++){
                if($idFechas[$i] == 0){
                    $detalleContrato = new DetalleContrato();
                    $detalleContrato->idContrato = $contrato->id;
                    $detalleContrato->fechaPago = $fechas[$i];
                    $detalleContrato->montoPrevisto = $montoCuotas[$i];
                    $detalleContrato->save();
                }else{
                    $detalleContrato = DetalleContrato::find($idFechas[$i]);
                    $detalleContrato->idContrato = $contrato->id;
                    $detalleContrato->fechaPago = $fechas[$i];
                    $detalleContrato->montoPrevisto = $montoCuotas[$i];
                    $detalleContrato->eliminado = $eliminados[$i];
                    $detalleContrato->update();
                }
            }

            return redirect()->route('contrato.index')->with('success', 'Contrato actualizado correctamente.');
        }else{
            return redirect()->back()->withInput()->with('error', 'Error al actualizar contrato.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->activo = 0;
        $contrato->save();
        return redirect()->route('contrato.index')->with('success', 'Contrato eliminado correctamente.');
    }

    public function buscarCodigoEstudiante($codigo){
        $alumno = Alumno::where('codEstudiante','like', $codigo)->orderBy('id','desc')->first();

        return json_encode(['alumno'=>$alumno]);
    }
}
