<?php
// Autochargement des classes
function __autoload ($class)
{
    require_once "../Classes/$class.php";
}

// Saut de ligne
function sl ()
{
    echo "</br>";
}

function afficheTout ($utilisateurs)
{
    echo "------- Tous les utilisateurs : ------";
    sl();
    foreach ($utilisateurs->getAll() as $utilisateur) {
        echo $utilisateur;
        sl();
    }
}

$utilisateurs = new UtilisateurDAO(MaBD::getInstance());
afficheTout($utilisateurs);

echo "------- Nouvel utilisateur : ------- ";
sl();
$nouveau = new Utilisateur(array('idUtilisateur' => DAO::UNKNOWN_ID, 'mail' => "anthony.geourjon@iut-valence.fr", 'motDePasse' => "toto"));


echo  $nouveau;
sl();

echo "------- Enregistrement ------";
sl();
$commandes->insert($nouveau);

echo $utilisateurs->getOne(MaBD::getInstance()->lastInsertId() );

sl();

echo "------- Modification de l'utilisateur numéo : ", MaBD::getInstance()->lastInsertId(), " ----";

sl();

$nouveauModifie=$utilisateurs->getOne(MaBD::getInstance()->lastInsertId());
$nouveauModifie->mail="anthony.geourjon@hotmail.fr";

$commandes->update($nouveauModifie);

echo $nouveauModifie;

echo "------- Effacement de $nouveauModifie->idUtilisateur \n";
echo "</br>";
$commandes->delete($nouveauModifie);

afficheTout($commandes);
?>
