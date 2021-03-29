@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center font-weight-bolder pt-3">Ordini effettuati</h1>
        <div class="row mb-4">
            <div class="col-md-6">
                <img class="d-block img-fluid mb-4" src="{{ asset('img/orders.png') }}">
                <a class="btn btn-primary mb-4 display_in" href="{{ route('admin.stats')}}">Statistiche</a> 
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th class="id white bg_purple">ID</th>
                            <th class="delivery_date white bg_purple">Data Consegna</th>
                            <th class="amount white bg_purple">Totale</th>
                            <th class="stats white bg_purple">Dettagli</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="id">{{ $order->id  }}</td>
                            <td class="delivery_date">{{ $order->delivery_date  }}</td>
                            <td class="amount">{{ $order->amount  }} €</td>
                            <td class="stats">
                                <a href="{{ route('admin.orders.show', ['order' => $order->id]) }}">
                                    <button class="btn btn-primary view_btn">Mostra</button>
                                </a>
                            </td>
                        </tr>     
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
        <a class="btn btn-primary mb-4 display_out" href="{{ route('admin.stats')}}">Statistiche</a> 
    </div>

    


@endsection
