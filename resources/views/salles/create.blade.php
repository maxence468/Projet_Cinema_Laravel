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
<h1>Crez une salle</h1>

<form action="/salles" method="post" >
    @csrf
    <label for="">Capacité de la salle</label>
    <input name="capaciteSal" type="number">
    <br>
    <label for="">Cinema</label>
    <input name="idCinema" type="number">
    <br>
    <label for="">Type de salle</label>
    <input name="idTypeSalle" type="number">
    <br>
    <button>Creez</button>


@foreach($cinemas as $c)
        <p>Cinema disponible <br> {{$c->idCinema}} . {{$c->nomCinema}} </p>
    @endforeach


    @foreach($typesSalle as $t)
        <p>Type de salle disponible <br> {{$t->idTypeSalle}} . {{$t->libTypeSalle}} . {{$t->prixTypeSalle}} </p>
    @endforeach

</form>
</body>
</html>
