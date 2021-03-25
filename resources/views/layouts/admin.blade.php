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

    <!-- Adobe Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/ije6ase.css">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class='bg_rose'>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo_green.png') }}" alt="" height="45">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            <nav id="navbar-admin" class="navbar navbar-light bg-transparent px-0">
                <ul class="nav">
                    <li class="nav-item">
                        {{-- questo punterà all'index --}}
                        <a class="nav-link {{ Route::is('admin.index') ? 'btn btn-primary' : 'text-muted' }}"
                            href="{{ route('admin.index') }}">Il
                            tuo ristorante</a>
                    </li>
                    <li class="nav-item">
                        {{-- questo punterà al menu con la lista piatti e bottone per aggiungere un piatto --}}
                        <a class="nav-link {{ Route::is('admin.dishes.*') ? 'btn btn-primary' : 'text-muted' }}"
                            href="{{ route('admin.dishes.index') }}">Il
                            tuo menu</a>
                    </li>
                    <li class="nav-item">
                        {{-- questo punterà al menu con la lista piatti e bottone per aggiungere un piatto --}}
                        <a class="nav-link text-muted" href="#">I tuoi ordini</a>
                    </li>
                </ul>
            </nav>
            <div>
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
