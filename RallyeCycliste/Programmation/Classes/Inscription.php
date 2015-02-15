<?php
class Inscription extends TableObject {
	
	// Affichage simplifié d'une inscription pour debug
	public function __tostring() {
		return "Inscription numero : $this->idInscription, parcours : $this->idParcours, Inscriveur : $this->idUtilisateur";
	}
	public function toHTML() {
		// TODO : À COMPLÉTER
	}
}
?>
