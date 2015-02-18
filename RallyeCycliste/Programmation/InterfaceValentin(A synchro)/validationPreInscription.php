<!DOCTYPE html>
<html>
	<head>
		
        <?php
        	require_once("head.php");
		?>
		<title>Validation des préinscriptions</title>

	</head>

	<body>
		
    <div id="corps">

		<?php
        	require_once("enTete.php");
		?>
		<section>
            <h1>Valider les préinscriptions</h1>
            	
                <p>
                <form action="" method="get">
                	<label>Numéro de préinscription</label>
            		<input name="Numero" type="text" value="000000" size="10" maxlength="10">
                </form>
                </p>
                	
                
                <p>
                <form action="" method="get">
            		<input name="Nom" type="text" value="nom" size="20" maxlength="20">
                    <input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
                    <input name="Age" type="text" value="age" size="3" maxlength="2">
                    <input name="Sexe" type="text" value="sexe" size="5" maxlength="5">
                    <input name="Club" type="text" value="club" size="10" maxlength="40">
                    <input name="type_parcours" type="text" value="route" size="5" maxlength="5">
                    <input name="Distance" type="text" value="dst" size="3" maxlength="3">
                    <input name="Valider" type="button" value="Valider">
                    <input name="Supprimer" type="button" value="Supprimer">
                    <input name="Modifier" type="button" value="Modifier">   
	        	</form>
        		</p>
                
                <p>
                <form action="" method="get">
            		<input name="Nom" type="text" value="nom" size="20" maxlength="20">
                    <input name="Prenom" type="text" value="prénom" size="20" maxlength="40">
                    <input name="Age" type="text" value="age" size="3" maxlength="2">
                    <input name="Sexe" type="text" value="sexe" size="5" maxlength="5">
                    <input name="Club" type="text" value="club" size="10" maxlength="40">
                    <input name="type_parcours" type="text" value="route" size="5" maxlength="5">
                    <input name="Distance" type="text" value="dst" size="3" maxlength="3">
                    <input name="Valider" type="button" value="Valider">
                    <input name="Supprimer" type="button" value="Supprimer">
                    <input name="Modifier" type="button" value="Modifier">
	        	</form>
        		</p>
                
                
        
        </section>
        
        
        </div>
            	
    </body>
</html>
  