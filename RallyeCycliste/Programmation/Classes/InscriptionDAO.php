<?php
// Classe pour l'accès à la table INSCRIPTION
// Exemple disponible dans nos TPs
class InscriptionDAO extends DAO {
	
	// Récupération d'une commande dont on donne le numéro
	public function getOne($num) {
		$stmt = $this->pdo->prepare ( "SELECT * FROM INSCRIPTION WHERE idInscription=?" );
		$stmt->execute ( array (
				$num 
		) );
		$row = $stmt->fetch ( PDO::FETCH_ASSOC );
		return new Inscription ( $row );
	}
	
	// Récupération de toutes les inscriptions de la table
	public function getAll() {
		$res = array ();
		$stmt = $this->pdo->query ( "SELECT * FROM INSCRIPTION ORDER BY idInscription" );
		foreach ( $stmt->fetchAll ( PDO::FETCH_ASSOC ) as $row )
			$res [] = new Inscription( $row );
		return $res;
	}
	
	// Ajout d'une inscription dans la base
	public function insert($obj) {
		$stmt = $this->pdo->prepare ( "INSERT INTO INSCRIPTION (nomRandonneur, prenomRandonneur, sexe, dateNaissance, age, federation, clubOuVille, departement, posteDInscription, idParcours, idInscriveur) VALUES (:nomRandonneur, :prenomRandonneur, :sexe, :dateNaissance, :age, :federation, :clubOuVille, :departement, :posteDInscription, :idParcours, :idInscriveur)
				" );
		// $res = $stmt->execute($obj->getFields()); TODO Tester si cela focntionne
		$res = $stmt->execute ( array (
				':nomRandonneur' => $obj->getFields ()['nomRandonneur'],
				':prenomRandonneur' => $obj->getFields ()['prenomRandonneur'],
				':sexe' => $obj->getFields ()['sexe'],
				':dateNaissance' => $obj->getFields ()['dateNaissance'],
				':age' => $age, /* TODO A calculer */
				':federation' => $obj->getFields ()['federation'],
				':clubOuVille' => $obj->getFields ()['clubOuVille'],
				':departement' => $obj->getFields ()['departement'],
				':posteDInscription' => $obj->getFields ()['posteDInscription'],
				':idParcours' => $obj->getFields ()['idParcours'],
				':idInscriveur' => $obj->getFields ()['idInscriveur']
		) );
		return $res;		
	}
	
	// Mise à jour de l'objet dans la base
	public function update($obj) {
		$this->delete($obj);
		$this->insert($obj);
	}
	
	// Effacement d'une commande : effacer d'abord les lignes de commande, puis la commande elle-mÃªme
	public function delete($obj) {
		$stmt = $this->pdo->prepare("DELETE FROM INSCRIPTION WHERE idInscription=?");
		$res = $stmt->execute(array($obj->idInscription));
		return $res;
	}
	
	// TODO Regarder comment faire une requête quand on a pas de paramètre
	public function deleteAll() {
		$stmt = $this->pdo->prepare("DELETE FROM INSCRIPTION");
		$res = $stmt->execute();
		return $res;
	}
}
?>
