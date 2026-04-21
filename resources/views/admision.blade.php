<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admisión - Triaje</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admision.css') }}">
</head>
<body>

<div class="container">

    <h1>Admisión de Pacientes</h1>
    <p>Registro de nuevos pacientes en el sistema</p>

    {{-- Mensajes --}}
    @if(session('ok'))
        <p class="mensaje exito">Paciente registrado correctamente</p>
    @endif

    @if(session('error'))
        <p class="mensaje error">Error al registrar paciente</p>
    @endif

    <form action="/admision" method="POST" class="formulario">
        @csrf

        <div class="grupo">
            <label>NHC</label>
            <input type="text" name="nhc" required>
        </div>

        <div class="grupo">
            <label>Nombre</label>
            <input type="text" name="nombre" required>
        </div>

        <div class="grupo">
            <label>Edad</label>
            <input type="number" name="edad">
        </div>

        <div class="grupo">
            <label>Teléfono</label>
            <input type="text" name="telefono">
        </div>

        <div class="grupo">
            <label>Alergias</label>
            <textarea name="alergias"></textarea>
        </div>

        <div class="grupo">
            <label>Motivo de consulta</label>
            <textarea name="motivo_consulta"></textarea>
        </div>

        <div class="acciones">
            <button type="submit" class="btn guardar">Registrar paciente</button>

            <a class="btn volver" href="/">⬅ Volver al menú</a>
        </div>

    </form>


</div>

</body>
</html>