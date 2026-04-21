<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtencionController extends Controller
{

    public function ver($id)
    {
        // Obtener paciente
        $paciente = DB::table('pacientes')
            ->where('id', $id)
            ->first();

        // Obtener último triaje del paciente
        $triaje = DB::table('triajes')
            ->where('paciente_id', $id)
            ->latest();
            

        return view('atencion', compact('paciente', 'triaje'));
    }

    public function guardar(Request $request)
    {
        try {

            DB::table('atenciones')->insert([
                'paciente_id' => $request->paciente_id, // 🔥 ahora dinámico
                'anamnesis' => $request->anamnesis ?: null,
                'diagnostico_principal' => $request->diagnostico_principal ?: null,
                'diagnosticos_secundarios' => $request->diagnosticos_secundarios ?: null,
                'tratamiento' => $request->tratamiento ?: null,
                'plan_seguimiento' => $request->plan_seguimiento ?: null,
            ]);

            return redirect('/')->with('ok', true);

        } catch (\Exception $e) {
            return back()->with('error', true);
        }
    }
}