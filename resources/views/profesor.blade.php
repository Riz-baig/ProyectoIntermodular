<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">

    <div class="cabecera">
        <h1>Panel de Profesor</h1>
        <p>Bienvenido, {{ session('usuario')->name }}</p>
    </div>

    <h2>Gestión del sistema</h2>
    
    <div class="menu">

        <a href="/admision" class="card">
            <h3>Admisión</h3>
            <p>Registrar pacientes y consultar ingresos</p>
        </a>

        <a href="/triaje" class="card">
            <h3>Triaje</h3>
            <p>Clasificar pacientes según gravedad</p>
        </a>

        <a href="/atencion" class="card">
            <h3>Atención</h3>
            <p>Gestionar anamnesis, pruebas y tratamiento</p>
        </a>

        <a href="/seguimiento" class="card">
            <h3>Panel de seguimiento</h3>
            <p>Control general del servicio</p>
        </a>

        <a href="/registro" class="card">
            <h3>Registrar alumno</h3>
            <p>Dar de alta nuevos alumnos en el sistema</p>
        </a>

    </div>

    <form method="POST" action="/logout">
        @csrf
        <button class="logout">Cerrar sesión</button>
    </form>

</div>

</body>
</html>