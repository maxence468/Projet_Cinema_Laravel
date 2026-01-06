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
<h1>Creez un cinema</h1>

<div>
    <form action="/cinemas" method="post">
        @csrf
        <label for="">Nom cinema </label>
        <input name="nomCinema" type="text">
        <br>
        <label for="">Adresse cinema </label>
        <input name="adresseCinema" type="text">
        <br>
        <label for="">Code postale du cinema </label>
        <input name="codePostale" type="text">
        <br>
        <button>Creez</button>
    </form>
</div>
</body>
</html>

