<?php
// controllers/CalendrierController.php

require_once 'models/CalendrierModel.php';

class CalendrierController
{
    private $model;

    public function __construct()
    {
        $this->model = new CalendrierModel();
    }

    public function handleRequest() {
        $joursFeries = $this->getJoursFeries();
        $tournees = $this->model->getTournees(); // Récupère les tournées
        require_once 'views/Calendrier.php';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données soumises
            $idtournee = $_POST['idtournee'] ?? null;
            $datesLivraison = $_POST['dates_livraison'] ?? '';
            $frequence = $_POST['frequence'] ?? 1;
    
            if ($idtournee && $datesLivraison) {
                // Séparer les dates par les virgules
                $datesArray = array_map('trim', explode(',', $datesLivraison));
    
                // Ajouter les dates dans la base
                foreach ($datesArray as $date) {
                    $this->model->addCalendrier($idtournee, $date, $frequence);
                }
    
                // Redirection après ajout
                header("Location: index.php?controller=Calendrier&action=index");
                exit(); // Assurez-vous d'arrêter l'exécution après la redirection
            } else {
                echo "Erreur : Veuillez sélectionner une tournée et ajouter des dates.";
            }
        }
    }

    
    private function getJoursFeries() {
        return [
            '2025-01-01' => 'Nouvel An (01-01-2025)',
            '2025-04-21' => 'Lundi de Pâques (21-04-2025)',
            '2025-05-01' => 'Fête du Travail (01-05-2025)',
        ];
    }

    public function index()
    {
        $tournees = $this->model->getTournees();
        $joursFeries = $this->model->getJoursFeries(date('Y'));

        require 'views/Calendrier.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idtournee = $_POST['idtournee'];
            $datesLivraison = $_POST['dates_livraison'];
            $frequence = $_POST['frequence'];

            foreach ($datesLivraison as $dateLivraison) {
                $this->model->saveCalendrier($idtournee, $dateLivraison, $frequence);
            }
        }

        header('Location: index.php?controller=Calendrier&action=index');
    }
}
?>