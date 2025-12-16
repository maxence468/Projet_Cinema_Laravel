<?php
use Illuminate\Support\Carbon;

?>
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>prog de la Semaine par Cinema</title>
</head>
<body>
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
{{--Quand un cinema est choisi--}}
@if($cinemaChoisi->isNotEmpty())
    {{--    on affiche 7 bouton pour chaque jours de la semaine--}}
    @for ($i = 0; $i <7; $i++)
        <a href="{{ request()->fullUrlWithQuery(['jour' => $jour + $i ])}}">{{$joursSemaine[$i]}} {{$jour + $i}}</a>
    @endfor
@endif

{{--quand un jour est choisi--}}
@if(request()->has('jour'))
    @if($seances->isNotEmpty())
        @foreach($seances as $seance)
            <hr>
            <img src="{{asset($seance->film->posterFilm)}}" alt="{{$seance->film->posterFilm}}">
            <p>Titre film : {{$seance->film->titreFilm}} </p>
            <p>genre : {{$seance->film->genre->libGenre}}</p>
            <p>durée : {{$seance->film->dureeFilm}}</p>
            <p>numero de la salle : {{$seance->idSalle}} </p>
            <p>heure debut seance : {{$seance->heureSeance}}</p>
            <p>heure fin seance : {{Carbon::createFromFormat('H:i', $seance->heureSeance)->addMinutes($seance->film->dureeFilm)->format('H:i')}}</p>
            <hr>
        @endforeach
    @else
        <p>Aucun film pour ce jour</p>
    @endif
@endif

<a href="progSemaineCinema">Effacer la recherche</a>
</body>
</html>
