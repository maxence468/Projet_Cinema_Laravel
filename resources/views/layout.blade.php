<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page d'accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('build/assets/app-tn0RQdqM.css') }}">
    <script type="module" src="{{ asset('build/assets/app-WG8WQjlL.js') }}" defer></script></head>

<body>
{{ $slot ?? '' }}

@livewireScripts
<header>
    <nav>
        <div class="nav-wrapper">
            <div class="logo-wrapper">
                <img src="{{ asset('images/logo_CineForAll.png') }}" alt="Logo CinéForAll" width="116" height="105">
            </div>
            <div class="nav-links">
                <a href="{{ url('/') }}" class="nav-text">Accueil</a>
                <a href="{{ url('/rechercheFilm') }}" class="nav-text">Recherche film</a>
                <a href="{{ url('/rechercheActeur') }}" class="nav-text">Recherche acteur</a>
                <a href="{{ url('/rechercheGenre') }}" class="nav-text">Recherche genre</a>
                <a href="{{ url('/progSemaineCinema') }}" class="nav-text">Programme de la semaine</a>
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ url('/gestionFilm') }}" class="nav-text">Gestion catalogue</a>
                    @else
                        <a href="{{ url('/mesReservations') }}" class="nav-text">Réservation</a>
                    @endif
                    <a href="{{ url('/parametreUtilisateur/'. Auth::id() .'/edit') }}" class="nav-text">Paramètres</a>
                @endauth
            </div>

            <div class="nav-buttons">
                @auth
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <input type="submit" value="Déconnexion" class="btn-nav deco">
                    </form>
                @else
                    <a href="{{ url('/inscription') }}" class="btn-nav inscription"><span>Inscription</span></a>
                    <a href="{{ url('/connexion') }}" class="btn-nav connexion"><span>Connexion</span></a>
                @endauth
            </div>

            <button class="hamburger">&#9776;</button> <!-- for mobile toggle -->
            <nav class="hamburgerMenu">
                <ul class="menu-content">
                    <li><a href="{{ url('/') }}" class="nav-text">Accueil</a></li>
                    <li><a href="{{ url('/rechercheFilm') }}" class="nav-text">Recherche film</a></li>
                    <li><a href="{{ url('/rechercheActeur') }}" class="nav-text">Recherche acteur</a></li>
                    <li><a href="{{ url('/rechercheGenre') }}" class="nav-text">Recherche genre</a></li>
                    <li><a href="{{ url('/progSemaineCinema') }}" class="nav-text">Programme de la semaine</a></li>

                    @auth
                        @if(Auth::user()->isAdmin())
                            <li><a href="{{ url('/gestionFilm') }}" class="nav-text">Gestion catalogue</a></li>
                        @else
                            <li><a href="{{ url('/mesReservations') }}" class="nav-text">Réservation</a></li>
                        @endif
                        <a href="{{ url('/parametreUtilisateur/'. Auth::id() .'/edit') }}" class="nav-text">Paramètres</a>
                    @endauth

                    @auth
                        <form method="POST" action="{{ url('/logout') }}">
                            @csrf
                            <li>
                                <input type="submit" class="btn-nav" value="Déconnexion">
                            </li>
                        </form>
                    @else
                        <li><a href="{{ url('/inscription') }}" class="btn-nav"><span>Inscription</span></a></li>
                        <li><a href="{{ url('/connexion') }}" class="btn-nav"><span>Connexion</span></a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </nav>
</header>



<section>
    @yield('main')
</section>


<footer class="site-footer" style="margin-top: 70px">
    <div class="footer-inner d-flex justify-content-between align-items-center">
        <div class="footer-text">
            <p>
                Copyright DevOreo :
                Barthelemy Maxence, Gamet Dylan, Hassani Ayad-Youssouf
            </p>
        </div>
        <img src="{{asset("images/devOreo.png")}}" id="logoDevOreo" alt="DevOreo Logo">
    </div>
</footer>
<script>
    window.APP_URL = "{{ rtrim(config('app.url'), '/') }}";
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

