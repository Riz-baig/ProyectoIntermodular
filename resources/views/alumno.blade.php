<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio - Triaje</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div onclick="mts()"
        style="position:fixed;bottom:20px;right:20px;background:#2c3e50;color:white;padding:8px 12px;border-radius:20px;cursor:pointer;">
        MTS
    </div>

    <div id="mts"
        style="display:none;position:fixed;bottom:60px;right:20px;background:#34495e;color:white;padding:10px;border-radius:10px;">
        🟥 Rojo - inmediato<br>
        🟧 Naranja - 10 min<br>
        🟨 Amarillo - 60 min<br>
        🟩 Verde - 120 min<br>
        🟦 Azul - 240 min
    </div>

    <script>
        function mts() {
            let p = document.getElementById('mts');
            p.style.display = (p.style.display === 'block') ? 'none' : 'block';
        }
    </script>

    <div class="contenedor dashboard">

        <div class="cabecera-dashboard">

            <div>
                <h1>Bienvenido, {{ session('usuario_nombre')}}</h1>
                <p>Selecciona una opción del sistema</p>
            </div>

            <form method="POST" action="/logout">
                @csrf
                <button class="btn logout">
                    Cerrar sesión
                </button>
            </form>

        </div>


        <div class="menu">

            <a href="/admision" class="card">
                <h3>Registrar paciente</h3>
                <p>Alta de pacientes en urgencias</p>
            </a>

            <a href="/mis-feedbacks" class="card">
                <h3>Mis feedbacks</h3>
                <p>Consulta las valoraciones de tu profesora</p>
            </a>

        </div>

        @if(isset($pacientes) && $pacientes->count())

            <div class="panel-pacientes">

                <h2>Tus pacientes</h2>

                <table class="tabla">

                    <thead>
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

                            <tr>

                                <td>{{ $p->nombre }}</td>

                                <td>{{ $p->nhc }}</td>

                                <td>

                                    @php
                                        $categoria = strtolower(trim($p->categoria ?? 'gris'));
                                    @endphp

                                    <span class="badge {{ $categoria }}">
                                        {{ $p->categoria ?? 'Sin triaje' }}
                                    </span>

                                </td>

                                <td>{{ $p->estado }}</td>

                                <td>
                                    <a href="{{ route('pacientes.show', $p->id) }}" class="btn volver">
                                        Ver
                                    </a>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif
    </div>
</body>

</html>