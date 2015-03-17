<?php

function __autoload($class) {require_once "../Classes/$class.php";}

session_start();

$connector = MaBD::getInstance();
$derniersInscrits = new InscriptionDAO($connector);
$derniersInscrits->getLastFive(1);