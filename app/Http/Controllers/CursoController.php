<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $curso=Curso::where('activo',1)->get();
        $rol = Auth()->user()->rol->permisos;
        return view('pages.registros.curso.index',compact('curso', 'rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.registros.curso.create');
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
        $curso = new Curso();
        $curso->nombre=$request->nombre;
        $curso->docente=$request->docente;
        $curso->area=$request->area;
        $curso->nivel=$request->nivel;
        $curso->created_at=now();
        $curso->save();
        return redirect()->route('curso.index');
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
        $curso=Curso::find($id);
        return view('pages.registros.curso.edit',compact('curso'));
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
        $curso = Curso::find($id);
        $curso->nombre=$request->nombre;
        $curso->docente=$request->docente;
        $curso->area=$request->area;
        $curso->nivel=$request->nivel;
        $curso->updated_at=now();
        $curso->save();
        return redirect()->route('curso.index');
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
        $curso= Curso::find($id);
        $curso->activo = 0;
        $curso->save();
        return redirect()->route('curso.index');
    }
}
