<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunnel de Commande</title>
</head>
<body>
    <h1>Tunnel de Commande</h1>
    <form method="POST" action="">
        <label for="abonnement">Choisir un abonnement :</label>
        <select name="abonnement" id="abonnement">
            <option value="1">Abonnement 1</option>
            <option value="2">Abonnement 2</option>
        </select>
        <br><br>

        <label for="depot">Sélectionner un dépôt :</label>
        <select name="depot" id="depot">
            <option value="1">Dépôt 1</option>
            <option value="2">Dépôt 2</option>
        </select>
        <br><br>

        <label for="dates">Dates souhaitées :</label>
        <input type="date" name="dates[]" multiple>
        <br><br>

        <button type="submit">Valider la commande</button>
    </form>
</body>
</html>
