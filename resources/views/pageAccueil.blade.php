    <?php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page d'accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href={{asset("style.css")}}>
</head>
<body>
<header>
    <nav>
        <div class="nav-wrapper">

            <div class="logo-wrapper">
                <img src="images/logo_CineForAll.png" alt="Logo CinéForAll">
            </div>
            <a href="" class="nav-text accueil">Accueil</a>
            <a href="" class="nav-text film">Recherche film</a>
            <a href="" class="nav-text acteur">Recherche acteur</a>
            <a href="" class="nav-text genre">Recherche genre</a>
            <a href="" class="nav-text programme">Programme de la semaine</a>
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

<main>
    <h2>Les dernières sorties</h2>
    <div class="d-flex flex-row justify-content-between">
        <img class="poster" src="images/poster21JumpStreet.png" alt="poster1">
        <img class="poster" src="images/posterF&F1.png" alt="poster2">
        <img class="poster" src="images/posterTaken2.png" alt="poster3">
    </div>
</main>

<footer class="site-footer">
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

