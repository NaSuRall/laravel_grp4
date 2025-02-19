<div class="nav">
    <div class="title">
        <h1>NomDuSite</h1>
    </div>
    <div class="linka">
        <a href="{{ url('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">Accueil</a>
        <a href="{{ url('rendezvous') }}" class="{{ Request::is('rendezvous') ? 'active' : '' }}">Rendez-vous</a>
        <a href="{{ url('mes-rendezvous') }}" class="{{ Request::is('mes-rendezvous') ? 'active' : '' }}">Mes Rendez-vous</a>
        <a href="{{ route('myAcount') }}" class="{{ Route::currentRouteName() === 'myAcount' ? 'active' : '' }}">
            {{ auth()->user()->name }}
        </a>
    </div>
</div>
