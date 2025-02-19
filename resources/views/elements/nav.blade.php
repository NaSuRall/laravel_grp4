

    <div class="nav">
        <div class="title">
            <h1>NomDuSite</h1>
        </div>
        <div class="linka">
                <a href="{{ url('home')  }}">Accueil</a>
                <a href=""><span>Rendez-vous</span></a>
                <a href="">Mes Rendez-vous</a>
                <a href="{{ route('myAcount') }}">{{ auth()->user()->name}}</a>
        </div>
    </div>

