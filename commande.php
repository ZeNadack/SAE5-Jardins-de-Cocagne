<?php
// commande.php

require_once 'controllers/CommandeController.php';

$controller = new CommandeController();
$controller->handleRequest();
?>
