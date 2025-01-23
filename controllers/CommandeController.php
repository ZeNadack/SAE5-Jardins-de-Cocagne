<?php

require_once 'models/CommandeModel.php';

class CommandeController {
    private $model;

    public function __construct() {
        $db = new PDO('mysql:host=db;dbname=jardinsdecocagne', 'root', 'root'); // Configurez selon vos besoins
        $this->model = new CommandeModel($db);
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->creerCommande($_POST);
        } else {
            $this->afficherFormulaireCommande($_SESSION['idClient'] ?? 1); // Remplacez par la gestion de session
        }
    }

    private function afficherFormulaireCommande($idClient) {
        $abonnements = $this->model->getAbonnementsByClient($idClient);
        $pointsDeDepot = $this->model->getPointsDeDepot();
        include 'views/Commande.php';
    }

    private function creerCommande($data) {
        $commandeId = $this->model->createCommande($data);
        header('Location: success.php?idCommande=' . $commandeId);
        exit;
    }
}
