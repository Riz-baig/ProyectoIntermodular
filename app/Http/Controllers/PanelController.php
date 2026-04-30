<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(Request $request)
    {
        // Todos los usuarios para el desplegable
        $usuarios = DB::table('users')
            ->select('id', 'name', 'email')
            ->get();

        $pacientes = collect(); // collect es un helper de Laravel para manejar colecciones
        $usuarioSeleccionado = null;

        if ($request->has('usuario_id') && $request->usuario_id != '') 
        {
            $usuarioSeleccionado = $request->usuario_id;

            $pacientes = DB::table('pacientes')
                ->leftJoin('triajes', 'pacientes.id', '=', 'triajes.paciente_id')
                ->leftJoin('atenciones', 'pacientes.id', '=', 'atenciones.paciente_id')
                ->where('pacientes.alumno_id', $usuarioSeleccionado)
                ->select(
                    'pacientes.*',
                    'triajes.categoria',
                    'triajes.hora_triaje',
                    DB::raw('IF(atenciones.id IS NULL, "Pendiente", "Atendido") as estado')
                )
                ->orderByDesc('triajes.hora_triaje')
                ->get();
        }
        return view('seguimiento', compact('pacientes', 'usuarios', 'usuarioSeleccionado'));
    }
    
    public function verPaciente($id)
    {
        $paciente = DB::table('pacientes')->where('id', $id)->first();

        $triaje = DB::table('triajes')->where('paciente_id', $id)->first();

        $atencion = DB::table('atenciones')->where('paciente_id', $id)->first();

        return view('detalle_paciente', compact('paciente', 'triaje', 'atencion'));
    }
}