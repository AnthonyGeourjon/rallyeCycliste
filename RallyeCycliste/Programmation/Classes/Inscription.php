<?php
class Inscription extends TableObject {

    // Ajout d'une ligne de commande dans le champ 'lignes' de la commande
    public function addLigne(LigneCommande $l) {
        // TODO : À COMPLÉTER
    }

    // Redéfinition de __tostring pour affichage simplifié d'une inscription
    public function __tostring() {
         // TODO : À COMPLÉTER
    }


    // Affichage en HTML dans un H2 (avec nom du fournisseur, et date au format JJ/MM/AAAA)
    public function toHTML() {
    	// TODO : À COMPLÉTER
    }
}
?>
