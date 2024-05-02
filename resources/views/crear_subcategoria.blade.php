@extends('layouts.plantilla')
@section('title', 'Crear subcategoría')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@section('content')
    <br><br><br>
    <div id="section1" style="color: white; padding-left: 30px; padding-right: 30px;">
        <h1 class="flex"><u>Crear nueva subcategoría</u></h1>
        <div class="flex">
            <a href="javascript:history.back()" class="detalles">Volver</a>
        </div>
        <br>
        <form action="{{ route('guardar_subcategoria') }}" method="post">
            @csrf
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" class="label2">
                {{-- Aquí deberías obtener las opciones de categoría desde el controlador y pasarlas a la vista --}}
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre_cat }}</option>
                @endforeach
            </select><br><br>
        
            <label for="nombre_sub_cat">Nombre de la subcategoría:</label>
            <input type="text" name="nombre_sub_cat" class="label2"><br><br>
            <div class="flex">
                <input type="submit" value="Guardar" class="buscar2">
            </div>
        </form>
    </div>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
@endsection