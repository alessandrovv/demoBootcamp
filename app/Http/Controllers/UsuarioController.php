<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Rol::where('activo',1)->get();
        $usuarios=User::where('activo',true)->get();
        $rol = Auth()->user()->rol->permisos;
        return view('pages.acceso.usuario.usuario_index',compact('roles','usuarios', 'rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Rol::where('activo',1)->get();
        return view('pages.acceso.usuario.usuario_create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $usuario = new User();
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->idRol = $request->idRol;
            $usuario->password = Hash::make($request->password);
            $usuario->activo = true;
    
            $rpta = $usuario->save();
            if($rpta){
                DB::commit();
                return redirect()->route('usuario.index');
            }else{
                throw new Exception('Ocurrió un error al guardar.',1);
            }
        }catch(Exception $ex){
            //dd($ex->getMessage());
            DB::rollBack();
            session()->flash('error', $ex->getMessage());
            return redirect()->back()->with('errores', [$ex->getMessage()]);
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $roles=Rol::where('activo',1)->get();
        return view('pages.acceso.usuario.usuario_edit',compact('roles','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $usuario = User::find($id);
            

            if(Hash::check($request->password, $usuario->password)){
                $usuario->name = $request->name;
                $usuario->email = $request->email;
                $usuario->idRol = $request->idRol;
                $usuario->password = Hash::make($request->password1);
                $rpta = $usuario->update();
                if($rpta){
                    DB::commit();
                    return redirect()->route('usuario.index');
                }else{
                    throw new Exception('Ocurrió un error al guardar.',1);
                }
            }else{
                throw new Exception('La contraseña ingresada con coincide con la actual.', 2);
            }
    
            
        }catch(Exception $ex){
            //dd($ex->getMessage());
            DB::rollBack();
            session()->flash('error', $ex->getMessage());
            return redirect()->back()->with('errores', [$ex->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::destroy($id);

        return redirect()->route('usuario.index');

    }
}
