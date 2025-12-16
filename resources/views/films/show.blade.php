<?php
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PersonneController;
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
<p>Nom film {{$film->titreFilm}} <br> Description du film <br> {{$film->descFilm}} br Sortie en  {{$film->dateSortieFilm}}
    <br> Duree :  {{$film->dureeFilm}} minutes <br> {{$film->posterFilm}}</p>

<p>type genre : {{$film->genre->libGenre}} </p>


    @foreach($film->casting as $pp)
        <p>{{$pp->pivot->nomJoue}} {{$pp->pivot->preJoue}} ({{$pp->nomPers}})</p>
    @endforeach

@foreach($film->realisateurs as $b)
    <p>({{$b->nomPers}})</p>
@endforeach

@foreach($film->seances as $ss)
    <p>({{$ss->salle->cinema->nomCinema}})</p>
@endforeach
</body>
</html>

