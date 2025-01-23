<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer une commande</title>
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
    <h1>Passer une commande</h1>
    <form method="POST">
        <label for="abonnement">Choisir un abonnement :</label>
        <select name="idAbonnement" id="abonnement" required>
            <?php foreach ($abonnements as $abonnement): ?>
                <option value="<?= $abonnement['idabonnement'] ?>">
                    <?= htmlspecialchars($abonnement['nom']) ?> - <?= htmlspecialchars($abonnement['description']) ?>
                    (du <?= $abonnement['datedebut'] ?> au <?= $abonnement['datefin'] ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <label for="dateLivraison">Choisir une date de livraison :</label>
        <input type="date" name="dateLivraison" id="dateLivraison" required>

        <label for="pointDeDepot">Choisir un point de dépôt :</label>
        <select name="idPointDeDepot" id="pointDeDepot" required>
            <?php foreach ($pointsDeDepot as $point): ?>
                <option value="<?= $point['idpointdedepot'] ?>">
                    <?= htmlspecialchars($point['nom']) ?> - <?= htmlspecialchars($point['adresse']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="hidden" name="idClient" value="<?= $_SESSION['idClient'] ?? 1; ?>">
        <button type="submit">Commander</button>
    </form>
</body>
</html>
