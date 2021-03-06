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
	
	// TODO Presque fonctionnelle, voir pour l'affichage
	//Cette fonction doit permettre de récupérer les 5 derniers inscrits depuis le même utilisateur
	public function getLastFive($idSession) {
		$res = array();
		$stmt = $this->pdo->prepare ( "SELECT * FROM INSCRIPTION WHERE idUtilisateur=? ORDER BY idInscription DESC LIMIT 5 " );
		if ($stmt->execute(array($idSession))){
			while ($row = $stmt->fetch()){
				$res[] = new Inscription($row);
			}
		}
		return  $res;
	}
	
	// Récupération de toutes les inscriptions de la table
	public function getAll() {
		$res = array ();
		$stmt = $this->pdo->query ( "SELECT * FROM INSCRIPTION ORDER BY idInscription" );
		foreach ( $stmt->fetchAll ( PDO::FETCH_ASSOC ) as $row )
			$res [] = new Inscription ( $row );
		return $res;
	}
	
	// Ajout d'une inscription dans la base
	public function insert($obj) {
		$stmt = $this->pdo->prepare ( "INSERT INTO INSCRIPTION (nomRandonneur, prenomRandonneur, sexe, dateNaissance, age, federation, clubOuVille, departement, posteDInscription, idParcours, idUtilisateur, estArrive) VALUES (:nomRandonneur, :prenomRandonneur, :sexe, :dateNaissance, :age, :federation, :clubOuVille, :departement, :posteDInscription, :idParcours, :idUtilisateur, 'true')
				" );
		// $res = $stmt->execute($obj->getFields()); TODO Tester si cela focntionne
		$res = $stmt->execute ( array (
				':nomRandonneur' => $obj->getFields ()['nomRandonneur'],
				':prenomRandonneur' => $obj->getFields ()['prenomRandonneur'],
				':sexe' => $obj->getFields ()['sexe'],
				':dateNaissance' => $obj->getFields ()['dateNaissance'],
				':age' => $this->age ( $obj->getFields ()['dateNaissance'] ), /* TODO A calculer */
				':federation' => $obj->getFields ()['federation'],
				':clubOuVille' => $obj->getFields ()['clubOuVille'],
				':departement' => $obj->getFields ()['departement'],
				':posteDInscription' => $obj->getFields ()['posteDInscription'],
				':idParcours' => $obj->getFields ()['idParcours'],
				':idUtilisateur' => $obj->getFields ()['idUtilisateur'] 
		) );
		return $res;
	}
	
	// Mise à jour de l'objet dans la base
	public function update($obj) {
		$this->delete ( $obj );
		$this->insert ( $obj );
	}
	
	// Effacement d'une commande : effacer d'abord les lignes de commande, puis la commande elle-mÃªme
	public function delete($obj) {
		$stmt = $this->pdo->prepare ( "DELETE FROM INSCRIPTION WHERE idInscription=?" );
		$res = $stmt->execute ( array (
				$obj->idInscription 
		) );
		return $res;
	}
	
	// TODO Regarder comment faire une requête quand on a pas de paramètre
	public function deleteAll() {
		$stmt = $this->pdo->prepare ( "DELETE FROM INSCRIPTION" );
		$res = $stmt->execute ();
		return $res;
	}
	
	// Fonction triviale pour l'age, le problème des années bisextile n'est pas traité mais on n'a pas besoin de cette précision
	public function age($date) {
		return ( int ) ((time () - strtotime ( $date )) / 3600 / 24 / 365);
	}
	
	public function estArrive ( $num )
	{
		$stmt = $this->pdo->prepare ( "UPDATE INSCRIPTION SET estArrive='true' WHERE idInscription=?" );
		$res = $stmt->execute ( array (
				$obj->idInscription
		) );
		return $res;
	}
}
?>
