@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_schedule.css') }}">
@endsection

@section('content')
    @include('elements.nav')


    <div class="formulaire">
        <form action="{{ route('send_form_admin') }}" method="post">
            @csrf
            <label for="day_of_week">Jour de la semaine :</label>
            <select id="day_of_week" name="day_of_week" required>
                <option value="Monday">Lundi</option>
                <option value="Tuesday">Mardi</option>
                <option value="Wednesday">Mercredi</option>
                <option value="Thursday">Jeudi</option>
                <option value="Friday">Vendredi</option>
                <option value="Saturday">Samedi</option>
                <option value="Sunday">Dimanche</option>
            </select>

            <label for="start_time">Heure de début :</label>
            <input type="time" id="start_time" name="start_time" required>

            <label for="end_time">Heure de fin :</label>
            <input type="time" id="end_time" name="end_time" required>

            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="btn">
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>

@endsection
