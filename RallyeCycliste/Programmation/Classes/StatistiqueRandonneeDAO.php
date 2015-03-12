<?php
// Classe pour l'accès à la table UTILISATEUR
// Exemple disponible dans nos TPs
class StatistiqueRandonneeDAO extends DAO {
	
	// Récupération d'un utilisateur dont on donne le numéro
	public function getOne($annee) {
		$stmt = $this->pdo->prepare ( "SELECT * FROM RANDONNEE WHERE annee=?" );
		$stmt->execute ( array (
				$annee 
		) );
		$row = $stmt->fetch ( PDO::FETCH_ASSOC );
		return new StatistiqueRandonnee ( $row );
	}
	
	// Récupération de toutes les utilisateurs de la table
	public function getAll() {
		$res = array ();
		$stmt = $this->pdo->query ( "SELECT * FROM RANDONNEE ORDER BY annee" );
		foreach ( $stmt->fetchAll ( PDO::FETCH_ASSOC ) as $row )
			$res [] = new StatistiqueRandonnee ( $row );
		return $res;
	}
	
	// Ajout d'un utilisateur dans la base
	public function insert($obj) {
		$stmt = $this->pdo->prepare ( "INSERT INTO RANDONNEE (annee, randoSerialise) VALUES (:annee, :randoSerialise)" );
		// $res = $stmt->execute($obj->getFields()); TODO Tester si cela focntionne
		$res = $stmt->execute ( array (
				':annee' => $obj->getFields ()['annee'],
				':randoSerialise' => $obj->getFields ()['randoSerialise'] 
		) );
		return $res;
	}
	
	// Mise à jour de l'objet dans la base
	public function update($obj) {
	    $stmt = $this->pdo->prepare("UPDATE UTILISATEUR SET randoSerialise=:randoSerialise WHERE annee=:annee");
	    //$res = $stmt->execute($obj->getFields());
	    $res = $stmt->execute(array(':annee' => $obj->getFields()['annee'],':randoSerialise' => $obj->getFields()['randoSerialise']));
	    return $res;
	}
	
	// Effacement d'un utilisateur
	public function delete($obj) {
		$stmt = $this->pdo->prepare("DELETE FROM RANDONNEE WHERE annee=?");
		$res = $stmt->execute(array($obj->annee));
		return $res;
	}
	
	public function deleteAll()
	{
		$stmt = $this->pdo->prepare("DELETE FROM RANDONNEE");
		$res = $stmt->execute();
		return $res;
	}
}
?>
