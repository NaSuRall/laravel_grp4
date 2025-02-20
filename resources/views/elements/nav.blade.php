

    <div class="nav">
        <div class="title">
            <h1>Docto Hrlibe</h1>
        </div>
        <div class="linka">
            <a href="{{ url('home')  }}">Accueil</a>
            <a href="{{ route('admin.showClient') }}"><span>Rendez-vous admin</span></a>
            <a href="{{ route('admin.schedule') }}">Prendre rendez-vous</a>
            <a href="{{ route('myAcount') }}">{{ auth()->user()->name}}</a>
        </div>
    </div>
