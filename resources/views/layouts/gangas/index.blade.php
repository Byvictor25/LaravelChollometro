@extends('layouts/chollometro')
@section('titulo', 'Pagina principal')
@section('contenido')
    <div class="ms-2 me-auto text-center display-4">
        <h1>Listado de Chollos</h1>
    </div>
    <ul class="list-group list-group-numbered">
        @foreach($gangas as $ganga)
            <li class="d-flex justify-content-center align-items-center">
                <div class="m-1">
                    <img src="{{ $ganga->image }}" width="200px">
                </div>
                <div class="card" style="width: 100rem">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ganga->title }}</h5>
                        <p class="card-text">{{ $ganga->description }}</p>
                        <p class="card-text">{{ $ganga->price }} €</p>
                        <div class="row">
                            <a href="{{ route('ganga.show', $ganga->id) }}" class="btn btn-primary col-lg-2">Detalle</a>
                            <p class="col-lg-2 m-2 text-center">{{ $ganga->likes }}</p>
                            <button class="btn btn-success col-lg-2 ml-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg></button>
                            <p class="col-lg-2 m-2 text-center">{{ $ganga->dislikes }}</p>
                            <button class="btn btn-danger col-lg-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">
                                    <path d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
    @endforeach
    </ul>
    <di>
        {{$gangas->links("pagination::bootstrap-5")}}
    </di>
@endsection
