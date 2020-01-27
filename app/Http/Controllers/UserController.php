<?php

namespace App\Http\Controllers;

use App\Centro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update(Request $request, User $user)
    {
        //
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
