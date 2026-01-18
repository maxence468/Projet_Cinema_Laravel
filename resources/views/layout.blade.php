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
    @livewireStyles
</head>

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
                    <a href="/" class="nav-text">Accueil</a>
                    <a href="/rechercheFilm" class="nav-text">Recherche film</a>
                    <a href="/rechercheActeur" class="nav-text">Recherche acteur</a>
                    <a href="/rechercheGenre" class="nav-text">Recherche genre</a>
                    <a href="/progSemaineCinema" class="nav-text">Programme de la semaine</a>
                </div>

                <div class="nav-buttons">
                    <a href="" class="btn-nav inscription"><span>Inscription</span></a>
                    <a href="" class="btn-nav connexion"><span>Connexion</span></a>
                </div>

                <button class="hamburger">&#9776;</button> <!-- for mobile toggle -->
                <nav class="hamburgerMenu">
                    <ul class="menu-content">
                        <li><a href="/" class="nav-text">Accueil</a></li>
                        <li><a href="/rechercheFilm" class="nav-text">Recherche film</a></li>
                        <li><a href="/rechercheActeur" class="nav-text">Recherche acteur</a></li>
                        <li><a href="/rechercheGenre" class="nav-text">Recherche genre</a></li>
                        <li><a href="/progSemaineCinema" class="nav-text">Programme de la semaine</a></li>
                        <li><a href="" class="btn-nav inscription"><span>Inscription</span></a></li>
                        <li><a href="" class="btn-nav connexion"><span>Connexion</span></a></li>
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
            <img src="images/devOreo.png" id="logoDevOreo" alt="DevOreo Logo">
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@vite('resources/js/app.js')
