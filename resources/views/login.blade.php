<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Triaje</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>

<div class="cajaLogin">
    <h1>Sistema de Triaje</h1>
    <h2>Iniciar Sesión</h2>

    {{-- Error de login --}}
    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>

        <button type="submit">Entrar</button>
    </form>

    <div class="linkRegistro">
        ¿Eres alumno y no tienes cuenta?<br>
        <a href="/registro">Registrarse como nuevo alumno</a>
    </div>

    <p style="margin-top: 30px; font-size: 0.9em; color: #95a5a6;">
        Solo la profesora puede crear cuentas de profesor.
    </p>
</div>

</body>
</html>