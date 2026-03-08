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
<h1>La reservation</h1>
<p>Utilisateur : {{$reservation->idUser}}</p>
<p>idSeance : {{$reservation->idSeance}}</p>
<p>nombre de place : {{$reservation->nbPlace}}</p>
<p>montant total : {{$reservation->montantTotal}}</p>
<p>Date de reservation : {{$reservation->dateReservation}}</p>
<a href="/reservations">
    <button>Retour</button>
</a>
<a href="/reservations/{{$reservation->idReservation}}/edit">

    <button>Modifier</button>
</a>
<form action="/reservations/{{$reservation->idReservation}}" method="post">
    @csrf
    @method('delete')
    <button>Suppprimer</button>
</form>

</body>
</html>
