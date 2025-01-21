<?php

class CalendrierModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=db;dbname=jardinsdecocagne', 'root', 'root');
    }


}
?>
