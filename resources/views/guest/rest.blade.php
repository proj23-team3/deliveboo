@extends('layouts.guest')

@section('content')
<div class="mt-5 mb-5">
    <rest :rest='@json($ristorante)' route="{{ route('checkout') }}" />
</div>
@endsection