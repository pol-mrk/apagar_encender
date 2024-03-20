@extends('layouts.plantilla')
@section('title', 'Gestor de equipo')
@section('content')
    <h1>Gestor de equipo</h1>
    <ul>
        @foreach($incidencias as $incidencia)
            <p>{{$incidencia->nombre_usuario}} <a href="{{route('show', $incidencia->id)}}" style="text-decoration: none; color:black;">{{$incidencia->titulo_inc}}</a></p>
        @endforeach
    </ul>
    {{$incidencias->links()}}
@endsection