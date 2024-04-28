@extends('layouts.plantilla')
@section('title', 'Gestor de equipo')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@section('content')
<body>
  <div id="section1" style="color: white; padding-left: 30px; padding-right: 30px;">
    @foreach ($incidencias as $incidencia)
    <h1><u>Incidencia {{$incidencia->titulo_inc}}</u></h1>
      <div class="flex">
        <a href="{{route('mostrar')}}" class="detalles">Volver</a>
      </div>
      <div class="info">
        <p style="font-size: 18px;">{{ $incidencia->nombre_user }}</p>
        <p style="font-size: 18px;">{{$incidencia->fecha_inc}}</p>
      </div>
      <p>{{ $incidencia->desc_inc }}</p>
      <p><b><u>Subcategoria:</u></b> {{ $incidencia->nombre_sub_cat }}</p>
      <p><b><u>Técnico:</u></b> {{ $incidencia->nombre_tecnico }}</p>
      <p><b><u>Imagen:</u></b> {{ $incidencia->foto_inc }}</u></p>
    @endforeach
  </div>
<link rel="stylesheet" href="{{asset('css/style2.css')}}">
@endsection