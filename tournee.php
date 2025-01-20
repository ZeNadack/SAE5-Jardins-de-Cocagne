<?php
// tournee.php

include('template.php');

require_once 'controllers/TourneeController.php';

$controller = new TourneeController();
$controller->handleRequest();
?>
