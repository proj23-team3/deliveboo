@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center font-weight-bolder pt-3 pb-3">Dettagli ordini</h1>
    <div class="row mb-4">
        <div class="col-md-8">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th class="id white bg_purple">ID</th>
                        <th class="customer_name white bg_purple">Cliente</th>
                        <th class="customer_telephone white bg_purple">Telefono</th>
                        <th class="customer_address white bg_purple">Indirizzo</th>
                        <th class="customer_email white bg_purple">Email</th>
                        <th class="delivery_date white bg_purple">Data Consegna</th>
                        <th class="delivery_time white bg_purple">Ora Consegna</th>
                        <th class="amount white bg_purple">Totale</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="id">{{ $order->id  }}</td>
                        <td class="customer_name">{{ $order->customer_name  }}</td>
                        <td class="customer_telephone">{{ $order->customer_telephone  }}</td>
                        <td class="customer_address">{{ $order->customer_address  }}</td>
                        <td class="customer_email">{{ $order->customer_email  }}</td>
                        <td class="delivery_date">{{ $order->delivery_date  }}</td>
                        <td class="delivery_time">{{ $order->delivery_time  }}</td>
                        <td class="amount">{{ $order->amount  }} €</td>
                    </tr>     
                </tbody>
            </table>
            <a class="btn btn-primary mb-4 display_in" href="{{ route('admin.orders.index')}}">Torna agli ordini</a>
        </div>
        <div class="col-md-4">
                <img class="d-block img-fluid mb-4" src="{{ asset('img/details.png') }}">
        </div>
    </div>
    <a class="btn btn-primary mb-4 display_out" href="{{ route('admin.orders.index')}}">Torna agli ordini</a>
</div>
@endsection
