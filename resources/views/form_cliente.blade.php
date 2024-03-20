{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

<div class="container">
    <h1>FORM | INCIDENCIAS</h1>
    <form action="{{ route('form_cliente.store') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <input type="text" name="titulo_inc" class="form-control" placeholder="Titulo..." value="{{ old('titulo_inc') }}">

        @error('titulo_inc')
        <br>
        <span>*{{ $message }}</span> 
        <br>
        <br>
        @enderror
        <input type="text" name="desc_inc" class="form-control" placeholder="Descripción..." value="{{ old('desc_inc') }}">
        @error('desc_inc')
        <br>
        <span>*{{ $message }}</span> 
        <br>
        <br>
        @enderror
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
        <select name="id_subcat">
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
        <input type="file" name="foto_inc" id="foto_inc">
        @error('foto_inc')
        <br>
        <span>*{{ $message }}</span> 
        <br>
        @enderror
        <br>
        <!-- FALTAN LAS FK -->
        <input type="submit" value="Enviar" name="enviar">
        <a href="/crud_incidencias" class="btn btn-primary">Volver</a>
    </form>
</div>

{{-- @endsection --}}
