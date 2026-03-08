<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier la réservation</title>
</head>
<body>
<h1>Modifier la réservation</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('reservations.update', $reservation) }}" method="post">
    @csrf
    @method('PATCH')
    <label for="idUser">Utilisateur</label>
    <input type="number" id="idUser" name="idUser" value="{{ old('idUser', $reservation->idUser) }}" required>
    <br>
    <label for="idSeance">Séance</label>
    <input type="number" id="idSeance" name="idSeance" value="{{ old('idSeance', $reservation->idSeance) }}" required>
    <br>
    <label for="nbPlace">Nombre de places</label>
    <input type="number" id="nbPlace" name="nbPlace" min="1" value="{{ old('nbPlace', $reservation->nbPlace) }}" required>
    <br>
    <label for="montantTotal">Montant total</label>
    <input type="number" id="montantTotal" name="montantTotal" step="0.01" min="0" value="{{ old('montantTotal', $reservation->montantTotal) }}" required>
    <br>
    <button type="submit">Modifier</button>
</form>
</body>
</html>
