<?php

namespace App\Http\Controllers;

use App\Centro;
use App\Tecnico;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get()
    {
        $user = Auth::user();
        if ($user->rol=='COORDINADOR'){
            $usuarios = User::orderBy('id', 'ASC')->where('rol','=','TECNICO')->orWhere('rol','=','OPERARIO')->paginate(10);
        }
        else{
            $usuarios = User::orderBy('id', 'ASC')->paginate(10);

        }
        return response()->json($usuarios);
    }

    public function busqueda($busqueda, $opcion)
    {
        switch ($opcion) {
            case 'id':
                $usuarios = User::orderBy('id', 'ASC')->where('id', '=', $busqueda)->paginate(10);
                break;
            case 'nombre':
                $usuarios = User::orderBy('id', 'ASC')->where('nombre', 'LIKE', '%' . $busqueda . '%')->paginate(10);
                break;
            case 'email':
                $usuarios = User::orderBy('id', 'ASC')->where('email', 'LIKE', '%' . $busqueda . '%')->paginate(10);
                break;
            case 'rol':
                $usuarios = User::orderBy('id', 'ASC')->where('rol', 'LIKE', '%' . $busqueda . '%')->paginate(10);
                break;
            case 'habilitado':
                if ($busqueda == 'si') {
                    $usuarios = User::orderBy('id', 'ASC')->where('habilidado', '=', '1')->paginate(10);
                } else {
                    $usuarios = User::orderBy('id', 'ASC')->where('habilidado', '=', '0')->paginate(10);
                }
                break;
        }
        return response()->json($usuarios);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $usuarios = User::all();
        $tecnicos = Tecnico::orderBy('habilitado', 'desc')->orderBy('centro_id', 'asc')->get();
        $centros = Centro::all();

        return view('view_usuarios_tecnicos', ['usuarios' => $usuarios, 'tecnicos' => $tecnicos, 'centros' => $centros, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Llamamos a la vista
        $centros = Centro::all();
        if (Auth::user()->rol === 'GERENTE' || Auth::user()->rol === 'COORDINADOR') {
            return view('view_registro_usuarios', ['centros' => $centros]);
        } else {
            return redirect(route('incidencia.index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert(
            [
                'name' => request('name'),
                'apellido_p' => request('apellido_p'),
                'apellido_s' => request('apellido_s'),
                'email' => request('email'),
                'rol' => request('rol'),
                'password' => Hash::make(request('password')),
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
        if (request('rol') === 'TECNICO') {
            (new TecnicoController)->store(request('name'), request('apellido_p'), request('apellido_s'), request('email'), request('telefono'), $request->input('centro'));
        }
        return redirect(route('incidencia.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $usuario = User::find($id);
        if ($usuario->habilitado == 1) {
            $usuario->habilitado = 0;
        } else {
            $usuario->habilitado = 1;
        }

        $usuario->save();

        if ($usuario->rol == 'TECNICO') {
            $tecnico = Tecnico::where('email', '=', $usuario->email)->first();

            if ($tecnico->habilitado == 1) {
                $tecnico->habilitado = 0;
            } else {
                $tecnico->habilitado = 1;
            }
            $tecnico->save();
        }
        $usuarios = User::orderBy('id', 'ASC')->paginate(10);
        return response()->json($usuarios);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
