<?php
use App\Http\Controllers\TypeSalleController;
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Les cinemas</h1>
@foreach($cinemas as $c)
    <p>Nom cinema {{$c->nomCinema}}</p>
    <p>Adresse cinema {{$c->adresseCinema}} <br> Code psotale du cinema {{$c->codePostale}}</p>
@endforeach
</body>
</html>
