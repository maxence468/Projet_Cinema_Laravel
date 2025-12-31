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
<h1>Le tarif {{$tarif->idTarif}}</h1>
<div>
    <form action="/tarifs/{{$tarif->idTarif}}" method="post">
        @csrf
        @method('PATCH')
        <label for="">Libellé du tarif</label>
        <input name="libTarif" type="text" value="{{old('libTarif',$taif->libTarif)}}">
        <br>
        <label for="">Prix du tarif</label>
        <input name="prixTarif" type="number" value="{{old('prixTarif',$tarif->prixTarif)}}">
        <br>
        <button>Modifier le tarif</button>
    </form>
</div>
</body>
</html>
