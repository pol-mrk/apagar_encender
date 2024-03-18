<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
</head>

<body>
    @foreach ($incidencias as $incidencia)
        <p>{{ $incidencia->id }} {{ $incidencia->titulo_inc }}</p>
    @endforeach
    @foreach ($estados as $estado)
        <p>{{ $estado->id }} {{ $estado->nombre_estado }}</p>
    @endforeach
    {{ dd($incidencias) }}

</body>

</html>
