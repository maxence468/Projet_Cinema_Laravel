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
    <form method="post" action="">
        <div class="d-flex justify-content-center">
            <input class="inputRechFilm" type="text" placeholder="Rechercher un cinéma">
            <input type="submit" hidden/>
        </div>
    </form>
    <br>
    <h2>Résultat pour le cinéma : "nomCinéma"</h2>
    <!-- Bouton de sélection du jour -->
    <div class="col d-flex justify-content-around" style="margin-top: 60px">
        <button class="btnChoixJour">lun. "jour" "mois"</button>
        <button class="btnChoixJour">mar. "jour" "mois"</button>
        <button class="btnChoixJour">mer. "jour" "mois"</button>
        <button class="btnChoixJour">jeu. "jour" "mois"</button>
        <button class="btnChoixJour">ven. "jour" "mois"</button>
        <button class="btnChoixJour">sam. "jour" "mois"</button>
        <button class="btnChoixJour">dim. "jour" "mois"</button>
    </div>
    <!-- Renvoi de l'affiche avec le titre, le genre et la durée -->
    <div class="row d-flex align-items-center" style="margin-top: 50px">
        <div class="col">
            <img src="images/poster21JumpStreet.png" alt="filmTrouvé" width="100" height="152">
        </div>
        <div class="col" style="margin-right: 1070px">
            <p>"titre"</p>
            <p>"genre"("durée")</p>
        </div>
    </div>
    <!-- Renvoi de toutes les séances de la journée choisis -->
    <div class="row" style="margin-top: 15px">
        <div class="col">
            <h4>Heure début -> Heure fin</h4>
            <h4 style="margin-top: -10px">Numéro salle</h4>
        </div>
    </div>
</main>

<footer class="site-footer" style="background-color: #991917; margin-top: 70px">
    <div class="footer-inner d-flex align-items-center position-relative">
        <p class="footer-text m-0 position-absolute start-50 translate-middle-x">
            Copyright DevOreo :
            Barthelemy Maxence, Gamet Dylan, Hassani Ayad-Youssouf
        </p>

        <img src="images/devOreo.png" id="logoDevOreo" alt="DevOreo Logo" class="ms-auto">
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

