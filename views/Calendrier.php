<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des Tournées</title>
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
    <h1>Calendrier des Tournées</h1>

    <form method="post" action="CalendrierController.php">
    <label for="tournee">Sélectionnez une tournée :</label>
    <select name="idtournee" id="tournee">
        <?php foreach ($tournees as $tournee) : ?>
            <option value="<?= $tournee['idtournee'] ?>"><?= $tournee['libelletournee'] ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label for="dates_livraison">Dates de livraison :</label>
    <div id="dates-container">
        <input type="date" id="date-picker">
        <button type="button" id="add-date-btn">Ajouter</button>
        <ul id="dates-list"></ul>
        <textarea name="dates_livraison" id="dates_livraison" rows="5" cols="50" placeholder="Les dates sélectionnées apparaîtront ici..." readonly></textarea>
    </div>
    <br><br>

    <label for="frequence">Fréquence de livraison :</label>
        <select name="frequence" id="frequence">
            <option value="1">Hebdomadaire</option>
            <option value="2">Bi-hebdomadaire</option>
            <option value="4">Mensuelle</option>
        </select>
        <br><br>

    <button type="submit">Enregistrer</button>
</form>


    <h2><span>Jours Fériés pour l'année <?= date('Y') ?></span></h2>
    <ul>
        <?php foreach ($joursFeries as $jourFerie): ?>
            <li><?= htmlspecialchars($jourFerie) ?></li>
        <?php endforeach; ?>
    </ul>
    
    <script>
    const datePicker = document.getElementById('date-picker');
    const addDateBtn = document.getElementById('add-date-btn');
    const datesList = document.getElementById('dates-list');
    const datesTextarea = document.getElementById('dates_livraison');

    addDateBtn.addEventListener('click', function () {
        const selectedDate = datePicker.value;

        // Vérifiez si une date est sélectionnée
        if (!selectedDate) {
            alert("Veuillez sélectionner une date avant d'ajouter.");
            return;
        }

        // Vérifiez si la date est déjà ajoutée
        const existingDates = datesTextarea.value.split(',').map(date => date.trim());
        if (existingDates.includes(selectedDate)) {
            alert("Cette date est déjà ajoutée.");
            return;
        }

        // Ajouter la date à la liste
        const listItem = document.createElement('li');
        listItem.innerHTML = `
            ${selectedDate} 
            <button type="button" class="remove-date-btn">Supprimer</button>
        `;
        datesList.appendChild(listItem);

        // Mettre à jour le champ texte caché
        existingDates.push(selectedDate);
        datesTextarea.value = existingDates.join(', ');

        // Ajouter un gestionnaire pour le bouton de suppression
        listItem.querySelector('.remove-date-btn').addEventListener('click', function () {
            datesList.removeChild(listItem);

            // Mettre à jour le champ texte caché
            const updatedDates = existingDates.filter(date => date !== selectedDate);
            datesTextarea.value = updatedDates.join(', ');
        });

        // Réinitialiser le sélecteur de date
        datePicker.value = '';
    });
</script>


</body>

</html>