<?php
// models/CalendrierModel.php

class CalendrierModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=db;dbname=jardinsdecocagne', 'root', 'root');
    }

    // Récupérer toutes les tournées
    public function getTournees()
    {
        $query = "SELECT idtournee, libelletournee FROM tournees";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne un tableau associatif
    }

    // Récupérer tous les jours fériés
    public function getJoursFeries($annee)
    {
        $stmt = $this->pdo->prepare("SELECT dateferie FROM joursferies WHERE YEAR(dateferie) = ?");
        $stmt->execute([$annee]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Enregistrer ou mettre à jour un calendrier
    public function saveCalendrier($idtournee, $dateLivraison, $frequence)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO calendriers (idtournee, datelivraison, frequence) 
            VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE frequence = VALUES(frequence)"
        );
        $stmt->execute([$idtournee, $dateLivraison, $frequence]);
    }

public function addCalendrier($idtournee, $dateLivraison, $frequence = 1)
{
    try {
        $query = "INSERT INTO calendriers (idtournee, datelivraison, frequence) VALUES (:idtournee, :datelivraison, :frequence)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idtournee', $idtournee, PDO::PARAM_INT);
        $stmt->bindParam(':datelivraison', $dateLivraison, PDO::PARAM_STR);
        $stmt->bindParam(':frequence', $frequence, PDO::PARAM_INT);
        
        $stmt->execute();
        
        // Ajoutez un message de débogage
        echo "Date ajoutée avec succès : " . $dateLivraison;
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
    }
}


    // Récupérer le calendrier d'une tournée
    public function getCalendrierByTournee($idtournee)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM calendriers WHERE idtournee = ?");
        $stmt->execute([$idtournee]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>