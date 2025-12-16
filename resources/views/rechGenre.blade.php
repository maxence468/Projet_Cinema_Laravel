<?php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page d'accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>
<body>
<header>
    <nav>
        <div class="nav-wrapper">

            <div class="logo-wrapper">
                <img src="images/logo_CineForAll.png" alt="Logo CinéForAll">
            </div>
            <a href="pageAccueil.php" class="nav-text accueil">Accueil</a>
            <a href="rechFilm.php" class="nav-text film">Recherche film</a>
            <a href="rechActeur.php" class="nav-text acteur">Recherche acteur</a>
            <a href="rechGenre.php" class="nav-text genre">Recherche genre</a>
            <a href="progSemaine.php" class="nav-text programme">Programme de la semaine</a>
            <a href="" class="btn-nav inscription">
                <span>Inscription</span>
            </a>
            <div class="connexion-wrapper">
                <a href="" class="btn-nav connexion">
                    <span>Connexion</span>
                </a>
            </div>
        </div>
    </nav>
</header>

<main class="mainRechFilm">
    <form method="post" action="nomGenre">
        <div class="d-flex justify-content-center">
            <select class="movie" name="movie">
                <option value="">Veuillez sélectionner un genre</option>
                <option value="Genre 1">Genre 1</option>
                <option value="Genre 2">Genre 2</option>
            </select>
            <input type="submit" hidden/>
        </div>
    </form>
    <br>
    <div class="toHide">
        <h2>Résultats de film pour le genre : "nomFilm"</h2>
        <!-- Carousel -->
        <div class="row">
            <div class="col">
                <img src="images/poster21JumpStreet.png" alt="filmTrouvé" width="412" height="626">
            </div>
            <div class="col" style="margin-right: 360px">
                <p>"titre"</p>
                <p>"description"</p>
                <p>"genre"</p>
                <p>"réalisateurs</p>
                <p>"durée"</p>
                <p>"dispo cinéma"</p>
            </div>
        </div>
    </div>
</main>

<footer class="site-footer" style="margin-top: 70px">
    <div class="footer-inner d-flex justify-content-between align-items-center">
        <div class="footer-text">
            <p>
                Copyright DevOreo :
                Barthelemy Maxence, Gamet Dylan, Hassani Ayad-Youssouf
            </p>
        </div>
        <img src="images/devOreo.png" id="logoDevOreo" alt="DevOreo Logo">
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
