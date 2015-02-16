<?php
// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
}

// Saut de ligne
function sl() {
	echo "</br>";
}
function afficheTout($inscriptions) {
	echo "------- Tous les parcours: ------";
	sl ();
	foreach ( $inscriptions->getAll () as $inscriptionCourante ) {
		echo "Inscription numero : $inscriptionCourante->idInscription, parcours : $inscriptionCourante->idParcours, Inscriveur : $inscriptionCourante->idUtilisateur";
		sl ();
	}
}

$inscriptions = new InscriptionDAO ( MaBD::getInstance () );
afficheTout ( $inscriptions );

echo "------- Nouveau parcours : ------- ";
sl ();
$nouveau = new Inscription ( array (
		'idInscription' => DAO::UNKNOWN_ID,
		'nomRandonneur' => "Geourjon",
		'prenomRandonneur' => "Anthony",
		'sexe' => "h",
		'dateNaissance' => '1996-03-11',
		'age' => 15,
		'clubOuVille' => "ZAnnonay",
		'federation' => "NL",
		'departement' => 7,
		'posteDInscription' => 0,
		'idParcours' => 2,
		'idUtilisateur' => 2 
) );

echo "$nouveau";
sl ();

echo "------- Enregistrement ------";
sl ();

$nouveauDeux = $nouveau;
$nouveauDeux->nomRandonneur = "Richard";

var_dump ( $nouveau );
sl ();
var_dump ( $nouveauDeux );
sl ();

echo "Inscription : ";
$inscriptions->insert ( $nouveau );
$inscriptions->insert ( $nouveauDeux );

afficheTout ( $inscriptions );

// echo $parcours->getOne(MaBD::getInstance()->lastInsertId() );
echo "Inscription enregistree.";

sl ();

echo "------- Modification de l'inscription numero : ", MaBD::getInstance ()->lastInsertId (), " ----";

sl ();

$nouveauModifie = $inscriptions->getOne ( MaBD::getInstance ()->lastInsertId () );
$nouveauModifie->clubOuVille = "ZVal";

$inscriptions->update ( $nouveauModifie );

echo $nouveauModifie;

afficheTout ( $inscriptions );

echo "------- Effacement de $nouveauModifie->idParcours \n";
echo "</br>";
$inscriptions->delete ( $nouveauModifie );

afficheTout ( $inscriptions );
?>
