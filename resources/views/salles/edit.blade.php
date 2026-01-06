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
<h1>Modifier la  salle {{$salle->idSalle}}</h1>

<form action="/salles/{{$salle->idSalle}}" method="post" >
    @csrf
    @method('PATCH')
    <label for="">Capacité de la salle</label>
    <input name="capaciteSal" type="number" value="{{old('capaciteSal', $salle->capaciteSalle)}}">
    <br>
    <label for="">Cinema</label>
    <input name="idCinema" type="number" value="{{old('idCinema', $salle->idCinema)}}">
    <br>
    <label for="">Type de salle</label>
    <input name="idTypeSalle" type="number" value="{{old('idTypeSalle', $salle->idTypeSalle)}}">
    <br>
    <button>Modifier</button>


@foreach($cinemas as $c)
        <p>Cinema disponible <br> {{$c->idCinema}} . {{$c->nomCinema}} </p>
    @endforeach


    @foreach($typesSalle as $t)
        <p>Type de salle disponible <br> {{$t->idTypeSalle}} . {{$t->libTypeSalle}} . {{$t->prixTypeSalle}} </p>
    @endforeach

</form>
</body>
</html>
