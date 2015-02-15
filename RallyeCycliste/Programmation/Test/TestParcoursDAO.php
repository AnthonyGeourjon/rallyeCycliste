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

function afficheTout ($parcours)
{
    echo "------- Tous les parcours: ------";
    sl();
    foreach ($parcours->getAll() as $parcoursCourant) {
        echo "Parcours numero : $parcoursCourant->idParcours, distance : $parcoursCourant->distance, type : $parcoursCourant->type"; 
        sl();
    }
}

$parcours = new ParcoursDAO(MaBD::getInstance());
afficheTout($parcours);

echo "------- Nouveau parcours : ------- ";
sl();
$nouveau = new Parcours(array('idParcours' => DAO::UNKNOWN_ID, 'distance' => 40, 'type' => "V"));

echo "Nouveau : $nouveau";

sl();

echo "------- Enregistrement ------";
sl();
$parcours->insert($nouveau);
//echo $parcours->getOne(MaBD::getInstance()->lastInsertId() );
echo "Parcours enregistre.";

sl();

echo "------- Modification du parcours numero : ", MaBD::getInstance()->lastInsertId(), " ----";

sl();

$nouveauModifie=$parcours->getOne(MaBD::getInstance()->lastInsertId());
$nouveauModifie->distance=50;

$parcours->update($nouveauModifie);

echo $nouveauModifie;

afficheTout($parcours);

echo "------- Effacement de $nouveauModifie->idParcours \n";
echo "</br>";
$parcours->delete($nouveauModifie);

afficheTout($parcours);
?>
