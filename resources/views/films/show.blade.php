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
<h1>Le film : {{$film->titreFilm}}</h1>

<img src="{{ asset('storage/' . $film->posterFilm) }}" alt="{{ $film->posterFilm }}">
<p>Description du film <br> {{$film->descFilm}} <br> Sortie en  {{$film->dateSortieFilm}}
    <br> Duree :  {{$film->dureeFilm}} minutes </p>

<p>type genre : {{$film->genre->libGenre}} </p>


    @foreach($film->casting as $pp)
        <p>{{$pp->pivot->nomJoue}} {{$pp->pivot->preJoue}} ({{$pp->nomPers}})</p>
    @endforeach

<form action="/films/{{$film->idFilm }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        class="bg-red-500 hover:bg-red-600 px-6 py-4 m-2 rounded-lg hover:cursor-pointer shadow-xl">
        Supprimer
    </button>
    </form>

<a href="/films/edit/{{$film->idFilm}}">
    <button>Modifier</button>
</a>
</body>
</html>

