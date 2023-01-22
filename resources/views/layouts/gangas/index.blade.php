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
                    <img src="{{ asset("storage/img/$ganga->id-ganga-severa.jpg") }}" width="200px">
                </div>
                <div class="card" style="width: 100rem">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ganga->title }}</h5>
                        <p class="card-text">{{ $ganga->description }}</p>
                        <p class="card-text display-6">{{ $ganga->price }}€ <del style="font-size: 25px; color: red">{{ $ganga->price_sale }}€</del></p>
                        <a href="{{ route('ganga.show', $ganga->id) }}" class="btn btn-primary">Detalle</a>
                    </div>
                </div>
            </li>
    @endforeach
    </ul>
    <di>
        {{$gangas->links("pagination::bootstrap-5")}}
    </di>
@endsection
