<nav class="navbar navbar-expand-lg navbar-light">
    @if(\Request::is('admin') || \Request::is('admin/*') || \Request::is('categorie/*') || \Request::is('categorie'))
    <span class="navbar-brand">WE FASHION</span>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav list-inline">
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{route('admin.index')}}">Produits</a>
            </li> 
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{route('categorie.index')}}">Catégories</a>
            </li>
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home"></i></a>
            </li>
        </ul>
    </div>
    @else
    <a class="navbar-brand" href="{{url('/')}}">WE FASHION</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav list-inline">
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{url('/sale')}}">Soldes</a>
            </li>
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{url('/women')}}">Femme</a>
            </li>
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{url('/men')}}">Homme</a>
            </li>
            @if(Auth::check())
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{route('admin.index')}}">Tableau de bord</a>
            </li>
            @else
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            @endif
        </ul>
    </div>
    @endif
</nav>