<?php
// Classe pour l'accÃ¨s Ã  la table commande
// Une commande prÃ©sente peu d'intÃ©rÃªt sans la liste des lignes associÃ©es, on charge donc les lignes de commandes
// dans un champ supplÃ©mentaire 'lignes'
class CommandesDAO extends DAO {
	
	// RÃ©cupÃ©ration d'une commande dont on donne le numÃ©ro
	// On ajoute un champs 'lignes' contenant les lignes de commandes (tableau d'objets LigneCommande)
	public function getOne($num) {
		$stmt = $this->pdo->prepare ( "SELECT * FROM commande WHERE numero_cde=?" );
		$stmt->execute ( array (
				$num 
		) );
		$row = $stmt->fetch ( PDO::FETCH_ASSOC );
		return new Commande ( $row );
	}
	
	// RÃ©cupÃ©ration de toutes les commandes de la table
	// On ajoute un champs 'lignes' contenant les lignes de commandes (tableau d'objets LigneCommande)
	public function getAll() {
		$res = array ();
		$stmt = $this->pdo->query ( "SELECT * FROM commande ORDER BY numero_cde" );
		foreach ( $stmt->fetchAll ( PDO::FETCH_ASSOC ) as $row )
			$res [] = new Commande ( $row );
		return $res;
	}
	
	// Ajout d'une commande dans la base, utilisation du numÃ©ro auto incrÃ©mentÃ©
	public function insert($obj) {
		$stmt = $this->pdo->prepare ( "INSERT INTO commande (date_cde, code_frs) VALUES (:date_cde, :code_frs)" );
		// $res = $stmt->execute($obj->getFields());
		$res = $stmt->execute ( array (
				':code_frs' => $obj->getFields ()['code_frs'],
				':date_cde' => $obj->getFields ()['date_cde'] 
		) );
		return $res;
	}
	
	// Mise Ã  jour de l'objet dans la base
	public function update($obj) {
		$stmt = $this->pdo->prepare("UPDATE commande SET date_cde=:date_cde  WHERE numero_cde=:numero_cde");
		//$res = $stmt->execute($obj->getFields());
		$res = $stmt->execute(array(':date_cde' => $obj->getFields()['date_cde'], ':numero_cde' => $obj->getFields()['numero_cde']));
		return $res;
	}
	
	// Effacement d'une commande : effacer d'abord les lignes de commande, puis la commande elle-mÃªme
	public function delete($obj) {
		$stmt = $this->pdo->prepare("DELETE FROM commande WHERE numero_cde=?");
		$res = $stmt->execute(array($obj->numero_cde));
		return $res;
	}
}
?>
