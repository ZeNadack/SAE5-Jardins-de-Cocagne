<?php

class TourneeModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=jardinsdecocagne', 'root', 'root');
    }

    public function getPointsDeDepot() {
        $stmt = $this->pdo->query("SELECT * FROM pointsdedepot");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTournees() {
        $stmt = $this->pdo->query("SELECT * FROM tournees");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTournee($libelle, $jourPreparation, $jourLivraison, $couleur, $points) {
        $this->pdo->beginTransaction();
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tournees (libelletournee, jourpreparation, jourlivraison, couleur) VALUES (?, ?, ?, ?)");
            $stmt->execute([$libelle, $jourPreparation, $jourLivraison, $couleur]);
            $tourneeId = $this->pdo->lastInsertId();

            $order = 1;
            foreach ($points as $pointId) {
                $stmt = $this->pdo->prepare("INSERT INTO tourneepointsdedepot (idtournee, idpointdedepot, ordrelivraison) VALUES (?, ?, ?)");
                $stmt->execute([$tourneeId, $pointId, $order]);
                $order++;
            }

            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
?>
