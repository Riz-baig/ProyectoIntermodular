<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio - Triaje</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="container">

        <h1>Bienvenido, {{ session('usuario')->name }}</h1>
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

            <a href="/mis-feedbacks" class="card">
                <h3>Mis feedbacks</h3>
                <p>Consulta las valoraciones de tu profesora</p>
            </a>

        </div>

        @if(isset($pacientes) && $pacientes->count())

            <div style="margin-top:30px;">

                <h3 style="margin-bottom:10px;">Tus pacientes</h3>

                <table style="width:100%; background:white; border-radius:10px;">
                    <thead style="background:#2c3e50; color:white;">
                        <tr>
                            <th>Paciente</th>
                            <th>NHC</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pacientes as $p)
                            <tr style="text-align:center;">
                                <td>{{ $p->nombre }}</td>
                                <td>{{ $p->nhc }}</td>

                                <td>{{ $p->categoria ?? 'Sin triaje' }}</td>
                                <td>{{ $p->estado }}</td>

                                <td>
                                    <a href="{{ route('pacientes.show', $p->id) }}">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        @endif

        <form method="POST" action="/logout">
            @csrf
            <button class="logout"><strong>Cerrar sesión</strong></button>
        </form>

    </div>

</body>

</html>