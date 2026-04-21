<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function index()
    {
        $pacientes = DB::table('pacientes')
            ->leftJoin('triajes', 'pacientes.id', '=', 'triajes.paciente_id')
            ->leftJoin('atenciones', 'pacientes.id', '=', 'atenciones.paciente_id')
            ->select(
                'pacientes.*',
                'triajes.categoria',
                'triajes.hora_triaje',
                DB::raw('IF(atenciones.id IS NULL, "Pendiente", "Atendido") as estado')
            )
            ->orderByDesc('triajes.hora_triaje')
            ->get();

        return view('seguimiento', compact('pacientes'));
    }
}