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
<h1>Personnes</h1>

@foreach($personnes as $pers)
    <p>Nom personne : {{$pers->nomPers}}</p>
    <p>Prenom personne : {{$pers->prePers}}</p>
@endforeach
</body>
</html>
