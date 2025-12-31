<?php
use App\Http\Controllers\PersonneController;
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
<h1>La personne </h1>
<img src="{{asset('storage/'.$personne->photoPers)}}" alt="{{$personne->photoPers}}">
<p>Nom : {{$personne->nomPers}} <br> Nom : {{$personne->prePers}}</p>
<p>Bibliographie <br> {{$personne->biblio}}</p>
<h3>Film joué</h3>
@foreach($personne->films as $p)
    <p>Nom film : {{$p->titreFilm}}</p>
@endforeach

<p>Film réalisé</p>
@foreach($personne->realiser as $a)
    <p>Nom film : {{$a->titreFilm}}</p>
@endforeach

<form action="/personnes/{{$personne->idPers }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        class="bg-red-500 hover:bg-red-600 px-6 py-4 m-2 rounded-lg hover:cursor-pointer shadow-xl">
        Supprimer
    </button>
</form>

<a href="/personnes/edit/{{$personne->idPers}}">
    <button>Modifier</button>
</body>
</html>

