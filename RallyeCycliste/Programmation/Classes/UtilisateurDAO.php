<?php
// Classe pour l'accès à la table UTILISATEUR
// Exemple disponible dans nos TPs
class UtilisateurDAO extends DAO {
	
	// Récupération d'un utilisateur dont on donne le numéro
	public function getOne($num) {
		$stmt = $this->pdo->prepare ( "SELECT * FROM UTILISATEUR WHERE idUtilisateur=?" );
		$stmt->execute ( array (
				$num 
		) );
		$row = $stmt->fetch ( PDO::FETCH_ASSOC );
		return new Utilisateur ( $row );
	}
	
	// Récupération de toutes les utilisateurs de la table
	public function getAll() {
		$res = array ();
		$stmt = $this->pdo->query ( "SELECT * FROM UTILISATEUR ORDER BY idUtilisateur" );
		foreach ( $stmt->fetchAll ( PDO::FETCH_ASSOC ) as $row )
			$res [] = new Parcours ( $row );
		return $res;
	}
	
	// Ajout d'un utilisateur dans la base
	public function insert($obj) {
		$stmt = $this->pdo->prepare ( "INSERT INTO UTILISATEUR (mail, motDePasse) VALUES (:mail, :motDePasse" );
		// $res = $stmt->execute($obj->getFields()); TODO Tester si cela focntionne
		$res = $stmt->execute ( array (
				':mail' => $obj->getFields ()['mail'],
				':motDePasse' => $obj->getFields ()['motDePasse'] 
		) );
		return $res;
	}
	
	// Mise à jour de l'objet dans la base
	public function update($obj) {
		throw new Exception ( "Update non défini, remplacé par delete/insert" );
	}
	
	// Effacement d'un utilisateur
	public function delete($obj) {
		$stmt = $this->pdo->prepare("DELETE FROM UTILISATEUR WHERE idUtilisateur=?");
		$res = $stmt->execute(array($obj->idParcours));
		return $res;
	}
	
	public function deleteAll()
	{
		$stmt = $this->pdo->prepare("DELETE FROM UTILISATEUR");
		$res = $stmt->execute();
		return $res;
	}
}
?>
