<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{url('/')}}">WeFashion</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav list-inline">
            @if(Auth::check())
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{route('product.index')}}">Dashboard</a>
            </li> 
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{route('categorie.index')}}">Catégories</a>
            </li>
            @else 
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{url('/sale')}}">Soldes</a>
            </li>
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{url('/women')}}">Femme</a>
            </li>
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{url('/men')}}">Homme</a>
            </li>
            <li class="nav-item list-inline-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>   
            @endif
        </ul>
    </div>
</nav>