<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Rol::where('activo',1)->get();
        $rol = Auth()->user()->rol->permisos;
        return view('pages.acceso.rol_index',compact('roles', 'rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.acceso.rol_create');
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
        $rol = new Rol();
        $rol->name=$request->name;
        $rol->descripcion=$request->descripcion;
        $rol->activo=1;
        $rol->created_at=now();
        $rol->save();
        return redirect()->route('rol.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rol=Rol::find($id);
        return view('pages.acceso.rol_edit',compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rol = Rol::find($id);
        $rol->name = $request->name;
        $rol->descripcion=$request->descripcion;
        $rol->updated_at=now();
        $rol->save();
        return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rol= Rol::find($id);
        $rol->activo = 0;
        $rol->save();
        return redirect()->route('rol.index');
    }
    
    public function editPermisos($id){
        $rol = Rol::find($id);
        $permisos = Permiso::all();
        return view('pages.acceso.permisos', compact('rol', 'permisos'));
    }

    public function updatePermisos(Request $request, $id){
        $rol = Rol::find($id);
        $permisosS = $request->input('permisos', []);

        $rol->permisos()->sync($permisosS);
        return redirect()->route('control');
    }
}
