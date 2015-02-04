<?php
class Utilisateur extends TableObject {

    // Redéfinition de __tostring pour affichage simplifié 
    public function __tostring() {
         return $this->idUtilisateur . " " . $this->mail . "</br>";
    }

    public function toHTML() {
    	// TODO : À COMPLÉTER
    }
}
?>
