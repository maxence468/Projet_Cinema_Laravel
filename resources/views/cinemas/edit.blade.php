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
<h1>Modifier un cinema</h1>

<div>
    <form action="/cinemas/{{$cinema->idCinema}}" method="post">
        @csrf
        @method('PATCH')

        <label for="nomCinema">Nom  du cinéma</label>
        <input type="text" id="nomCinema" name="nomCinema"
               value="{{ old('nomCinema', $cinema->nomCinema) }}">
        <br>
        <label for="adresseCInema">Adresse cinema </label>
        <input name="adresseCinema" type="text" value="{{old('adresseCinema', $cinema->adresseCinema)}}">
        <br>
        <label for="codePostale">Code postale du cinema </label>
        <input name="codePostale" type="text" value="{{old('codePostale',$cinema->codePostale)}}">
        <br>
        <button>Modifier</button>
    </form>
</div>
</body>
</html>

