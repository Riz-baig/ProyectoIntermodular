<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de seguimiento</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">

    <h1>Panel de seguimiento</h1>

<table class="tabla">
<thead>
    <tr>
        <th>Paciente</th>
        <th>NHC</th>
        <th>Categoría</th>
        <th>Estado</th>
        <th>Hora</th>
    </tr>
</thead>

<tbody>
    @foreach($pacientes as $p)
    <tr>
        <td>{{ $p->nombre }}</td>
        <td>{{ $p->nhc }}</td>

        <td>
            <span class="badge {{ strtolower($p->categoria ?? 'gris') }}">
                {{ $p->categoria ?? 'Sin triaje' }}
            </span>
        </td>

        <td>
            <span class="estado {{ $p->estado == 'Atendido' ? 'ok' : 'pendiente' }}">
                {{ $p->estado }}
            </span>
        </td>

        <td>
            {{ $p->hora_triaje ? date('H:i', strtotime($p->hora_triaje)) : '-' }}
        </td>
    </tr>
    @endforeach
</tbody>
</table>

</div>

<a href="/panel" class="btn volver">Volver</a>

</body>
</html>