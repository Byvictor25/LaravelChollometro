@extends('layouts/chollometro')
@section('titulo', 'Detalle Chollo')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">{{ $ganga->title }}</h5>
            <div class="row">
                <img src="{{ $ganga->image }}" class="card-text text-center col-lg-3 col-4" width="50px">
                <div class="card-text text-center col-lg-6 col-6">
                    <p>{{ $ganga->description }}</p>
                    <p class="display-6">{{ $ganga->price }} €</p>
                    <a href="{{$ganga->url}}" class="btn btn-outline-warning" role="button">Ir al  chollo <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg></a>
                </div>
            </div>
            <p class="card-text">

            </p>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::id() == $ganga->user_id)
                    <div class="row align-items-center">
                        <div class="col-lg-6 float-right">
                            <form action="{{ route('ganga.destroy', $ganga->id )}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" id="newprod-submit" class="btn btn-danger text-black">Eliminar</button>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <a href="/editarPost/{{$ganga->id}}" class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
