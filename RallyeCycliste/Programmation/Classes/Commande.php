<?php
class Commande extends TableObject {

    // Ajout d'une ligne de commande dans le champ 'lignes' de la commande
    public function addLigne(LigneCommande $l) {
        // TODO : À COMPLÉTER
    }

    // Redéfinition de __tostring pour ne pas afficher les lignes de la commande
    public function __tostring() {
        return "Commande $this->numero_cde du $this->date_cde chez $this->code_frs";
    }

    // Affichage de la commande avec toutes les lignes de commande
    public function display() {
        echo $this;
        // Affichage simple des lignes de commande
        // TODO : À COMPLÉTER
        echo "\n";
    }

    // Calcul du prix total de la commande.
    public function prixTotal() {
        $bd = MaBD::getInstance ();
		
		$lesLignes = new LigneCommandeDAO ( $bd );
		$lignesDeLaCommande=$lesLignes->getAllCommande($this->numero_cde);
		
		$prixTotal=0;
		
		foreach ($lignesDeLaCommande as $ligneCourante)
		{
			$prixTotal+=$ligneCourante->quantite*$ligneCourante->pu_cde;
		}
		
        return $prixTotal;
    }

    // Affichage en HTML dans un H2 (avec nom du fournisseur, et date au format JJ/MM/AAAA)
    public function toHTML() {
        $bd = MaBD::getInstance ();
    	$lesFournisseurs = new FournisseursDAO( $bd );
    	
    	$fournisseur=$lesFournisseurs->getOne($this->code_frs);
    	
    	echo "<h2>" . $this->numero_cde . " du " . date("m.d.y") . " à " . $fournisseur->nom ;
    }
}
?>
