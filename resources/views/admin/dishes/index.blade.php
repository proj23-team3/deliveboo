@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.dishes.create') }}" class="btn btn-outline-info my-4">Aggiungi un nuovo piatto</a>
    <div class="row">
        @foreach ($dishes as $dish)
        <div class="col-md-3 pr-4">
            <div class="card">
                <img class="card-img-top"
                    src="{{ str_contains($dish->dish_image, 'dishes') ? asset('storage/' . $dish->dish_image) : asset('img/default_dish.svg') }}"
                    width="250" alt="Immagine piatto">
                <div class="card-body">
                    <h5 class="card-title text-uppercase"><strong>{{ $dish->dish_name }}</strong></h5>
                    <div class="mb-4">
                        <small>Ingredienti:</small>
                        <p class="card-text">{{ $dish->dish_ingredients }}</p>
                    </div>
                    <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-info">Modifica il
                        piatto</a>
                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#delete-{{$dish->id}}">
                        Elimina questo piatto
                    </button>
    
                    <!-- Modal -->
                    <div class="modal fade" id="delete-{{$dish->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <p>Vuoi cancellare : {{$dish->dish_name}}</p>
                                </div>
                                <div class="modal-footer">       
                                    <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mt-1">Elimina questo piatto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
    

@endsection


