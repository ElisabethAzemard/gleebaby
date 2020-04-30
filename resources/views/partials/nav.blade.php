<nav class="navbar navbar-light flex-column flex-row align-items-start">
    @isset($url)
    <a class="navbar-brand" href="{{ url("/$url") }}">
        <img src="{{ asset('img/logo-gleebaby.png') }}" alt="logo gleebaby" class="img-fluid">
    </a>
    @else
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo-gleebaby.png') }}" alt="logo gleebaby" class="img-fluid">
    </a>
    @endisset
    <ul class="navbar-nav mr-auto flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sponsors.index') }}">Sponsors</a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::guard("$url")->user()->first_name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
