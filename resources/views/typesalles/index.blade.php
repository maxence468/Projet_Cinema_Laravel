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
    <title>Les types de salles</title>
</head>
<body>
<h1>Les types de salles</h1>
@foreach($typesalles as $t)
    <p>{{$t->libTypeSalle}}</p>
    <p>Prix {{$t->prixTypeSalle}}</p>
    <a href="/typesalles/{{$t->idTypeSalle}}">
        <button>Voir</button>
    </a>
@endforeach
<br>
<a href="/typesalles/create">
    <button>Creez un tarif</button>
</a>
</body>
</html>
