
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
    <title>Salles</title>
</head>
<body>
<h1>Les salles</h1>
@foreach($salles as $salle)
    <h2>Salle {{$salle->idSalle}}</h2>
    <p>{{$salle->cinema->nomCinema}} {{$salle->cinema->adresseCinema}} {{$salle->cinema->codePostale}}</p>
    <a href="/salles/{{$salle->idSalle}}">
        <button>Voir</button>
    </a>
    @foreach($salle->tarifs as $g)
       <p>Salle {{$salle->idSalle}}, Type tarif : {{$g->libTarif}} ({{$g->prixTarif}} euros )</p>
    @endforeach

@endforeach
<br>
<a href="/salles/create">
    <button>Creez une salle</button>
</a>
</body>
</html>
