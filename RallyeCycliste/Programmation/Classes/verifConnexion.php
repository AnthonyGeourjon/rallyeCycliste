<?php

/*
 * Classe effectuant les vérifications nécessaire.
 */
$bd = MaBD::getInstance ();

$utilisateurs = new UtilisateurDAO ( $bd );

// Vérification login/mdp
function verifConnexion() {
	global $utilisateurs;
	if (isset ( $_POST ["login"] ) && (isset ( $_POST ["motDePasse"] ))) {
		try {
			$utilisateurCourant = $utilisateurs->getOne ( $_POST ['login'] );
			
			// Soulève l'exception si l'utilisateur n'existe pas
			if (isset ( $utilisateurCourant ) && $_POST ['motDePasse'] == $utilisateurCourant->motDePasse) {
				$_SESSION ['utilisateur'] = $utilisateurCourant;
				
				// La connexion est ok
				header ( "Location: pageADefinir.php" );
				echo "Connexion Ok";
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