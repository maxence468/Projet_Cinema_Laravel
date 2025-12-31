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
<h1>la seance {{$seance->idSeance}}</h1>

    <p>heure : {{$seance->heureSeance}}, date : {{$seance->dateSeance}}, duree {{$seance->dureeSeance}} minutes
        <br> Film : {{$seance->film->titreFilm}}</p>
    <p>Salle : {{$seance->salle->idSalle}}</p>

<p></p>
<p></p>
</body>
</html>
