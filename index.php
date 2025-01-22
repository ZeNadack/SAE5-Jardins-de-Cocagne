<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="imgs/logonav.png"/>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">Accueil</a>
                    <a class="nav-link" href="tournee.php">Tournées</a>
                    <a class="nav-link" href="calendrier.php">Calendrier</a>
                    <a class="nav-link" href="commande.php">Commandes</a>
                </div>
            </div>
        </div>
    </nav>

    <title>Accueil - Jardins de Cocagne</title>
</head>
<body>
    <h1><span>Gestion des Jardins de Cocagne</span></h1>
    <div class="liste-index">
    <ul>
        <li><a href="tournee.php">Gestion des tournées</a></li>
        <li><a href="calendrier.php">Gestion des calendriers</a></li>
        <li><a href="commande.php">Tunnel de commande</a></li>
    </ul>
    </div>
</body>
</html>
