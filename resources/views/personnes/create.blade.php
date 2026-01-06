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
<h1>Ajoutez une personne</h1>
<div>
    <form action="/personnes" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="" >Nom de la personne</label>
        <input name="nomPers" type="text">

        <br>

        <label for="">Prenom de la personne</label>
        <input name="prePers" type="text">
        <br>

        <label for="" name="Date de Nnaissance"></label>
        <input name="dateNaissPers" type="date">
        <br>

        <label for="" >Lieu de naissance</label>
        <input name="lieuNaissPers" type="text">
        <br>

        <label for="">Photo de la personne</label>
        <input name="photoPers" type="file">
        <br>
        <label for="biblio">Bibliographique</label>
        <textarea id="biblio" name="biblio"></textarea>
        <br>
        <button>Creez</button>
    </form>
</div>
</body>
</html>
