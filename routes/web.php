<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdmisionController;//admision
use App\Http\Controllers\TriajeController;//triaje
use App\Http\Controllers\AtencionController;//atencion
use App\Http\Controllers\PanelController;//panel de control para profesor
/*use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;*/ //es para crear profesor

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/admision', [AdmisionController::class, 'guardar']);//admision
Route::get('/triaje/{id}', [TriajeController::class, 'ver']);//triaje
Route::post('/triaje', [TriajeController::class, 'guardar']);//triaje
Route::get('/atencion/{id}', [AtencionController::class, 'ver']);//atencion
Route::post('/atencion', [AtencionController::class, 'guardar']);//atencion
Route::get('/seguimiento', [PanelController::class, 'index']); //panel de control para prof
Route::get('/registro', [AuthController::class, 'showRegistro'])->name('registro');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro.post');//registrar nuevos alumnos


/*
Route::get('/crear-profesor', function () {
    DB::table('users')->updateOrInsert(
        ['email' => 'profesor@correo.com'],
        [
            'name' => 'profesor1',
            'password' => Hash::make('123456'),
            'rol' => 'profesor'
        ]
    );

    return "Profesor creado correctamente";
});*/  //es para crear profesor, desde sql no admitia hash.




//sesion profesor
Route::get('/panel', function () { //dirige a la ruta del panel

    if (!session()->has('usuario')) { // so no ha iniiado sesion, no deja entrar
        return redirect('/login');
    }

    return view('profesor');
});


//sesion alumno
Route::get('/', function () {

    if (!session()->has('usuario')) {
        return redirect('/login');
    }

    if (session('usuario')->rol != 'alumno') {
        return redirect('/panel');
    }

    return view('alumno');
});

//admision
Route::get('/admision', function () {

    if (!session()->has('usuario')) {
        return redirect('/login');
    }

    return view('admision');
});


//triaje
Route::get('/triaje', function () {

    if (!session()->has('usuario')) {
        return redirect('/login');
    }

    return view('triaje');
});


//logout
Route::post('/logout', function () { 
    Session::flush();
    return redirect('/login');
});
