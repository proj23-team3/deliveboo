<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deliveboo - Consegna a domicilio</title>
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
        <div class="wrapper d-flex flex-column justify-content-between min-vh-100">
            <div class="container-fluid bg-primary">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('img/logo_white.png') }}" alt="" height="45">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar_nav">
                                <li class="nav-item dropdown btn btn-light btn-sm">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Collabora con noi
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="admin">Ristoranti</a>
                                        <a class="dropdown-item" href="#">Lavora con noi</a>
                                        <a class="dropdown-item" href="#">Deliveboo per le Aziende</a>
                                    </div>
                                </li>
                                <li class="nav-item btn btn-light btn-sm mx-1">
                                    <a class="nav-link cart_button" id="cart_btn" href="#"><i
                                            class="fas fa-shopping-cart "></i><span class="cart_badge">2</span><span
                                            class="sr-only">(current)</span></a>
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
            <footer class="text-lg-start mt-auto" style="background-color: #2E3333;">
                <div class="container py-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card-text"
                                style="background : hsla(0,0%,100%,.1); height: 100%; border-radius: 3px;">
                                <ul class="text-white card-body list-unstyled block p-4">
                                    <li>
                                        <h5>Scopri Deliveboo</h5>
                                    </li>
                                    <li><a class="text-white" href="#">Investitori</a></li>
                                    <li><a class="text-white" href="#">Chi siamo</a></li>
                                    <li><a class="text-white" href="#">Pressroom</a></li>
                                    <li><a class="text-white" href="#">Il nostro blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-text"
                                style="background : hsla(0,0%,100%,.1); height: 100%; border-radius: 3px;">
                                <ul class="text-white card-body list-unstyled block p-4">
                                    <li>
                                        <h5>Note legali</h5>
                                    </li>
                                    <li><a class="text-white" href="#">Termini e Condizioni</a></li>
                                    <li><a class="text-white" href="#">Informativa sulla privacy</a></li>
                                    <li><a class="text-white" href="#">Cookies</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-text"
                                style="background : hsla(0,0%,100%,.1); height: 100%; border-radius: 3px;">
                                <ul class="text-white card-body list-unstyled block p-4">
                                    <li>
                                        <h5>Aiuto</h5>
                                    </li>
                                    <li><a class="text-white" href="#">Contatti</a></li>
                                    <li><a class="text-white" href="#">FAQ</a></li>
                                    <li><a class="text-white" href="#">Tipi di cucina</a></li>
                                    <li><a class="text-white" href="#">Mappa del sito</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-text"
                                style="background : hsla(0,0%,100%,.1); height: 100%; border-radius: 3px;">
                                <ul class="text-white card-body list-unstyled block p-4">
                                    <li>
                                        <h5>Porta Deliveboo con te</h5>
                                    </li>
                                    <li><a href="#">
                                            <img class="appstore" src="{{ asset('img/App_Store_Badge.svg') }}" alt="">
                                        </a></li>
                                    <li><a href="#">
                                            <img class="appstore" src="{{ asset('img/Google_Play_Store_badge.svg') }}"
                                                alt="">
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <a href="#" class="facebook"><i class="fab fa-facebook mr-2"></i></a>
                            <a href="#" class="twitter"><i class="fab fa-twitter mr-2"></i></a>
                            <a href="#" class="instagram"><i class="fab fa-instagram mr-2"></i></a>
                        </div>
                        <!-- Copyright -->
                        <div class="col-md-6 text-right p-3 text-white">
                            &copy; 2021 Copyright:
                            <a class="text-white" href="#">Team 3 Classe #23</a>
                        </div>
                        <!-- Copyright -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
