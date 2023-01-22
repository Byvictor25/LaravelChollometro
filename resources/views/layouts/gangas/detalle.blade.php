@extends('layouts/chollometro')
@section('titulo', 'Detalle Chollo')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">{{ $ganga->title }}</h5>
            <div class="row">
                <img src="{{ asset("storage/img/$ganga->id-ganga-severa.jpg") }}" class="card-text text-center col-lg-3 col-4" width="50px">
                <div class="card-text col-lg-6 col-6 text-justify">
                    <p>{{ $ganga->description }}</p>
                    <p class="display-6 text-center">{{ $ganga->price }}€  <del style="font-size: 25px; color: red">{{ $ganga->price_sale }}€</del></p>
                    <a href="{{$ganga->url}}" class="btn btn-outline-warning text-center" role="button">Ir al  chollo <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg></a>
                </div>
            </div>
            <p class="card-text">
            <div class="row text-center">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-3">
                    <form action="{{ route('ganga.destroy', $ganga->id )}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" id="delete_ganga" class="btn btn-outline-danger">Eliminar</button>
                    </form>
                </div>
                <div class="col-lg-3">
                    <a href="{{ route('ganga.edit', $ganga->id) }}" class="btn btn-outline-primary">Editar</a>
                </div>
                <div class="col-lg-3">
                    {{$ganga->likes}}
                    <a href="/addLike/{{$ganga->id}}"><button class="btn btn-success col-lg-2 ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                        </button></a>
                    {{$ganga->dislikes}}
                    <a href="/addDislike/{{$ganga->id}}"><button class="btn btn-danger col-lg-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">
                            <path d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>
                        </svg>
                        </button></a>
                </div>
            </p>
        </div>
    </div>
@endsection
