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
        $user = DB::table('usuarios')
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
}