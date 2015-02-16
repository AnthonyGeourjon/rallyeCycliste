<?php
// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
}

// Saut de ligne
function sl() {
	echo "</br>";
}
function afficheTout($utilisateurs) {
	echo "------- Tous les utilisateurs : ------";
	sl ();
	foreach ( $utilisateurs->getAll () as $utilisateur ) {
		echo "Utilisateur numero : $utilisateur->idUtilisateur, mail : $utilisateur->mail";
		sl ();
	}
}

$utilisateurs = new UtilisateurDAO ( MaBD::getInstance () );
afficheTout ( $utilisateurs );

echo "------- Nouvel utilisateur : ------- ";
sl ();
$nouveau = new Utilisateur ( array (
		'idUtilisateur' => DAO::UNKNOWN_ID,
		'mail' => "anthony.geourjon@iut-valence.fr",
		'motDePasse' => "toto" 
) );

echo $nouveau;
sl ();

echo "------- Enregistrement ------";
sl ();
$utilisateurs->insert ( $nouveau );
// echo $utilisateurs->getOne(MaBD::getInstance()->lastInsertId() );
echo "Utilisateur enregistre.";

sl ();

echo "------- Modification de l'utilisateur numéro : ", MaBD::getInstance ()->lastInsertId (), " ----";

sl ();

$nouveauModifie = $utilisateurs->getOne ( MaBD::getInstance ()->lastInsertId () );
$nouveauModifie->mail = "anthony.geourjon@hotmail.fr";

var_dump ( $nouveauModifie );

$utilisateurs->update ( $nouveauModifie );

echo $nouveauModifie;

afficheTout ( $utilisateurs );

echo "------- Effacement de $nouveauModifie->idUtilisateur \n";
echo "</br>";
$utilisateurs->delete ( $nouveauModifie );

afficheTout ( $utilisateurs );
?>
