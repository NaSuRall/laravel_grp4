@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection
@section('content')

    @include('elements.nav')
    <div class="centre">
        <div class="contact">
            <div>
                <form class="contact-form">
                    <h3>Contactez-nous</h3>
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Objet :</label>
                    <input type="text" id="objet" name="objet" required>

                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="4" cols="55" required></textarea>

                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>






@endsection
