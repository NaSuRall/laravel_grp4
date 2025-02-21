

    <div class="nav">
        <div class="title">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="30" height="30">
            <h1>Docto Hrlibe</h1>
        </div>
        <div class="linka">
            <a href="{{ route('home')  }}">Accueil</a>
            <a href="{{ route('rendezvous') }}">Rendez-vous</a>
            <a href="{{ route('admin.showClient') }}"><span>Rendez-vous admin</span></a>
            <a href="{{ route('admin.schedule') }}">Creneaux Horraire</a>
            <a href="{{ route('myAcount') }}">{{ auth()->user()->name}}</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
