@extends('layouts.guest')
@section('content')
<header>
    <div class="jumbotron bg-secondary overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="purple font-weight-bold">I piatti che ami, a domicilio.</h1>
                </div>
                <div class="col-md-6">
                    <img class="rider img-responsive" src="{{ asset('img/campaign.5a.svg') }}" alt="">
                    <div class="hashtag">
                        <h3 class="text-center p-3 font-weight-bolder">#aCasaTuaConDeliveboo</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <section class="selection">
        <div class="container">
            <h2 class="font-weight-bolder">La selezione di Deliveboo</h2>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-3">
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}">
                        <div class="card my-2">
                            <img class="card-img img-responsive" src="{{ asset($category->cat_img) }}" alt="Card image" height="200">
                            <div class="card-img-overlay d-flex justify-content-center align-items-center">
                                <h2 class="card-text text-center text-white font-weight-bolder">
                                    {{ $category->name }}
                                </h2>
                            </div>
                            <p class="card-text">
                                {{ $category->description }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection