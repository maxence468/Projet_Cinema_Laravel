<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recherche par genre</title>
</head>
<body>
<form method="GET" action="{{ route('rechercheGenre') }}">
    <select name="genre">
        <option value="">-- Tous les genres --</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->idGenre }}"
                {{ request('genre') == $genre->id ? 'selected' : '' }}>
                {{ $genre->libGenre }}
            </option>
        @endforeach
    </select>
    <button type="submit">Rechercher</button>
</form>

@if(!$rechercheFaite)
    <p>Recherchez votre film selon son genre !</p>
@elseif ($films->isNotEmpty())
    <ul>
        @foreach ($films as $film)
            <li>{{ $film->titreFilm }} ({{ $film->genre->libGenre }})</li>
        @endforeach
    </ul>
@else
    <p>Aucun film trouvé</p>
@endif
</body>
</html>
