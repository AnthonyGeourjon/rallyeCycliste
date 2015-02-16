<?php

/*
 * Classe effectuant les vérifications nécessaire.
 */
$bd = MaBD::getInstance ();

$utilisateurs = new UtilisateurDAO ( $bd );
$resultatConnexion = "Echec";

// Vérification login/mdp
function verifConnexion() {
	global $utilisateurs, $resultatConnexion;;
	if (isset ( $_POST ["mail"] ) && (isset ( $_POST ["motDePasse"] ))) {
		try {
			$utilisateurCourant = $utilisateurs->getOneByMail( $_POST ['mail'] );
			
		
			
			// Soulève l'exception si l'utilisateur n'existe pas
			if (isset ( $utilisateurCourant ) && $_POST ['motDePasse'] == $utilisateurCourant->motDePasse) {
				$_SESSION ['utilisateur'] = $utilisateurCourant;
				
				$resultatConnexion="Succès";
				
				//header ( "Location: pageADefinir.php" ); TODO
				
			} 

			else {
				echo "Nom d'utilisateur ou mot de passe eronné "; // Déplacer ce code -> vue / controleur
			}
		} catch ( Exception $e ) {
			echo "Utilisateur inconnu "; // Changer message pour la sécurité (on sait que l'utilisateur n'est pas dans ce cas
		}
	}
}

?>