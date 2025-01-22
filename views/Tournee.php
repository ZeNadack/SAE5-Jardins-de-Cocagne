<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Tournée</title>
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
</head>

<body>
    <h1>Créer une Tournée</h1>
    <form method="POST" action="">
        <label for="libelle">Libellé de la tournée :</label>
        <input type="text" name="libelle" id="libelle" required>

        <label for="jour_preparation">Jour de préparation :</label>
        <input type="date" name="jour_preparation" id="jour_preparation" required>

        <label for="jour_livraison">Jour de livraison :</label>
        <input type="date" name="jour_livraison" id="jour_livraison" required>

        <label for="couleur">Couleur :</label>
        <input type="text" name="couleur" id="couleur" required>

        <label for="points">Points de dépôt :</label>
        <?php foreach ($pointsDeDepot as $point): ?>
            <input type="checkbox" name="points[]" value="<?= $point['idpointdedepot'] ?>"> 
            <?= htmlspecialchars($point['nom']) ?><br>
        <?php endforeach; ?>

        <button type="submit">Créer la tournée</button>
    </form>

    <h2><span>Liste des Tournées</span></h2>
    <ul>
        <?php foreach ($tournees as $tournee): ?>
            <li>
                <?= htmlspecialchars($tournee['libelletournee']) ?> 
                <span class="color" style="background-color: <?= htmlspecialchars($tournee['couleur']) ?>"></span>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
