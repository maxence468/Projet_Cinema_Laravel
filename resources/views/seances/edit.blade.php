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
<h1>Modifier la seance {{$seance->idSeance}}</h1>
<div>
    <form action="/seances/{{$seance->idSeance}}" method="post">
        @csrf
        @method('PATH')
        <label for="">Heure de la seance</label>
        <input type="time" name="heureSeance" value="{{old('heureSeance', $seance->heureSeance)}}">
        <br>
        <label for="">Date de la seance</label>
        <input type="date" name="dateSeance" value="{{old('dateSeance', $seance->heureSeance)}}">
        <br>
        <label for="">Duree de la seance</label>
        <input type="number" name="dureeSeance" value="{{old('dureeSeance', $seance->heureSeance)}}">
        <br>
        <label for="">ID de salle </label>
        <input type="number" name="idSalle" value="{{old('idSalle', $seance->idSalle)}}">
        <br>
        <label for="">Id du film</label>
        <input type="number" name="idFilm" value="{{old('idFilm', $seance->idFilm)}}">
        <br>
        <button>Modifier la seance</button>

        <h3>Salle disponible</h3>
        @foreach($salles as $s)
            <p>{{$s->idSalle}} <br> {{$s->cinema->nomCinema}}</p>
        @endforeach

        <h3>Film disponible</h3>
        @foreach($films as $f)
            <p>{{$f->idFilm}}. Film {{$f->titreFilm}}</p>
        @endforeach

    </form>
</div>
</body>
</html>
