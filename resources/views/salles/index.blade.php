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
    @foreach($salle->tarifs as $g)
       <p>Salle {{$salle->idSalle}}, Type tarif : {{$g->libTarif}} ({{$g->prixTarif}} euros )</p>
    @endforeach

@endforeach
</body>
</html>
