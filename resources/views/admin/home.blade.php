@extends('layouts.admin')

@section('content')

    <div class="p-3 border rounded"
        style="height:300px; background-image:url({{ str_contains($user->cover, 'cover') ? asset('storage/' . $user->cover) : asset('img/default_restaurant.svg') }}); background-size: cover">
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $user->address }}</h6>
            <p class="card-text mb-0">Costi di consegna: {{ $user->shipping_costs }} €</p>
            <p class="card-text">Partita IVA: {{ $user->vat_number }}</p>
            {{-- <a href="#" class="card-link">Modifica l'immagine del tuo ristorante</a> --}}
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Modifica l'immagine del tuo ristorante
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inserisci una nuova immagine per il tuo
                                ristorante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="file" name="cover" id="cover" class="form-control-file mb-4">
                                <button type="submit" class="btn btn-primary">Salva le modifiche</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
