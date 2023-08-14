<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\DetalleAsistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{
    private static $reglasAlumno = [
        'codEstudiante'=>'required|string',
        'nombres' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u'],
        'apellidos' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u'],
        'area' => 'required|string',
        'nivel' => 'nullable|string',
        'modalidad' => 'required|string',
        'turno' => 'required|string',
        'nombresApoderado' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u'],
        'apellidosApoderado' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u'],
        'emailApoderado' => 'nullable|email',
        'celularApoderado' => [
            'required',
            'string',
            'regex:/^(?:\+51\s?)?\d{3}\s?\d{3}\s?\d{3}$/',
        ],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        $rol = Auth()->user()->rol->permisos;
        // dd($alumnos);
        return view('pages.registros.alumno.index', compact('alumnos', 'rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = ['Ciencias','Letras','Medicina'];
        $niveles = ['I','II','III'];
        return view('pages.registros.alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), AlumnoController::$reglasAlumno);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            // dd($errors);
            return redirect()->back()->withInput()->withErrors($validator)->with('error','Error en la consulta.');
        }

        $alumno = new Alumno();
        $alumno->codEstudiante = $request->input('codEstudiante');
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->area = $request->input('area');
        $alumno->modalidad = $request->input('modalidad');
        $alumno->turno = $request->input('turno');
        $alumno->nombresApoderado = $request->input('nombresApoderado');
        $alumno->apellidosApoderado = $request->input('apellidosApoderado');
        $alumno->emailApoderado = $request->input('emailApoderado');
        $alumno->celApoderado = $request->input('celularApoderado');

        if(!$alumno->save()){
            return redirect()->back()->withInput()->with('error', 'Failed to save student record');
        }
        $alumno->save();

        return redirect()->route('alumno')->with('success', 'Student created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('pages.registros.alumno.edit',compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), AlumnoController::$reglasAlumno);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            // dd($errors);
            return redirect()->back()->withInput()->withErrors($validator)->with('error','Error en la consulta.');
        }

        $alumno = Alumno::find($id);
        $alumno->codEstudiante = $request->input('codEstudiante');
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->area = $request->input('area');
        $alumno->modalidad = $request->input('modalidad');
        $alumno->turno = $request->input('turno');
        $alumno->nombresApoderado = $request->input('nombresApoderado');
        $alumno->apellidosApoderado = $request->input('apellidosApoderado');
        $alumno->emailApoderado = $request->input('emailApoderado');
        $alumno->celApoderado = $request->input('celularApoderado');

        if(!$alumno->save()){
            return redirect()->back()->withInput()->with('error', 'Failed to update student record');
        }
        $alumno->save();

        return redirect()->route('alumno')->with('success', 'Student updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect()->route('alumno');
    }

    public function reporteAsistencias($id){

        /*
        $reporte = DB::table('detalle_asistencias', 'DA')
            ->leftJoin('asistencias', 'DA.idAsistencia','=', 'asistencias.id')
            ->leftJoin('alumnos', 'DA.idAlumno', '=', 'alumnos.id')
            ->leftJoin('estado_asistencias', 'DA.idEstado', '=', 'estado_asistencias.id')
            ->select(
                DB::raw('
                    CONCAT(alumnos.nombres, " ", alumnos.apellidos) as nombreAlumno
                '),

            );
        */

        $reporte = DetalleAsistencias::where('idAlumno', $id)->get();
        $alumno = Alumno::find($id);
        $rol = Auth()->user()->rol->permisos;

        return view('pages.registros.alumno.reporte', compact('reporte', 'alumno', 'rol'));
    }

}
