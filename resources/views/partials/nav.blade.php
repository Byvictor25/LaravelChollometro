<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="ml-2 lg-1">
    </div>
    <a href="/ganga"><img class="ml-2" src="https://www.chollometro.com/assets/images/schema.org/organisation/chollometro.png" width="150px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route("ganga.index") }}">Pagina de Inici</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("ganga.create") }}">Añadir Chollo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/gangasDestacadas">Chollos Destacades</a>
            </li>
        </ul>
        <div class="ms-auto nav-item dropdown text-white me-5">
            @if(Auth::user() && Auth::user()->name)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profile">Profile</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            @else
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Invitado
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('register')}}">Register</a>
                    <a class="dropdown-item" href="{{route('login')}}">Login</a>
                </div>
            @endif
        </div>
    </div>
    </div>
</nav>
