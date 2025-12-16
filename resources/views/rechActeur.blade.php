<?php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page d'accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>
<body>
<header>
    <nav>
        <div class="nav-wrapper">

            <div class="logo-wrapper">
                <img src="images/logo_CineForAll.png" alt="Logo CinéForAll">
            </div>
            <a href="/" class="nav-text accueil">Accueil</a>
            <a href="/recherche_film" class="nav-text film">Recherche film</a>
            <a href="rechActeur.php" class="nav-text acteur">Recherche acteur</a>
            <a href="rechGenre.php" class="nav-text genre">Recherche genre</a>
            <a href="progSemaine.php" class="nav-text programme">Programme de la semaine</a>
            <a href="" class="btn-nav inscription">
                <span>Inscription</span>
            </a>
            <div class="connexion-wrapper">
                <a href="" class="btn-nav connexion">
                    <span>Connexion</span>
                </a>
            </div>
        </div>
    </nav>
</header>

<main class="mainRechFilm">
    <form method="GET" action="{{ route('rechercheActeur') }}">
        <div class="d-flex justify-content-center">
            <input class="inputRechFilm" type="text" name="searchActeur" placeholder="Rechercher un acteur" value="{{ $search ?? '' }}">
            <input type="submit" hidden/>
        </div>
    </form>
    <br>
    <div class="toHide">

            @foreach($personnes as $p)
            <h2>Résultat pour l'acteur : {{$p->nomPers}}</h2>
            <div class="row">
                <div class="col">
                    <img src="{{asset($p->photoPers)}}" alt="{{$p->photoPers}}" width="412" height="626">
                </div>
                <div class="col" style="margin-right: 360px">
                    <p>{{$p->nomPers}}</p>
                    <p>{{$p->prePers}}</p>
                    <p>{{$p->dateNaissPers}}</p>
                    <p>{{$p->lieuNaissPers}}</p>
                    <p>{{$p->biblio}}</p>
                </div>
                @endforeach
                @foreach($p->films as $f)
                @endforeach
        </div>
    </div>
</main>

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
