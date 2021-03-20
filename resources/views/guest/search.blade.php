@extends('layouts.guest')
@section('content')
    <search-component :choose_cat='@json($category->id)' :rests='@json($restaurants)'> />
    @endsection
