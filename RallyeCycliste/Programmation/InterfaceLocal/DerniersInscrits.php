<?php

function __autoload($class) {require_once "../Classes/$class.php";}

require_once "VerifConnexion.php";
session_start();

$connector = MaBD::getInstance();
$derniersInscrits = new InscriptionDAO($connector);
$derniersInscrits->getLastFive($_SESSION['utilisateur']->idUtilisateur);

echo json_encode($derniersInscrits, JSON_PRETTY_PRINT);
?>