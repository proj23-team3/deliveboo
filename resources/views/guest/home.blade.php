@extends('layouts.guest')
@section('content')
    <header>
        <div class="jumbotron bg-secondary overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column justify-content-around">
                        <h1 class="purple font-weight-bold mb-5">I piatti che ami, a domicilio.</h1>
                        <!-- Carousel -->
                        <div id="carousel1_indicator" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel1_indicator" data-slide-to="1"></li>
                                <li data-target="#carousel1_indicator" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="{{ asset('img/promo_masterchef.jpg') }}"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="{{ asset('img/promo_averna.jpg') }}"
                                        alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="{{ asset('img/promo_cameo.jpg') }}"
                                        alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- /Carousel -->
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-around">
                        <img class="rider img-fluid mt-4" src="{{ asset('img/campaign.5a.svg') }}" alt="">
                        <div class="hashtag">
                            <h3 class="text-center p-3 font-weight-bolder rounded">#aCasaTuaConDeliveboo</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="ordernow p-5">
            <div class="container">
                <h2 class="font-weight-bolder text-center">Ordina subito!</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow my-4 p-5">
                            <img class="card-img img-fluid" src="{{ asset('img/Chose.gif') }}" alt="Card image"
                                height="200">
                            <h4 class="card-text text-center font-weight-bolder">
                                Scegli i tuoi piatti dal nostro menù
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow my-4 p-5">
                            <img class="card-img img-fluid" src="{{ asset('img/Restaurant.gif') }}" alt="Card image"
                                height="200">
                            <h4 class="card-text text-center font-weight-bolder">
                                Ordina dal tuo ristorante preferito
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow my-4 p-5">
                            <img class="card-img img-fluid" src="{{ asset('img/Delivery.gif') }}" alt="Card image"
                                height="200">
                            <h4 class="card-text text-center font-weight-bolder">
                                I tuoi piatti arriveranno al volo!
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="favourite bg_rose p-5">
            <div class="container">
                <h2 class="font-weight-bolder">La selezione di Deliveboo</h2>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-4">
                            <a class="p-1" href="{{ route('categories.show', ['category' => $category->id]) }}">
                                <div class="card card_container">
                                    <img class="img-fluid card-img" src="{{ asset($category->cat_img) }}"
                                        alt="{{ $category->name }}">
                                    <div class="card-img-overlay d-flex">
                                        <div class="my-auto mx-auto text-center category-name shadowed">
                                            <h2 class="card-title font-weight-bolder text-white ">
                                                {{ $category->name }}
                                            </h2>
                                        </div>
                                        <div class="my-auto mx-auto text-center category-description shadowed">
                                            <h4 class="card-title font-weight-bolder text-white">
                                                {{ $category->description }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
