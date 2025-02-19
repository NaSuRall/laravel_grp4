@extends('layouts.app')

@section('custom_css')
    <!-- Your custom CSS files -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection

@section('content')
    @include('elements.nav')
    <h1>Bonjour : {{ auth()->user()->name }}</h1>

    <div class="form-group">
        <label for="datepicker">Select a Date</label>
        <input type="text" id="datepicker" name="date" class="form-control" placeholder="Select a date">
    </div>
@endsection

@section('js')
@endsection
