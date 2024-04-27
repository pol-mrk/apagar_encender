@extends('layouts.plantilla')
@section('title', 'Gestor de equipo')
@section('content')
<br><br><br>
<div id="section1">
    <h1>Incidencia {{$incidencia->titulo_inc}}</h1>
    <a href="{{route('index')}}">Volver a página de incidencias</a>

    <p>{{$incidencia->nombre_usuario}}</p><h3>{{$incidencia->titulo_inc}}</h3>

    <p>{{$incidencia->desc_inc}}</p>
    <p>{{$incidencia->fecha_inc}}</p>
    <p><b>Subcategoria: </b>{{$incidencia->nombre_subcategoria}}</p>
    <p><b>Estado: </b>{{$incidencia->nombre_estado}}</p>

    <form action="{{ route('update', $incidencia) }}" method="POST">
        @csrf
        @method('PUT')
    
        <label for="name">Técnico: <br>
            <select name="tecnico">
                @foreach ($tecnicos as $tecnico)
                    {{-- Si la incidencia ya tiene un técnico, mostrar ese técnico, sino, mostrar el primer técnico de la tabla usuarios --}}
                    <option value="{{ $tecnico->id }}" @if ($incidencia->usuarios && $tecnico->id === $incidencia->usuarios->id) selected @endif>
                        {{ $tecnico->nombre_user }}
                    </option>
                @endforeach
            </select>
        </label>
        <br><br>
        
        <label for="name">Prioridad: <br>
            <select name="prioridad">
                @foreach ($prioridades as $prioridad)
                    {{-- Si la incidencia ya tiene una prioridad, mostrar esa prioridad, sino, mostrar la primera prioridad de la tabla prioridades --}}
                    <option value="{{ $prioridad->id }}" @if ($incidencia->prioridades && $prioridad->id === $incidencia->prioridades->id) selected @endif>
                        {{ $prioridad->nombre_prioridad }}
                    </option>
                @endforeach
            </select>
        </label>      
        <br><br>
        <button type="submit">Actualizar formulario</button>
    </form>
</div>
<link rel="stylesheet" href="{{asset('css/style.css')}}"> <!-- Añade los estilos CSS -->
@endsection
