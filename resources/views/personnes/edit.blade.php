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
<h1>Modifier {{$personne->nomPers}}</h1>
<div>
    <form action="/personnes/{{$personne->idPers}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="nomPers" >Nom de la personne</label>
        <input name="nomPers" type="text" value="{{old('nomPers', $personne->nomPers)}}">

        <br>

        <label for="prePers">Prenom de la personne</label>
        <input name="prePers" type="text" value="{{old('prePers', $personne->prePers)}}">
        <br>

        <label for="">Date de Naissance</label>
        <input name="dateNaissPers" type="date" value="{{old('dateNaissPers', $personne->dateNaissPers)}}">
        <br>

        <label for="lieuNaissPers" >Lieu de naissance</label>
        <input name="lieuNaissPers" type="text" value="{{old('lieuNaissPers', $personne->lieuNaissPers)}}">
        <br>
        <img src="{{asset('storage/'.$personne->photoPers)}}" alt="">
        <br>
        <label for="">Photo de la personne</label>
        <input name="photoPers" type="file" value="{{old('photoPers', $personne->photoPers)}}">
        <br>
        <label for="biblio">Bibliographique</label>
        <textarea id="biblio" name="biblio">{{old('biblio', $personne->biblio)}}</textarea>
        <br>
        <button>Modifier</button>
    </form>
</div>
</body>
</html>
