<?php
use App\Http\Controllers\FilmController;
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les films</title>
</head>
<body>
<h1>Les films</h1>
@foreach($films as $f)
    <h2>Nom film {{$f->titreFilm}}</h2> <br> Description du film <br> {{$f->descFilm}} <br> Sortie en  {{$f->dateSortieFilm}}
        <br> Duree :  {{$f->dureeFilm}} minutes <br> {{$f->posterFilm}}</p>

    <p>type genre : {{$f->genre->libGenre}} </p>

    <h2>Les acteurs principales</h2>
    @foreach($f->casting as $p)
        @if($p->pivot->principale == 1)
            <p> {{$p->nomPers}} {{$p->prePers}} ({{$p->pivot->nomJoue}})</p>
        @endif
    @endforeach
    <h3>les acteurs secondaires</h3>
    @foreach($f->casting as $p)
        @if($p->pivot->principale == 0)
            <p> {{$p->nomPers}} {{$p->prePers}} ({{$p->pivot->nomJoue}})</p>
        @endif
    @endforeach
    <h3>Realisateur</h3>
    @foreach($f->realisateurs as $p)
        <p>Nom {{$p->nomPers}}</p>
    @endforeach
    <h3>Scenariste</h3>
    @foreach($f->scenariste as $p)
        <p>Nom {{$p->nomPers}}</p>
    @endforeach

    <h3>Seance diffusé</h3>
    @foreach($f->seances as $seance)
        <p>Seance {{$seance->idSeance}}</p>
    @endforeach

@endforeach
</body>
</html>

