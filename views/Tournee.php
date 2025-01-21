<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Tournée</title>
    <link rel="stylesheet" href="styles.css">
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

    <h2>Liste des Tournées</h2>
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
