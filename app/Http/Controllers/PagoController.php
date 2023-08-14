<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Contrato;
use App\Models\DetalleContrato;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagos = Pago::where('activo',1)->get();
        // dd($alumnos);
        return view('pages.procesos.pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $alumno = Alumno::where('codEstudiante', $request->codEstudiante)->latest()->first();
        if(empty($alumno)){
            return redirect()->route('pago.index')->with('error', 'El codigo de alumno no existe');
        }
        $contrato = Contrato::where('idAlumno',$alumno->id)->where('activo',1)->latest()->first();

        if(empty($contrato)){
            return redirect()->route('pago.index')->with('error', 'El alumno no tiene un contrato');
        }

        $detalleContrato = DetalleContrato::where('idContrato',$contrato->id)->where('pagado',0)->where('eliminado',0)->get();
        
        if($detalleContrato->isEmpty()){
            return redirect()->route('pago.index')->with('error', 'El alumno '.$alumno->nombres.' '.$alumno->apellidos.' tiene todos sus pagos cancelados');
        }
        return view('pages.procesos.pagos.create' , compact('alumno','detalleContrato'));
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
        $idPago = $request->input('cboPago');
        $detalleContrato = DetalleContrato::find($idPago);
        $detalleContrato->pagado = 1;
        $detalleContrato->save();

        $contrato = Contrato::find($detalleContrato->idContrato);
        $alumno = Alumno::find($contrato->idAlumno);

        $pago = new Pago;
        $pago->idDetalleContrato = $detalleContrato->id;
        $pago->monto = $detalleContrato->montoPrevisto;
        $pago->activo = 1;
        $pago->created_at = now();
        $pago->save();
        return redirect()->route('pago.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pago = Pago::find($id);
        $pago->activo = 0;

        $detalleContrato = DetalleContrato::find($pago->idDetalleContrato);
        $detalleContrato->pagado = 0;

        $pago->save();
        $detalleContrato->save();
        return redirect()->route('pago.index');
    }
}
