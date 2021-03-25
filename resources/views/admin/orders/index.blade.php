@extends('layouts.admin')

@section('content')
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="customer_name">Cliente</th>
                    <th class="customer_telephone">Telefono</th>
                    <th class="customer_address">Indirizzo</th>
                    <th class="customer_email">Email</th>
                    <th class="delivery_date">Data Consegna</th>
                    <th class="delivery_time">Ora Consegna</th>
                    <th class="amount">Totale</th>
                    <th class="stats">Statistiche</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td class="id">{{ $order->id  }}</td>
                    <td class="customer_name">{{ $order->customer_name  }}</td>
                    <td class="customer_telephone">{{ $order->customer_telephone  }}</td>
                    <td class="customer_address">{{ $order->customer_address  }}</td>
                    <td class="customer_email">{{ $order->customer_email  }}</td>
                    <td class="delivery_date">{{ $order->delivery_date  }}</td>
                    <td class="delivery_time">{{ $order->delivery_time  }}</td>
                    <td class="amount">{{ $order->amount  }} €</td>
                    <td class="stats">
                        <a href="{{ route('admin.orders.show', ['order' => $order->id]) }}">
                            <button class="view_btn">Mostra</button>
                        </a>
                    </td>
                </tr>     
                @endforeach 
            </tbody>
        </table>
           
    </div>

    


@endsection
