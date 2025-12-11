<?php
use App\Http\Controllers\PersonneController;
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
<h1>La personne </h1>
<p>Nom : {{$personne->nomPers}} <br> Nom : {{$personne->prePers}}</p>
<h3>Film joué</h3>
@foreach($personne->films as $p)
    <p>Nom film : {{$p->titreFilm}}</p>
@endforeach

<p>Film réalisé</p>
@foreach($personne->realiser as $a)
    <p>Nom film : {{$a->titreFilm}}</p>
@endforeach
</body>
</html>

