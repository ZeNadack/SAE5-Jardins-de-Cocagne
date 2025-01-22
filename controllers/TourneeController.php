<?php
// controllers/TourneeController.php

require_once 'models/TourneeModel.php';

class TourneeController {
    private $model;

    public function __construct() {
        $this->model = new TourneeModel();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->createTournee();
        } else {
            $this->showForm();
        }
    }

    private function showForm() {
        $pointsDeDepot = $this->model->getPointsDeDepot();
        $tournees = $this->model->getTournees();
        require 'views/Tournee.php';
    }

    private function createTournee() {
        $libelle = $_POST['libelle'];
        $jourPreparation = $_POST['jour_preparation'];
        $jourLivraison = $_POST['jour_livraison'];
        $couleur = $_POST['couleur'];
        $points = $_POST['points']; // Array of point IDs in order

        $this->model->createTournee($libelle, $jourPreparation, $jourLivraison, $couleur, $points);
        header('Location: ../tournee.php');
    }
}
?>
