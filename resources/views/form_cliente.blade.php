@extends('layouts.plantilla')
@section('title', 'Nueva incidencia')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@section('content')
    <div id="section1" style="color: white; padding-left: 30px; padding-right: 30px;">
        <h1 class="flex">Crear incidencia</h1>
        <div class="flex">
            <a href="/crud_incidencias" class="detalles">Volver</a>
        </div>
        <form action="{{ route('form_cliente.store') }}" method="post" class="formCreate" type="multipart/form-data" enctype="multipart/form-data">
            @csrf 
            <input type="text" name="titulo_inc" class="form-control" placeholder="Titulo..." value="{{ old('titulo_inc') }}">

            @error('titulo_inc')
            <br>
            <span>*{{ $message }}</span> 
            <br>
            <br>
            @enderror
            <br>
            <input type="text" name="desc_inc" class="form-control" placeholder="Descripción..." value="{{ old('desc_inc') }}">
            @error('desc_inc')
            <br>
            <span>*{{ $message }}</span> 
            <br>
            <br>
            @enderror
            <br>
            <label for="">Fecha:</label>
            <input type="date" name="fecha_inc" value="{{ old('fecha_inc') }}">
            @error('fecha_inc')
            <br>
            <span>*{{ $message }}</span> 
            <br>
            <br>
            @enderror
            <br>
            <label for="">Subcategoria:</label>
            <select name="id_subcat" class="label2">
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id_categoria }}">{{ $subcategoria->nombre_sub_cat }}</option>
                @endforeach
            </select>
            @error('id_subcat')
            <br>
            <span>*{{ $message }}</span> 
            <br>
            @enderror
            <br>
            <label for="file">Añade una imagen:</label>
            <br>
            <input type="file" name="file" id="file" accept="image/*">
            @error('file')
            <br>
            <span>*{{ $message }}</span> 
            <br>
            @enderror
            <br>
            <div class="flex">
                <!-- FALTAN LAS FK -->
                <input type="hidden" name="id_estado" id="id_estado" value="1">
                <input type="submit" value="Enviar" name="enviar" id="resolta">
            </div>
        </form>
    </div>
<link rel="stylesheet" href="{{asset('css/style2.css')}}">
@endsection