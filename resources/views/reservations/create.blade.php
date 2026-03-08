<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creer une reservation</title>
</head>
<body>
<h1>Creer une réservation !</h1>

<form action="/reservations" method="post">
    @csrf
    <label for="">Utlisateur</label>
    <input type="number" name="idUser">
    <br>
    <label for="">Seance</label>
    <input type="number" name="idSeance">
    <br>
    <label for="">Nombre de place</label>
    <input type="number" name="nbPlace">
    <br>
    <label for="">Montant</label>
    <input type="number" name="montantTotal">
    <br>
    <button type="submit">AJOUTER</button>
</form>
</body>
</html>
