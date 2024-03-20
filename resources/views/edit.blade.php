@extends('layouts.plantilla')

@section('title', 'Actualizar incidencia')

@section('content')
    <h1>En esta página podremos editar una incidencia</h1>
    <form action="{{route('update',$incidencia)}}" method="POST">
        @csrf
        @method('put')
        <label for="name">Título: <br>
            <input type="text" name="titulo" id="titulo" value="{{$incidencia->titulo_inc}}">
        </label>
        <br>
        <label for="name">Descripción: <br>
            <textarea name="descripcion" id="descripcion" rows="5">{{$incidencia->desc_inc}}</textarea>
        </label>
        <br>
        <label for="name">Fecha: <br>
            <input type="date" name="fecha" id="fecha" value="{{$incidencia->fecha_inc}}">
        </label>
        <button type="submit">Actualizar formulario</button>
    </form>
@endsection