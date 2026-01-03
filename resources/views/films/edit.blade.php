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
<h1>Modifiez le film {{$film->titreFilm}}</h1>

<div>
    <form method="POST" action="/films/{{$film->idFilm}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="titreFilm">Titre du film</label>
        <input type="text" id="titreFilm" name="titreFilm"
               value="{{ old('titreFilm', $film->titreFilm) }}">
        <br>

        <label for="descFilm">Description du film</label>
        <textarea id="descFilm" name="descFilm">{{ old('descFilm', $film->descFilm) }}</textarea>
        <br>

        <label for="dateSortieFilm">Date sortie du film</label>
        <input type="date" id="dateSortieFilm" name="dateSortieFilm"
               value="{{ old('dateSortieFilm', $film->dateSortieFilm) }}">
        <br>

        <label for="dureeFilm">Durée du film</label>
        <input type="number" id="dureeFilm" name="dureeFilm"
               value="{{ old('dureeFilm', $film->dureeFilm) }}">
        <br>

        <label for="idGenre">ID Genre</label>
        <input type="number" id="idGenre" name="idGenre"
               value="{{ old('idGenre', $film->idGenre) }}">
        <br>

        <button type="submit">Modifier le film</button>
    </form>


</div>
</body>
</html>
