<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $user = DB::table('users')
            ->where('email', $request->usuario) // o cambia el input a email
            ->first();
    
        if (!$user) {
            return back()->with('error', 'Usuario no encontrado');
        }
    
        if (Hash::check($request->password, $user->password)) {
    
            session(['usuario' => $user]);
    
            if ($user->rol == 'profesor') {
                return redirect('/panel');
            } else {
                return redirect('/');
            }
        }
    
        return back()->with('error', 'Contraseña incorrecta');
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