<?php
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
<h1>Modifier un genre</h1>
<div>
    <form action="/genres/{{$genre->idGenre}}" method="post">
        @csrf
        @method('PATCH')
        <label for="libGenre">Libellé du genre</label>
        <input name="libGenre" type="text" value="{{old('libGenre',$genre->libGenre)}}">
        <br>
        <button>Modifier le genre</button>
    </form>
</div>
</body>
</html>
