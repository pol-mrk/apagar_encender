@extends('layouts.plantilla')

@section('title', 'Crear incidencia')

@section('content')
    <h1>En esta página podremos crear una incidencia nueva</h1>
    <form action="{{route('store')}}" method="POST">
        @csrf
        <label for="name">Título: <br>
            <input type="text" name="titulo" id="titulo">
        </label>
        <br>
        <label for="name">Descripción: <br>
            <textarea name="descripcion" id="descripcion" rows="5"></textarea>
        </label>
        <br>
        <label for="name">Fecha: <br>
            <input type="text" name="fecha" id="fecha">
        </label>
        <button type="submit">Enviar formulario</button>
    </form>
@endsection