<?php
use App\Http\Controllers\GenreController;
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les genres</title>
</head>
<body>
<h1>Les genres </h1>
@foreach($genres as $genre)

    <p>Libellle genre : {{$genre->libGenre}}</p>
@endforeach
</body>
</html>
