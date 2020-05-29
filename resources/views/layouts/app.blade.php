<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="mh-100">
        <div class="container-fluid mh-100">
            <div class="row mh-100" id="a">
                <aside class="col-12 col-md-2 p-0 bg-light shadow-right z-index-small">
                    @include('partials.nav')
                </aside>
                <main class="col-12 col-md-10 p-0 bg-white">
                    <div class="container mh-100">
                        <div class="row justify-content-center mh-100">
                            <div class="col-12 col-md-3 d-flex flex-column align-items-center justify-content-center shadow-right px-5 py-5">
                                <img src="{{asset('/img/users-avatar').'/'.$caretaker->avatar}}" alt="avatar" width="75" class="rounded-circle">
                                <h2 class="h2 text-center py-4">{{ $pageTitle ?? 'Titre' }}</h2>
                                <p class="text-center">{{ $pageDescription ?? 'Description de page.' }}</p>
                            </div>
                            <div class="col py-5">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
