<?php
// Classe pour l'accès à la table PARCOURS
// Exemple disponible dans nos TPs
class ParcoursDAO extends DAO {
	
	// Récupération du parcours $num
	public function getOne($num) {
		$stmt = $this->pdo->prepare ( "SELECT * FROM PARCOURS WHERE idParcours=?" );
		$stmt->execute ( array (
				$num 
		) );
		$row = $stmt->fetch ( PDO::FETCH_ASSOC );
		return new Parcours ( $row );
	}
	
	// Récupération des parcours de la table
	public function getAll() {
		$res = array ();
		$stmt = $this->pdo->query ( "SELECT * FROM PARCOURS ORDER BY idParcours" );
		foreach ( $stmt->fetchAll ( PDO::FETCH_ASSOC ) as $row )
			$res [] = new Parcours ( $row );
		return $res;
	}
	
	// Ajout d'un pacours dans la base
	public function insert($obj) {
		$stmt = $this->pdo->prepare ( "INSERT INTO PARCOURS (distance, type) VALUES (:distance, :type" );
		// $res = $stmt->execute($obj->getFields()); TODO Tester si cela focntionne
		$res = $stmt->execute ( array (
				':distance' => $obj->getFields ()['distance'],
				':type' => $obj->getFields ()['type'] 
		)
		 );
		return $res;
	}
	
	// Mise à jour de l'objet dans la base
	public function update($obj) {
		throw new Exception("Update non défini, remplacé par delete/insert");
	}
	
	// Effacement d'un parcours
	public function delete($obj) {
		$stmt = $this->pdo->prepare("DELETE FROM PARCOURS WHERE idParcours=?");
		$res = $stmt->execute(array($obj->idParcours));
		return $res;
	}
	
	// Effacement de l'intégralité des parcours
	public function deleteAll() {
		$stmt = $this->pdo->prepare("DELETE FROM PARCOURS");
		$res = $stmt->execute();
		return $res;
	}
}
?>
