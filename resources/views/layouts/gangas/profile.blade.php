@extends('layouts/chollometro')
@section('titulo', 'Pagina principal')
@section('contenido')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="ms-2 me-auto text-center display-4">
            <h1>Listado de Chollos de {{ $user->name }}</h1>
        </div>
        <ul class="list-group list-group-numbered">
            @foreach($gangasUser as $ganga)
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
    </div>
@endsection
