<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GrupoController extends Controller
{
    private static $reglasGrupos = [
        'descripcion' => ['required'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grupos = Grupo::all();
        $rol = Auth()->user()->rol->permisos;
        return view('pages.registros.grupo.index',compact('grupos', 'rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.registros.grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGrupoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), GrupoController::$reglasGrupos);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            // dd($errors);
            return redirect()->back()->withInput()->withErrors($validator)->with('error','Error en la consulta.');
        }

        $grupo = new Grupo();
        $grupo->descripcion = $request->input('descripcion');

        if(!$grupo->save()){
            return redirect()->back()->withInput()->with('error', 'Failed to save group record');
        }
        $grupo->save();

        return redirect()->route('grupo.index')->with('success', 'Group created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        return view('pages.registros.grupo.edit',compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGrupoRequest  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), GrupoController::$reglasGrupos);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            // dd($errors);
            return redirect()->back()->withInput()->withErrors($validator)->with('error','Error en la consulta.');
        }

        $grupo = Grupo::find($id);
        $grupo->descripcion = $request->input('descripcion');

        if(!$grupo->save()){
            return redirect()->back()->withInput()->with('error', 'Failed to update group record');
        }
        $grupo->save();

        return redirect()->route('grupo.index')->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect()->route('grupo.index');
    }
}
