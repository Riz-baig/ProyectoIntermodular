<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Triaje</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

<div class="container">

    <h1>Bienvenido, {{ session('usuario')->usuario }}</h1>
    <p>Selecciona una opción del sistema</p>

    <div class="menu">



        <a href="/admision" class="card">
            <h3>Registrar paciente</h3>
            <p>Alta de pacientes en urgencias</p>
        </a>

        <a href="/triaje" class="card">
            <h3>Triaje</h3>
            <p>Evaluación de gravedad</p>
        </a>

        <a href="/atencion" class="card">
            <h3>Atención</h3>
            <p>Diagnóstico y tratamiento</p>
        </a>

    </div>

    <form method="POST" action="/logout">
        @csrf
        <button class="logout"><strong>Cerrar sesión</strong></button>
    </form>

</div>

</body>
</html>