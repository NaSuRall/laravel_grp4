@extends('layouts.app')

@section('custom_css')
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin_consult_appointment.css') }}">
@endsection

@section('content')

    <div class="container_custom">

        <h111 class="center">Liste des rendez-vous</h111>

        <table class="custom_table">
            <thead class="info">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date et Heure</th>
                <th>Type de consultation</th>
                <th class="actions-column">Modifier</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rdv as $appointment)
                <tr>
                    <td><a href="{{ route('admin.showClient', $appointment->id) }}">{{ $appointment->user->name }}</a></td>
                    <td>{{ $appointment->user->first_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($appointment->hour)->format('H:i') }}</td>
                    <td>{{ $appointment->consultation_type }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.edit', $appointment->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('admin.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rendez-vous ?');" style="display: inline-block;">
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
