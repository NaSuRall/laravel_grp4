@extends('layouts.app')

@section('custom_css')
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin_consult_appointment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection

@section('content')
    @include ('elements.nav')
    <div class="container_custom">


        <div class="con">
            <div class="reg">
                <h3 class="center">Liste des rendez-vous</h3>
                <table class="custom_table">
                    <thead class="info">
                    <tr>
                        <th>user id</th>
                        <th>Jour</th>
                        <th>Heure</th>
                        <th>Description</th>
                        <th class="actions-column">Modifier</th>
                    </tr>
                    </thead>
                    <tbody>
                    <thead class="info">

                    @foreach($rdv as $rdvs)
                        <tr>
                            <td>{{ $rdvs->user_id }}</td>
                            <td>{{ $rdvs->date }}</td>
                            <td>{{ $rdvs->hour }}</td>
                            <td>{{ $rdvs->description }}</td>
                            <td class="actions">
                                <a href="{{ route('appointment.edit', auth()->user()->id) }}"
                                   class="btn btn-warning">Modifier</a>
                                <form action="{{ route('appointment.destroy', auth()->user()->id) }}"
                                      method="POST" onsubmit="return confirm('Voulez-vous vraiment ' +
                                       'supprimer ce rendez-vous ?');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                    </tbody>
                </table>
            </div>

        </div>


    </div>

@endsection
