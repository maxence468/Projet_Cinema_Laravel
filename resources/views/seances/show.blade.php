<?php
use App\Http\Controllers\SeanceController;
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seances</title>
</head>
<body>
<h1>la seance {{$seance->idSeance}}</h1>

    <p>heure : {{$seance->heureSeance}}, date : {{$seance->dateSeance}}, duree {{$seance->dureeSeance}} minutes
        <br> Film : {{$seance->film->titreFilm}}</p>
    <p>Salle : {{$seance->salle->idSalle}}</p>
<p>Cinema {{$seance->salle->cinema->nomCinema}}</p>

<form action="/seances/{{$seance->idSeance }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        class="bg-red-500 hover:bg-red-600 px-6 py-4 m-2 rounded-lg hover:cursor-pointer shadow-xl">
        Supprimer
    </button>
</form>

<a href="/seances/edit/{{$seance->idSeance}}">
    <button>Modifier</button>
<p></p>
<p></p>
</body>
</html>
