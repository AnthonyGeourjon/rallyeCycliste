<?php

session_start ();

//TODO Mise en page, fonctionnement (Taf de Val)

require_once "VerifConnexion.php";

// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
    
}

verifPage ();

function afficherMessage()
{
	if (isset($_POST['message']))
	{
		$class = ($_POST['erreur']) ? "erreur" : "message";
		echo '<p class="'.$class.'">'.$_POST['message'].'</p>';
	}
}


//connexion à la BD
$connector = MaBD::getInstance();
$mesParcoursDAO = new ParcoursDAO($connector);
$uneInscriptionDAO = new InscriptionDAO($connector);

//fonction pour afficher les parcours disponibles dans une liste déroulante, bug...
function parcoursToForm(){
    global $mesParcoursDAO;
    
    $listeParcours = $mesParcoursDAO->getAll();
    foreach($listeParcours as $parcours){
        $parcours->toSelectDistance();
    }

}
echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";


if (isset($_POST['valider'])){
	//On vérifie la présence d'un nom et d'un prénom
	/*if (!empty($_POST['nom']) || !empty($_POST['prénom']))
	{
		if (!empty($_POST['age']))
		{
			if (!empty($_POST['club']))
			{
				if (!empty($_POST['type_parcours']))
				{*/	
					$nouvelInscrit = new Inscription(array(
													'nomRandonneur'=> $_POST['nom'], 
													'prenomRandonneur'=> $_POST['prénom'],
													'sexe'=> $_POST['sexe'],
													'dateNaissance' => '1995-08-16',
													'age' => $_POST['age'],
													'clubOuVille' => $_POST['club'],
													'federation'=> 'FFCT',
													'departement' => 'Vaucluse',
													'posteDInscription'=>0,
													'idParcours' => $_POST['type_parcours'],
													'idUtilisateur' => $_SESSION['utilisateur']->idUtilisateur
					));
					$uneInscriptionDAO->insert($nouvelInscrit);
					$_POST['message'] = $nouvelInscrit->nomRandonneur.' '.$nouvelInscrit->prenomRandonneur.' a bien été ajouté !' ;
				}
			/*}
		}
	}
}*/
?>


<!DOCTYPE html>
<html>
	<head>
		
        <?php
        	require_once("head.php");
		?>
		<title>Page d'inscription</title>

	</head>

	<body>
	
	<?php
		require_once("enTete.php");
	?>
		
    <div id="corps">
        
        <section>
        	<h1>Gestion des inscriptions</h1>
		<p>
		<fieldset>
			<legend>5 dernières inscriptions</legend>
				<p>
				<form action="" method="get" action="inscription.php">
					<input name="Nom" type="text" value="nom" size="20" maxlength="20">
					<input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
					<input name="Age" type="text" value="age" size="3" maxlength="2">
					<input name="Sexe" type="text" value="sexe" size="5" maxlength="5">
					<input name="Club" type="text" value="club" size="20" maxlength="40">
					<input name="type_parcours" type="text" value="VTT" size="5" maxlength="5">
					<input name="Distance" type="text" value="dst" size="3" maxlength="3">
					<input name="Supprimer" type="button" value="Supprimer">
					<input name="Copier" type="button" value="Copier">
					<input name="Modifier" type="button" value="Modifier">
				</form>
				</p>
				<p>
				<form action="" method="get">
					<input name="Nom" type="text" value="nom" size="20" maxlength="20">
					<input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
					<input name="Age" type="text" value="age" size="3" maxlength="2">
					<input name="Sexe" type="text" value="sexe" size="5" maxlength="5">
					<input name="Club" type="text" value="club" size="20" maxlength="40">
					<input name="type_parcours" type="text" value="VTT" size="5" maxlength="5">
					<input name="Distance" type="text" value="dst" size="3" maxlength="3">
					<input name="Supprimer" type="button" value="Supprimer">
					<input name="Copier" type="button" value="Copier">
					<input name="Modifier" type="button" value="Modifier">
				</form>
				</p>
				<p>
				<form action="" method="get">
					<input name="Nom" type="text" value="nom" size="20" maxlength="20">
					<input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
					<input name="Age" type="text" value="age" size="3" maxlength="2">
					<input name="Sexe" type="text" value="sexe" size="5" maxlength="5">
					<input name="Club" type="text" value="club" size="20" maxlength="40">
					<input name="type_parcours" type="text" value="route" size="5" maxlength="5">
					<input name="Distance" type="text" value="dst" size="3" maxlength="3">
					<input name="Supprimer" type="button" value="Supprimer">
					<input name="Copier" type="button" value="Copier">
					<input name="Modifier" type="button" value="Modifier">
				</form>
				</p>
				<p>
				<form action="" method="get">
					<input name="Nom" type="text" value="nom" size="20" maxlength="20">
					<input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
					<input name="Age" type="text" value="age" size="3" maxlength="2">
					<input name="Sexe" type="text" value="sexe" size="5" maxlength="5">
					<input name="Club" type="text" value="club" size="20" maxlength="40">
					<input name="type_parcours" type="text" value="VTT" size="5" maxlength="5">
					<input name="Distance" type="text" value="dst" size="3" maxlength="3">
					<input name="Supprimer" type="button" value="Supprimer">
					<input name="Copier" type="button" value="Copier">
					<input name="Modifier" type="button" value="Modifier">
				</form>
				</p>
				<p>
				<form action="" method="get">
					<input name="Nom" type="text" value="nom" size="20" maxlength="20">
					<input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
					<input name="Age" type="text" value="age" size="3" maxlength="2">
					<input name="Sexe" type="text" value="sexe" size="5" maxlength="5">
					<input name="Club" type="text" value="club" size="20" maxlength="40">
					<input name="type_parcours" type="text" value="route" size="5" maxlength="5">
					<input name="Distance" type="text" value="dst" size="3" maxlength="3">
					<input name="Supprimer" type="button" value="Supprimer">
					<input name="Copier" type="button" value="Copier">
					<input name="Modifier" type="button" value="Modifier">
				</form>
				</p>
		
			</fieldset>
        </p>
        </section>
        
        <section style="margin-top: 50px;">
        	<h3>Nouvel Inscrit</h3>
			
            <fieldset>
				<legend>Saisie d'un inscrit</legend>
					<p>
						<form action="Inscription.php" method="post">
						<input name="nom" type="text" value="nom" size="20" maxlength="20">
						<input name="prénom" type="text" value="prénom" size="20" maxlength="40">
						<input name="age" type="text" value="age" size="3" maxlength="2">
						<select name="sexe">
							<option>Homme</option>
							<option>Femme</option>
						</select>
						<input name="club" type="text" value="club" size="20" maxlength="40">
						<select name="type_parcours">
							<?php parcoursToForm(); ?>
						</select>
						<input name="valider" type="submit" value="valider"/>
						</form>
					</p>
			</fieldset>
			<p>
				<?php afficherMessage();?>
			</p>
        </section>
        </div>
            	
    </body>
</html>
  