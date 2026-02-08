<?php
  use App\Http\Controllers\CinemaController;
  use App\Http\Controllers\SalleController;

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La salle {{$salle->idSalle}}</title>
</head>
<body>
<h1>La salle {{$salle->idSalle}}</h1>
    <p>Cinema : {{$salle->cinema->nomCinema}} <br> Adressse : {{$salle->cinema->adresseCinema}} {{$salle->cinema->codePostale}}</p>
  <p>Type de salle {{$salle->typesalle->libTypeSalle}} <br> Prix :  {{$salle->typesalle->prixTypeSalle}} euross </p>
<p>Capacite {{$salle->capaciteSal}} personnes</p>

<form action="/salles/{{$salle->idSalle }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        class="bg-red-500 hover:bg-red-600 px-6 py-4 m-2 rounded-lg hover:cursor-pointer shadow-xl">
        Supprimer
    </button>
</form>

<a href="/salles/edit/{{$salle->idSalle}}">
    <button>Modifier</button>
</body>
</html>
