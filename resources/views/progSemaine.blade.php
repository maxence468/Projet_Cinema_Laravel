<?php
use Illuminate\Support\Carbon;

?>
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
            <a href="rechFilm" class="nav-text film">Recherche film</a>
            <a href="rechActeur" class="nav-text acteur">Recherche acteur</a>
            <a href="rechGenre" class="nav-text genre">Recherche genre</a>
            <a href="progSemaine" class="nav-text programme">Programme de la semaine</a>
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
    {{--Selection d'un cinema dans une liste deroulante--}}
    <form method="GET" action="{{ route('progSemaineCinema') }}">
        <select name="cinema">
            <option value="">-- Choisir un cinema --</option>
            @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->idCinema }}"
                    {{ request('cinema') == $cinema->idCinema ? 'selected' : '' }}>
                    {{ $cinema->nomCinema }}
                </option>
            @endforeach
        </select>
        <button type="submit">Rechercher</button>
    </form>

    <br>
    @if($cinemaChoisi->isNotEmpty())
        <h2>Résultat pour le cinéma : {{$cinemaChoisi[0]->nomCinema}}</h2>
        {{--Quand un cinema est choisi--}}
        <div class="col d-flex justify-content-around" style="margin-top: 60px">

            {{--    on affiche 7 bouton pour chaque jours de la semaine--}}
            @for ($i = 0; $i <7; $i++)
                <a class="btnChoixJour" href="{{ request()->fullUrlWithQuery(['jour' => $jours[$i] ])}}"><button>{{$days[$i]}}</button></a>
            @endfor
            @endif
        </div>

        @if(request()->has('jour'))
            <!-- Renvoi de l'affiche avec le titre, le genre et la durée -->
            @if($films->isNotEmpty())
                @foreach($films as $film)
                    <div class="row d-flex align-items-center" style="margin-top: 50px">
                        <div class="col">
                            <img src="{{asset($film->posterFilm)}}" alt="{{$film->posterFilm}}" width="100" height="152">
                        </div>
                        <div class="col" style="margin-right: 1070px">
                            <p>{{$film->titreFilm}}</p>
                            <p>{{$film->genre->libGenre}} ({{$film->dureeFilm}} min)</p>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px">
                        @foreach($seances as $seance)
                            @if($seance->idFilm == $film->idFilm )
                                <!-- Renvoi de toutes les séances de la journée choisie -->
                                <div class="col">
                                    <h4>{{$seance->heureSeance}} -> {{Carbon::createFromFormat('H:i', $seance->heureSeance)->addMinutes($seance->film->dureeFilm)->format('H:i')}}</h4>
                                    <h4 style="margin-top: -10px">Salle {{$seance->idSalle}}</h4>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            @else
                <p>Aucun film pour ce jour</p>
            @endif
        @endif
        @if($cinemaChoisi->isNotEmpty())
            <a href="progSemaineCinema">Effacer la recherche</a>
        @endif
</main>

<footer class="site-footer" style="background-color: #991917; margin-top: 70px">
    <div class="footer-inner d-flex align-items-center position-relative">
        <p class="footer-text m-0 position-absolute start-50 translate-middle-x">
            Copyright DevOreo :
            Barthelemy Maxence, Gamet Dylan, Hassani Ayad-Youssouf
        </p>

        <img src="images/devOreo.png" id="logoDevOreo" alt="DevOreo Logo" class="ms-auto">
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

