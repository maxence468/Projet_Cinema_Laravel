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
    <title>Un type de salle</title>
</head>
<body>
<h1>Type de salle numéro {{$typesalle->idTypeSalle }} </h1>
<p>{{$typesalle->libTypeSalle}}</p>
<p>{{$typesalle->prixTypeSalle}}</p>

<form action="/typesalles/{{$typesalle->idTypeSalle }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        class="bg-red-500 hover:bg-red-600 px-6 py-4 m-2 rounded-lg hover:cursor-pointer shadow-xl">
        Supprimer
    </button>
</form>

<a href="/typesalles/edit/{{$typesalle->idTypeSalle}}">
    <button>Modifier</button>
</body>
</html>
