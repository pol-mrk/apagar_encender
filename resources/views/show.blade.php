@extends('layouts.plantilla')
@section('title', 'Gestor de equipo')
@section('content')
    <h1>Incidencia {{$incidencia->titulo_inc}}</h1>
    <a href="{{route('index')}}">Volver a página de incidencias</a>
    <br>
    <a href="{{route('create')}}">Crear una incidencia nueva</a>
    <a href="{{route('edit', $incidencia->id)}}" method="get">Editar este incidencia</a>

    <p>{{$incidencia->nombre_usuario}}</p><h3>{{$incidencia->titulo_inc}}</h3>

    <p>{{$incidencia->desc_inc}}</p>
    <p>{{$incidencia->fecha_inc}}</p>
    <p><b>Subcategoria: </b>{{$incidencia->nombre_subcategoria}}</p>
    <p><b>Técnic: </b>{{$incidencia->nombre_tecnico}}</p>
@endsection