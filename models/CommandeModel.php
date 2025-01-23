<?php

class CommandeModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAbonnementsByClient($idClient) {
        $stmt = $this->db->prepare("SELECT a.*, p.nom, p.description 
                                    FROM abonnements a 
                                    INNER JOIN produits p ON a.idproduit = p.idproduit 
                                    WHERE a.idclient = :idClient");
        $stmt->bindParam(':idClient', $idClient, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPointsDeDepot() {
        $stmt = $this->db->query("SELECT * FROM pointsdedepot");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCommande($data) {
        $stmt = $this->db->prepare("INSERT INTO commandes (idclient, idabonnement, datecommande, datelivraison, idpointdedepot) 
                                    VALUES (:idClient, :idAbonnement, CURRENT_DATE, :dateLivraison, :idPointDeDepot)");
        $stmt->bindParam(':idClient', $data['idClient'], PDO::PARAM_INT);
        $stmt->bindParam(':idAbonnement', $data['idAbonnement'], PDO::PARAM_INT);
        $stmt->bindParam(':dateLivraison', $data['dateLivraison'], PDO::PARAM_STR);
        $stmt->bindParam(':idPointDeDepot', $data['idPointDeDepot'], PDO::PARAM_INT);
        $stmt->execute();

        return $this->db->lastInsertId();
    }
}
