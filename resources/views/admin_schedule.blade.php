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




    <div class="plaging">

        <div class="titre">
            <h1>Voici votre planing :</h1>
        </div>


        <div class="plan">
            <table>
                <thead>
                <tr>
                    <th>Jour</th>
                    <th>Heure de début</th>
                    <th>Heure de fin</th>
                    <th>Nb Crénaux</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $daysOfWeek = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];
                @endphp

                @foreach($daysOfWeek as $key => $day)
                    @php
                    $entry = $plan->where('day_of_week', $key)->first();
                    @endphp
                    <tr>
                        <td>{{ $day }}</td>
                        <td>{{ $entry ? $entry->start_time : '—' }}</td>
                        <td>{{ $entry ? $entry->end_time : '—' }}</td>
                        <td> — </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
