@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_appointment.css') }}">
@endsection

@section('content')
    @include('elements.nav')

    <form action="{{ route('send_form_admin') }}" method="post">
        @csrf
        <label for="date">Date :</label>
        <input type="date" id="date" name="date" required>

        <label for="hour">Heure :</label>
        <input type="text" id="hour" name="hour" required>


        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
@endsection
