@extends('layouts.app')

@section('custom_css')
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin_consult_appointment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection

@section('content')

        @include('elements.nav')

    <div class="container_custom">

        <h1 class="center">Liste des rendez-vous</h1>

        <table class="custom_table">
            <thead class="info">
            <tr>
                <th>Jour</th>
                <th>Heure debut</th>
                <th>Heure Fin</th>
                <th>Crenaux horraire</th>
                <th class="actions-column">Modifier</th>
            </tr>
            </thead>
            <tbody>
            @php
                $daysOfWeek = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];
            @endphp

            @foreach($daysOfWeek as $key => $day)
                @php
                    $entry = $plan->where('day_of_week', $key)->last();
                     $slots = $entry ? $entry->getTimeSlots() : [];
                @endphp
                <tr>
                    <td>{{ $day }}</td>
                    <td>{{ $entry ? $entry->start_time : '—' }}</td>
                    <td>{{ $entry ? $entry->end_time : '—' }}</td>
                    <td>
                        @if (!empty($slots))
                            <ul>
                                @foreach ($slots as $slot)
                                    <p>{{ $slot }}</p>
                                @endforeach
                            </ul>
                        @else
                            —
                        @endif
                    </td>
                    <td class="actions">
                        <a href="{{ route('appointment.edit', auth()->user()->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('appointment.destroy', auth()->user()->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rendez-vous ?');" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach




            </tbody>
        </table>

    </div>

@endsection
