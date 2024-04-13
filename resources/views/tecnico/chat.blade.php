<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Título de la página</title>
</head>

<body>
    <a href="{{ url('/tecnicoIndex') }}" class="btn btn-primary">Ir a la página principal</a>

    <div>
        <div id="incidencias">
            @foreach ($incidencias as $incidencia)
                <p>{{ $incidencia->titulo_inc }}</p>
                <p>{{ $incidencia->desc_inc }}</p>
                <p>{{ $incidencia->created_at }}</p>
                <p>{{ $incidencia->nombre_user }}</p>
                <p>{{ $incidencia->nombre_sub_cat }}</p>

                <form action="" method="post" id="frm">
                    <select name="estado" id="estado" class="estado">
                        @foreach ($estados as $estado)
                            @if ($estado->id == $incidencia->id_estado)
                                <option value="{{ $estado->id }}" selected>{{ $estado->nombre_estado }}</option>
                            @else
                                <option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type='hidden' name='idp' id='idp' value='{{ $incidencia->id }}'>
                </form>

                <p>{{ $incidencia->nombre_tecnico }}</p>
                <p> {{ $incidencia->foto_inc }}</p>

        </div>

        <div id="chat" style="width: 25%;">
            <h2>Chat con: {{ $incidencia->nombre_user }}</h2>
            @foreach ($mensajes as $mensaje)
                @if ($mensaje->receptor != 1)
                    <p style="text-align: right; color:red">{{ $mensaje->mensaje }} :{{ $incidencia->nombre_tecnico }}
                    </p>
                @else
                    <p style="text-align: left; color:black">{{ $incidencia->nombre_user }}: {{ $mensaje->mensaje }}
                    </p>
                @endif
            @endforeach
            <form action="" method="post" id="frm">
                {{-- <p>user</p> --}}
                <input type="hidden" value="{{ $incidencia->id_user }}">
                {{-- <p>tecnico</p> --}}
                <input type="hidden" value="{{ $incidencia->tecnico }}">
                <p><input type="text" style="width: 50%"></p>
                <p><input type="submit" value="enviar"></p>
            </form>
            @endforeach
        </div>
    </div>
    {{-- {{ dd($mensajes) }} --}}

</body>
<script src="{{ asset('/js/chat.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
