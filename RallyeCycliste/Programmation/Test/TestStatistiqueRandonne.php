<?php
// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
}

// Saut de ligne
function sl() {
	echo "</br>";
}
function afficheTout($stats) {
	echo "- - Toutes les stats - -"; sl();
	foreach ( $stats->getAll () as $statCourante ) {
		//var_dump($statCourante);
		echo "Stat de l'année : $statCourante['annee']";
		sl ();
	}
}


$stats = new StatistiqueRandonneeDAO( MaBD::getInstance () );
afficheTout ( $stats );

$maStat=new StatistiqueRandonnee(2013);


$stats->insert($maStat);

echo "- - Insertion - -"; sl();
afficheTout ( $stats );
