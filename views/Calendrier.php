<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Calendriers</title>
</head>
<body>
    <h1>Gestion des Calendriers de Livraison</h1>
    <p>Cette section vous permettra de définir les calendriers en fonction des tournées et des fréquences de paniers.</p>
    <form method="POST" action="">
        <!-- Exemple de formulaire simple -->
        <label for="tournee">Sélectionner une tournée :</label>
        <select name="tournee" id="tournee">
            <option value="1">Tournée 1</option>
            <option value="2">Tournée 2</option>
        </select>
        <br><br>

        <label for="frequence">Fréquence des paniers :</label>
        <select name="frequence" id="frequence">
            <option value="1">Toutes les semaines</option>
            <option value="2">Toutes les 2 semaines</option>
        </select>
        <br><br>

        <button type="submit">Proposer un calendrier</button>
    </form>
</body>
</html>
