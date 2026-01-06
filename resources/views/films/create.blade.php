<?php
    use App\Http\Controllers\FilmController;
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
<h1>Crez un film</h1>

<div>
    <form method="POST" action="/films" enctype="multipart/form-data">
        @csrf

        <label for="titreFilm">Titre du film</label>
        <input type="text" id="titreFilm" name="titreFilm">
        <br>

        <label for="descFilm">Description du film</label>
        <textarea id="descFilm" name="descFilm"></textarea>
        <br>

        <label for="dateSortieFilm">Date sortie du film</label>
        <input type="date" id="dateSortieFilm" name="dateSortieFilm">
        <br>

        <label for="dureeFilm">Durée du film</label>
        <input type="number" id="dureeFilm" name="dureeFilm"> (minutes)
        <br>

        <label for="posterFilm">Poster du film</label>
        <input type="file" id="posterFilm" name="posterFilm">
        <br>

        <label for="idGenre">ID Genre</label>
        <input type="number" id="idGenre" name="idGenre" value="{{ old('idGenre') }}" required>
        <br>
      <h4>Genres disponibles : </h4>
        <ul>
            @foreach($genres as $g)
                {{ $g->idGenre }} - {{ $g->libGenre }}<br>
            @endforeach
        </ul>
        <br>
        <br>

        <button type="submit">Créer le film</button>
    </form>

</div>
</body>
</html>
