@extends('layouts.plantilla')
@section('title', 'Gestor de equipo')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@section('content')
<br><br><br>
<div id="section1" style="color: white; padding-left: 30px; padding-right: 30px;">
    <h1><u>Incidencia {{$incidencia->titulo_inc}}</u></h1>
    <div class="flex">
        <a href="{{route('gestor')}}" class="detalles">Volver a página de incidencias</a>
    </div>
    <br>
    <div class="info">
        <p style="font-size: 18px;">{{$incidencia->nombre_usuario}}</p>
        <p style="font-size: 18px;">{{$incidencia->fecha_inc}}</p>
    </div>
    <h3><u>{{$incidencia->titulo_inc}}</u></h3>

    <p>{{$incidencia->desc_inc}}</p>
    <p><b><u>Subcategoria:</u> </b>{{$incidencia->nombre_subcategoria}}</p>
    <p><b><u>Estado:</u> </b>{{$incidencia->nombre_estado}}</p>
    <br>
    <form action="{{ route('update', $incidencia) }}" method="POST">
        @csrf
        @method('PUT')
    
        <label for="name"><u>Técnico:</u><br>
            <select name="tecnico" class="label">
                @foreach ($tecnicos as $tecnico)
                    {{-- Si la incidencia ya tiene un técnico, mostrar ese técnico, sino, mostrar el primer técnico de la tabla usuarios --}}
                    <option value="{{ $tecnico->id }}" @if ($incidencia->usuarios && $tecnico->id === $incidencia->usuarios->id) selected @endif>
                        {{ $tecnico->nombre_user }}
                    </option>
                @endforeach
            </select>
        </label>
        <br><br>
        <label for="name"><u>Prioridad:</u><br>
            <select name="prioridad" class="label">
                @foreach ($prioridades as $prioridad)
                    {{-- Si la incidencia ya tiene una prioridad, mostrar esa prioridad, sino, mostrar la primera prioridad de la tabla prioridades --}}
                    <option value="{{ $prioridad->id }}" @if ($incidencia->prioridades && $prioridad->id === $incidencia->prioridades->id) selected @endif>
                        {{ $prioridad->nombre_prioridad }}
                    </option>
                @endforeach
            </select>
        </label>      
        <br><br>
        <div class="flex">
          <button type="submit" class="act-form" style="font-size: 16px;">Actualizar formulario</button>
        </div>
    </form>
</div>
<link rel="stylesheet" href="{{asset('css/style2.css')}}">
@endsection