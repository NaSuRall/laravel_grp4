@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection

@section('content')
    @include('elements.nav')
    <h1>Bonjour : {{ auth()->user()->name }}</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Prendre un rendez-vous</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.appointment') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="appointment_date" class="form-label">Choisissez une date:</label>
                                <input type="date" id="appointment_date" name="appointment_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="appointment_hour" class="form-label">Choisissez une heure:</label>
                                <select id="appointment_hour" name="appointment_hour" class="form-select" required>
                                    <option value="">Sélectionnez une heure</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="consultation_type" class="form-label">Type de consultation:</label>
                                <select name="consultation_type" id="consultation_type" class="form-select" required>
                                    <option value="">Sélectionnez le type</option>
                                    <option value="standard">Consultation standard</option>
                                    <option value="urgent">Consultation urgente</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Décrivez brièvement la raison de votre rendez-vous"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Confirmer le rendez-vous</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.schedules = @json($schedules);
        window.appointments = @json($appointments);
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
