<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del paciente</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="container">

    <div class="cabecera">
        <h1>Detalle del paciente</h1>
        <p>Información completa registrada por el alumno</p>
    </div>

    {{-- Datos del paciente --}}
    <div class="tarjeta-paciente" style="background:white; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-bottom:20px;">
        <h2>Datos del paciente</h2>
        <p><strong>Nombre:</strong> {{ $paciente->nombre }}</p>
        <p><strong>Edad:</strong> {{ $paciente->edad }}</p>
        <p><strong>NHC:</strong> {{ $paciente->nhc }}</p>
        <p><strong>Teléfono:</strong> {{ $paciente->telefono ?? '-' }}</p>
        <p><strong>Alergias:</strong> {{ $paciente->alergias ?? '-' }}</p>
        <p><strong>Motivo de consulta:</strong> {{ $paciente->motivo_consulta ?? '-' }}</p>
    </div>

    {{-- Clasificación triaje --}}
    <div style="background:white; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-bottom:20px;">
        <h2>Clasificación del triaje</h2>
        @if($triaje)
            <p><strong>Categoría:</strong>
                <span class="badge {{ strtolower($triaje->categoria ?? 'gris') }}">
                    {{ $triaje->categoria ?? 'Sin clasificar' }}
                </span>
            </p>
            <p><strong>Hora triaje:</strong> {{ $triaje->hora_triaje ?? '-' }}</p>
            <p><strong>Flujo:</strong> {{ $triaje->flujo ?? '-' }}</p>
        @else
            <p class="mensaje error">Sin triaje registrado.</p>
        @endif
    </div>

    {{-- Atención médica --}}
    <div style="background:white; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-bottom:20px;">
        <h2>Atención médica</h2>
        @if($atencion)
            <p><strong>Anamnesis:</strong> {{ $atencion->anamnesis ?? '-' }}</p>
            <p><strong>Diagnóstico principal:</strong> {{ $atencion->diagnostico_principal ?? '-' }}</p>
            <p><strong>Diagnósticos secundarios:</strong> {{ $atencion->diagnosticos_secundarios ?? '-' }}</p>
            <p><strong>Tratamiento:</strong> {{ $atencion->tratamiento ?? '-' }}</p>
            <p><strong>Plan de seguimiento:</strong> {{ $atencion->plan_seguimiento ?? '-' }}</p>
        @else
            <p class="mensaje error">Sin atención registrada.</p>
        @endif
    </div>

    <div class="acciones">
        <a href="javascript:history.back()" class="btn volver">Volver</a>
        <a href="/seguimiento/feedback/{{ $paciente->id }}" class="btn guardar">Dar feedback</a>
    </div>

</div>

</body>
</html>