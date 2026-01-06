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
<h1>Creez un type de salle </h1>
<div>
    <form action="/typesalles" method="post">
        @csrf
        <label for="">Libellé type salle</label>
        <input name="libTypeSalle" type="text">
        <br>
        <label for="">Prix du type de salle</label>
        <input name="prixTypeSalle" type="number">
        <br>
        <button>Creez</button>
    </form>
</div>
</body>
</html>
