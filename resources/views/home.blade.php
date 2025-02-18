@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection

@section('content')

@include('elements.nav')
    <h1>Bonjour :{{ auth()->user()->name }} </h1>

@endsection
