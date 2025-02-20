@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <script src="{{ asset('js/slot.js') }}"></script>
@endsection

@section('content')
    @include('elements.nav')
        <div class="row">
            <div class="column left">

                <div class="tt">
                    <h1 class="azerty">Bonjour {{ auth()->user()->name }} ! Comment allez-vous ?</h1>
                </div>
                <div class="text">
                        <p>
                        Bienvenue sur notre site dédié à votre bien-être et à votre santé.
                        Que vous soyez en quête de rééducation, de soulagement des douleurs
                        musculaires ou d’amélioration de votre mobilité, nous sommes là
                        pour vous accompagner avec expertise et bienveillance. <br><br>
                        </p>

                        <p>
                            Grâce à des techniques adaptées et un suivi personnalisé,
                            nous mettons tout en œuvre pour optimiser votre récupération.
                            Nous vous accueillons dans un cadre apaisant, propice
                            à votre remise en forme et à votre confort.
                            Chaque patient est unique, c'est pourquoi nous proposons
                            des soins individualisés pour répondre à vos besoins spécifiques. <br> <br>
                        </p>

                        <p>
                            Prenez rendez-vous dès aujourd’hui et offrez à votre corps
                            les soins qu’il mérite ! Nous restons à votre écoute
                            pour vous guider vers une meilleure qualité de vie.
                            Votre bien-être est notre priorité.
                        </p>
                </div>
            </div>

            <div class="column right">
                <img src="{{asset('img/MedecinImg.svg')}}" alt="">
            </div>
        </div>



        <div class="row">
            <div class="column left MedecinG">
                <img src="{{asset('img/PP.svg')}}" alt="">
            </div>
            <div class="column right MedecinD">
                <h2>Medecin</h2>
                <p>
                    Nos kinésithérapeutes sont sélectionnés selon des critères exigeants,<br>
                    garantissant un haut niveau de compétence et d’expertise.<br>
                    Tous diplômés d’écoles reconnues, ils bénéficient également<br>
                    de formations continues pour rester à la pointe des avancées<br>
                    en matière de rééducation et de soins musculaires.<br>
                    Leur approche repose sur une écoute attentive, une évaluation<br>
                    approfondie et des protocoles de soins adaptés à chaque patient.<br><br>
                    En choisissant notre cabinet, vous faites confiance à une équipe<br>
                    passionnée, dédiée à votre bien-être et soucieuse d’apporter<br>
                    des résultats concrets et durables.<br>
                </p>
                <button type="submit">Consulter</button>
            </div>
        </div>

    <div class="plaging">
        <div class="titre">
            <h1>Créneaux disponibles</h1>
        </div>

        <div class="plan">
            <table>
                <thead>
                <tr>
                    <th>Jour</th>
                    <th>Créneaux disponibles</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $daysOfWeek = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];
                    $globalIndex = 0;
                @endphp

                @foreach($daysOfWeek as $key => $day)
                    @php
                        $entry = $plan->where('day_of_week', $key)->last();
                        $slots = $entry ? $entry->getTimeSlots() : [];
                    @endphp
                    <tr>
                        <td>{{ $day }}</td>
                        <td>
                            @if (!empty($slots))
                                <ul>
                                    @foreach ($slots as $slot)
                                        <li id="{{ $globalIndex }}">{{ $slot }}</li>
                                        @php
                                            $globalIndex++;
                                        @endphp
                                    @endforeach
                                </ul>
                            @else

                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
        <script>

            document.addEventListener('DOMContentLoaded', function() {

                const listItems = document.querySelectorAll('li[id]');

                listItems.forEach(item => {
                    item.addEventListener('click', function() {
                        const itemId = this.id;
                        window.location.href = `/rendezvous`;
                    });
                });
            });
        </script>

    @if(session('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                toast: true
            });
        </script>
    @endif
@endsection
