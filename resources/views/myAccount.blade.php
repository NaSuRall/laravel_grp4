@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection
@section('content')

    @include('elements.nav')
    <h1>Bonjour : {{ auth()->user()->name }} </h1>
    @csrf
    <form action="{{ route('send.email') }}" method="GET">
        <button type="submit">Envoyer un E-mail</button>
    </form>






@endsection
