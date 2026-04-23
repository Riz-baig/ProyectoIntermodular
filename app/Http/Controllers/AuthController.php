<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Si ya está logueado
        if (session()->has('usuario')) {

            if (session('usuario')->rol == 'profesor') {
                return redirect('/panel');
            } else {
                return redirect('/');
            }
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $user = DB::table('usuarios') //laravel lo convierte internamemte en "SELECT * FROM usuarios WHERE usuario = ? AND clave = ?LIMIT 1;"
            ->where('usuario', $request->usuario)
            ->where('clave', $request->password)
            ->first();

        if ($user) {
            session(['usuario' => $user]);

            if ($user->rol == 'profesor') {
                return redirect('/panel');
            } else {
                return redirect('/');
            }
        }

        return back()->with('error', 'Usuario o contraseña incorrectos');
    }

    public function showRegistro()
    {
        return view('registro');
    }

    public function registro(Request $request)
    {
        DB::table('usuarios')->insert([
            'usuario' => $request->usuario,
            'clave' => $request->password,
            'rol' => 'alumno'
        ]);

        return redirect('/login')->with('success', 'Usuario creado correctamente');
    }
}