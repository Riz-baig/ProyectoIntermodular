<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Atención - Sistema de Triaje</title>

    @vite(['resources/css/app.css', 'resources/css/atencion.css', 'resources/js/app.js'])
</head>
<body>
    //comentario de prueba

<div class="contenedor">

    <div class="cabecera">
        <h1>Atención médica</h1>
        <p>Registro de anamnesis, diagnóstico y tratamiento</p>
    </div>

    <div class="tarjeta-paciente">
        <div class="info-paciente">
            <h2>Paciente seleccionado</h2>
            <p><strong>Nombre:</strong> {{ $paciente->nombre }}</p>
            <p><strong>Edad:</strong> {{ $paciente->edad }}</p>
            <p><strong>NHC:</strong> {{ $paciente->nhc }}</p>
            <p><strong>Alergias:</strong> {{ $paciente->alergias }}</p>
        </div>

        <div class="estado-paciente">
            <span class="badge naranja">{{ $triaje->categoria ?? 'Sin clasificar' }}</span>
            <p><strong>Hora triaje:</strong> {{ $triaje->hora_triaje ?? '-' }}</p>
        </div>
    </div>

    <form action="/atencion" method="POST" class="formulario">
        @csrf

        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">

        <section class="bloque">
            <h3>Anamnesis</h3>
            <textarea name="anamnesis" rows="6"></textarea>
        </section>

        <section class="bloque">
            <h3>Diagnóstico</h3>

            <input type="text" name="diagnostico_principal" placeholder="Diagnóstico principal">

            <textarea name="diagnosticos_secundarios" rows="4" placeholder="Diagnósticos secundarios"></textarea>
        </section>

        <section class="bloque">
            <h3>Tratamiento</h3>

            <textarea name="tratamiento" rows="5"></textarea>

            <textarea name="plan_seguimiento" rows="4"></textarea>
        </section>

        <div class="acciones">
            <a href="/" class="btn volver">Volver</a>
            <button type="submit" class="btn guardar">Finalizar consulta</button>
        </div>

    </form>

</div>

</body>
</html>