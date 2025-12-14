<?php
use App\Http\Controllers\SeanceController;
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seances</title>
</head>
<body>
<h1>les Seances</h1>
@foreach($seances as $s)

    <p>ID Seance : {{$s->idSeance}} , heure : {{$s->heureSeance}}, date : {{$s->dateSeance}}, duree {{$s->dureeSeance}} minutes
        <br> Film : {{$s->film->titreFilm}}</p>
    <p>Salle : {{$s->salle->idSalle}}</p>

@endforeach
<p></p>
<p></p>
</body>
</html>
