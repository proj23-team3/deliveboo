<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deliveroo - Consegna a domicilio</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
        integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Adobe Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/ije6ase.css">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div class="container-fluid bg-primary">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/logo_white.png') }}" alt="" height="34">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown btn btn-light btn-sm">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Collabora con noi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Ristoranti</a>
                                    <a class="dropdown-item" href="#">Lavora con noi</a>
                                    <a class="dropdown-item" href="#">Deliveroo per le Aziende</a>
                                </div>
                            </li>
                            <li class="nav-item btn btn-light btn-sm mx-1">
                                <a class="nav-link" href="#">0,00 € <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item btn btn-light btn-sm">
                                <a class="nav-link" href="#">Menu</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div>
            @yield('content')
        </div>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3 text-white" style="background-color: #2E3333;">
                © 2021 Copyright:
                <a class="text-white" href="#">Classe #23 Team 3</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>

</html>
