<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmisionController extends Controller
{
    public function guardar(Request $request)
    {
        try {

        $id = DB::table('pacientes')->insertGetId([
            'nhc' => $request->nhc,
            'nombre' => $request->nombre,
            'edad' => $request->edad ?: null,
            'telefono' => $request->telefono ?: null,
            'alergias' => $request->alergias ?: null,
            'motivo_consulta' => $request->motivo_consulta ?: null,
            'alumno_id' => auth()->id(), //esto coge automáticamente el id del usuario que está logueado y lo guarda en el paciente.
        ]);

        dd(auth()->id()); // línea temporal para depurar
        
        return redirect('/triaje/' . $id);


        } catch (\Exception $e) {
            return back()->with('error', true);
        }
    }
}