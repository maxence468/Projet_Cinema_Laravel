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
<h1>CModifier le type de salle numero {{$typesalle->idTypeSalle}} </h1>
<div>
    <form action="/typesalles/{{$typesalle->idTypeSalle}}" method="post">
        @csrf
        @method('PATCH')
        <label for="">Libellé type salle</label>
        <input name="libTypeSalle" type="text" value="{{old('libTypeSalle', $typesalle->libTypeSalle)}}">
        <br>
        <label for="">Prix du type salle</label>
        <input name="prixTypeSalle" type="number" value="{{old('prixTypeSalle', $typesalle->prixTypeSalle)}}">
        <br>
        <button>Modifier</button>
    </form>
</div>
</body>
</html>
