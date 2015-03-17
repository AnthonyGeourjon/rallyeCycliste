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
	if (!empty($_POST['nom']) || !empty($_POST['prénom']))
	{
		if (!empty($_POST['club']))
		{
			if (!empty($_POST['type_parcours']))
			{
				$ageInscrit = $uneInscriptionDAO->age($_POST['dateNaissance']);
				$nouvelInscrit = new Inscription(array(
												'nomRandonneur'=> $_POST['nom'], 
												'prenomRandonneur'=> $_POST['prénom'],
												'sexe'=> $_POST['sexe'],
												'dateNaissance' => $_POST['dateNaissance'],
												'age' => $ageInscrit,
												'clubOuVille' => $_POST['club'],
												'federation'=> $_POST['federation'],
												'departement' => $_POST['departement'],
												'posteDInscription'=>0,
												'idParcours' => $_POST['type_parcours'],
												'idUtilisateur' => $_SESSION['utilisateur']->idUtilisateur
				));
				$uneInscriptionDAO->insert($nouvelInscrit);
				$_POST['message'] = $nouvelInscrit->nomRandonneur.' '.$nouvelInscrit->prenomRandonneur.' a bien été ajouté !' ;
			}
		}
	}
}
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
				
			</fieldset>
        </p>
        </section>
        
        <section style="margin-top: 50px;">
        	<h3>Nouvel Inscrit</h3>
			
            <fieldset>
				<legend>Saisie d'un inscrit</legend>
					<p>
						<form action="Inscription.php" method="post">
						<input name="nom" type="text" size="20" maxlength="20" placeholder="nom" autofocus>
						<input name="prénom" type="text" size="20" maxlength="40" placeholder="prénom">
						<select name="sexe">
							<option value="H">Homme</option>
							<option value="F">Femme</option>
						</select>
						<input name="dateNaissance" type="date" value="dateNaissance">
						<input name="club" type="text" size="20" maxlength="40" placeholder="Club ou ville">
						<select name="federation">
							<option value="FFC">FFC</option>
							<option value="FFCT">FFCT</option>
							<option value="UFOLEP">Ufolep</option>
							<option value="FSGT">FSGT</option>
							<option Value="NL">Non licencié</option>
						</select>
						<input name="departement" type="text" size="20" maxlength="20" placeholder="département">
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
  