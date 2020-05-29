<nav class="navbar navbar-light flex-column">
    @isset($url)
    <a class="navbar-brand mr-0 my-5" href="{{ url("/$url") }}">
        <img src="{{ asset('img/logo-gleebaby.png') }}" alt="logo gleebaby" class="img-fluid" width="100">
    </a>
    @else
    <a class="navbar-brand mr-0 my-5" href="{{ url('/') }}">
        <img src="{{ asset('img/logo-gleebaby.png') }}" alt="logo gleebaby" class="img-fluid" width="100">
    </a>
    @endisset
    <ul class="navbar-nav mr-auto flex-column offset-1">
        @isset($caretaker)
        <li class="nav-item">
            <a class="nav-link" href="{{ url("/caretakers/$caretaker->id ?? ''") }}">Profil</a>
        </li>
        @endisset
        <li class="nav-item">
            <a class="nav-link" href="{{ url("/chat") }}">Chat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url("/caretaker/my-practitioners") }}">Praticiens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url("/caretaker/calendar") }}">Agenda</a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @isset($url)
                    @auth('caretaker')
                        {{ Auth::guard('caretaker')->user()->first_name }} <span class="caret"></span>
                    @endauth
                @endisset
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Déconnexion') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
