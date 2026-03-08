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
<h1>Les reservations</h1>
<h1>Nombre de reservations {{count($reservations)}}</h1>
@foreach($reservations as $r)
    <h2>Reservation {{$r->idReservation}}</h2>
    <p>Utilisateur : {{$r->idUser}}</p>
    <p>idSeance : {{$r->idSeance}}</p>
    <p>montant total : {{$r->montantTotal}}</p>
    <a href="/reservations/{{$r->idReservation}}">
        <button>Voir la reservation</button>
    </a>
@endforeach
<br>
<a href="/reservations/create">
    <button>Ajouter une réservation</button>
</a>
</body>
</html>
