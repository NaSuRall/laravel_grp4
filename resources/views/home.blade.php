@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection

@section('content')
    @include('elements.nav')

        <div class="row">
            <div class="column left">
                <h1>Bonjour {{ auth()->user()->name }} ! Comment allez-vous ?</h1>
                <div class="text">
                    <p>
                        Bienvenue sur notre site dédié à votre bien-être et à votre santé.</br>
                        Que vous soyez en quête de rééducation, de soulagement des douleurs</br>
                        musculaires ou d’amélioration de votre mobilité, nous sommes là </br>
                        pour vous accompagner avec expertise et bienveillance.</br></br>
                        Grâce à des techniques adaptées et un suivi personnalisé,</br>
                        nous mettons tout en œuvre pour optimiser votre récupération.</br>
                        Nous vous accueillons dans un cadre apaisant, propice</br>
                        à votre remise en forme et à votre confort.</br>
                        Chaque patient est unique, c'est pourquoi nous proposons</br>
                        des soins individualisés pour répondre à vos besoins spécifiques.</br></br>
                        Prenez rendez-vous dès aujourd’hui et offrez à votre corps</br>
                        les soins qu’il mérite ! Nous restons à votre écoute</br>
                        pour vous guider vers une meilleure qualité de vie.</br>
                        Votre bien-être est notre priorité.</br>
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
                    Nos kinésithérapeutes sont sélectionnés selon des critères exigeants,</br>
                    garantissant un haut niveau de compétence et d’expertise.</br>
                    Tous diplômés d’écoles reconnues, ils bénéficient également</br>
                    de formations continues pour rester à la pointe des avancées</br>
                    en matière de rééducation et de soins musculaires.</br>
                    Leur approche repose sur une écoute attentive, une évaluation</br>
                    approfondie et des protocoles de soins adaptés à chaque patient.</br></br>
                    En choisissant notre cabinet, vous faites confiance à une équipe</br>
                    passionnée, dédiée à votre bien-être et soucieuse d’apporter</br>
                    des résultats concrets et durables.</br>
                </p>
                <button type="submit">Consulter</button>
            </div>
        </div>

        <div class="centre">
            <div class="contact">
                <div>
                    <form class="contact-form">
                        <h3>Contactez-nous</h3>
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Message :</label>
                        <textarea id="message" name="message" rows="4" cols="55" required></textarea>

                        <button type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>




@endsection
