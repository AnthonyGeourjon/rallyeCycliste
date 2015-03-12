<?php

session_start ();

require_once "VerifConnexion.php";

// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
}
    
verifPage ();
echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";


// TODO Retirer le superflu. Il n'y a besoin que de la distance, du type ("ROUTE" ou "VTT"), des boutons "modifier" et "supprimer et le necessaire pour créer un parcours
// TODO Rajouter des boutons qui permettraient de vider la base, c'est a dire supprimer toutes les insriptions et un autres tout les utilisateurs (a part bénevole et admin)
?>
 

<!DOCTYPE html>
<html>
	<head>
		
        <?php
        	require_once("head.php");
		?>
		<title>Exploitation</title>

	</head>

	<body>
		
    <div id="corps">

		<?php
        	require_once("enTete.php");
		?>
		<section>
            <h1>Liste des parcours</h1>
                
                <p>
                <form action="" method="get">
                	<input name="Nom" type="text" value="nom" size="10" maxlength="15">
                    <input name="Date" type="text" value="date" size="8" maxlength="8">
                    <input name="Distance" type="text" value="distance" size="3" maxlength="3">
                    <input name="exploiter" type="button" value="Exploiter">
                    <input name="modifier" type="button" value="Modifier">
                	<input name="supprimer" type="button" value="Supprimer">
                	<input name="cloturer" type="button" value="Cloturer">
                </form>
                </p>
                
                <p>
                <form action="" method="get">
                	<input name="Nom" type="text" value="nom" size="10" maxlength="15">
                    <input name="Date" type="text" value="date" size="8" maxlength="8">
                    <input name="Distance" type="text" value="distance" size="3" maxlength="3">
                    <input name="exploiter" type="button" value="Exploiter">
                    <input name="modifier" type="button" value="Modifier">
                	<input name="supprimer" type="button" value="Supprimer">
                	<input name="cloturer" type="button" value="Cloturer">
                </form>
                </p>
                
                <p>
               <form action="" method="get">
                	<input name="Nom" type="text" value="nom" size="10" maxlength="15">
                    <input name="Date" type="text" value="date" size="8" maxlength="8">
                    <input name="Distance" type="text" value="distance" size="3" maxlength="3">
                    <input name="exploiter" type="button" value="Exploiter">
                    <input name="modifier" type="button" value="Modifier">
                	<input name="supprimer" type="button" value="Supprimer">
                	<input name="cloturer" type="button" value="Cloturer">
                </form>
                </p>
        
        </section>
        
        <section>
        	<h3>Ajouter un parcours</h3>
            	<form action="" method="get">
            		<input name="Nom" type="text" value="nom" size="10" maxlength="15">
                    <input name="Date" type="text" value="date" size="8" maxlength="8">
                    <input name="Distance" type="text" value="distance" size="3" maxlength="3">
                    <input name="valider" type="button" value="Valider">
				</form>
        </section>
        
        
        </div>
            	
    </body>
</html>
  