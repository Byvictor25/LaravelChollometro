@extends('layouts/chollometro')
@section('titulo', 'Añadir chollo')
@section('contenido')
    <div class="row">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-dismissable text-center">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endforeach
        @endif
        <div class="col-lg-4"></div>
        <div class="col-sm-6 col-md-4 col-lg-4 m-2" id="addGanga">
            <form action="{{ route('ganga.store') }}" method='POST' enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend class="bg-dark text-white text-center">Añadir Chollo</legend>
                    <div class="form-group">
                        <label for="title">Título:</label>
                        <input type="text" class="form-control" name="title" id="titulo"
                               value="{!! old('title') !!}">
                    </div>
                    <div class="form-group">
                        <label for="description">Contenido:</label>
                        <textarea class="form-control" name="description" id="content">
                            {!! old('description') !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">Enlace del Chollo:</label>
                        <input type="text" class="form-control" name="url" id="titulo"
                               value="{!! old('url') !!}">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoría:</label>
                        <select class="form-control" name="category">
                            <option id="category">--- Selecciona categoría ---</option>
                            @foreach($categorias as $categoria)
                                <option id="category" value="{{ $categoria->id }}"> {{ $categoria->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio:</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price_sale">Precio de salida:</label>
                        <input type="number" name="price_sale" class="form-control">
                    </div>
                    <div class="form-group">
                        Selecciona Imagen: <input name="image" type="file" />
                    </div>
                    <div class="form-group">
                        <button type="submit" id="newGanga" class="btn btn-default btn-dark text-white mt-3">Guardar</button>
                        <button type="reset" class="btn btn-danger text-white mt-3">Reset</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
