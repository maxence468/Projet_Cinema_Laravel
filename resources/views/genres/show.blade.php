<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Un genre</title>
</head>
<body>
<h1>Le genre</h1>
<p>Le genre : {{$genre->libGenre}}</p>

<form action="/genres/{{$genre->idGenre }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        class="bg-red-500 hover:bg-red-600 px-6 py-4 m-2 rounded-lg hover:cursor-pointer shadow-xl">
        Supprimer
    </button>
</form>

<a href="/genres/edit/{{$genre->idGenre}}">
    <button>Modifier</button>
</body>
</html>

