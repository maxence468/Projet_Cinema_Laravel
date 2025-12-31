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
<h1>La salle {{$salle->idSalle}}</h1>
    <p>Cinema : {{$salle->cinema->nomCinema}} <br> Adressse : {{$salle->cinema->adresseCinema}} {{$salle->cinema->codePostale}}</p>
  <p>Type de salle {{$salle->typesalle->libTypeSalle}} <br> Prix :  {{$salle->typesalle->prixTypeSalle}} euross </p>


</body>
</html>
