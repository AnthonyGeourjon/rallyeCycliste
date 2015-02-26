<?php

session_start ();

require_once "VerifConnexion.php";

// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
    
}

verifPage ();

//connexion à la BD
$connector = MaBD::getInstance();
$mesParcoursDAO = new ParcoursDAO($connector);

//fonction pour afficher les parcours disponibles dans une liste déroulante, bug...
function parcoursToForm(){
    global $mesParcoursDAO;
    
    $listeParcours = $mesParcoursDAO->getAll();
    foreach($listeParcours as $parcours){
        $parcours->toSelectDistance();
    }

}
echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
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
		
			</fieldset>
        </p>
        </section>
        
        <section style="margin-top: 50px;">
        	<h3>Nouvel Inscrit</h3>
			
            <fieldset>
				<legend>Saisie d'un inscrit</legend>
					<p>
						<form action="" method="get">
						<input name="Nom" type="text" value="nom" size="20" maxlength="20">
						<input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
						<input name="Age" type="text" value="age" size="3" maxlength="2">
						<select name="Sexe">
							<option>Homme</option>
							<option>Femme</option>
						</select>
						<input name="Club" type="text" value="club" size="20" maxlength="40">
						<select name="type_parcours">
							<?php parcoursToForm(); ?>
						</select>
						<input name="Valider" type="button" value="Valider">
					</p>
			</fieldset>
        </section>
        </div>
            	
    </body>
</html>
  