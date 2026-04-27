<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Alumno</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="cajaLogin">
    <h1>Sistema de Triaje</h1>
    <h2>Registro de Alumno</h2>

    <!-- IMPORTANTE: CSRF -->
    <form method="POST" action="{{ route('registro.post') }}">
    @csrf

        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Contraseña" required>

        <button type="submit">Registrarse</button>
    </form>

    <div class="linkRegistro">
        <a href="{{ url('/login') }}">Volver al login</a>
    </div>
</div>

</body>
</html>