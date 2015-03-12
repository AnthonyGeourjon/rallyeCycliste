<?php
class StatistiqueRandonnee 
{	
	private $nombreParticipantsTotal;
	private $nombreParticipantesTotal;
	private $nombreNonLicencieTotal;
	private $nombreMoinsDeDixHuitAnsTotal;
	private $nombresFFCTTotal;
	private $nombresUFOLEPTotal;
	private $nombresFSGTTotal;
	private $nombresFFCTotal;
	
	private $nombreParticipantsVTT;
	private $nombresNonLicencieVTT;
	private $nombresFeminineVTT;
	private $nombresNonLicencieDeSaintPerayVTT;
	private $nombresLicencieDeSaintPerayVTT;
	private $clubLePlusNombreuxVTT;
	private $repartitionSurLesParcoursVTT;
	private $clubLePlusNombreuxDArdecheVTT;
	private $clubLePlusNombreuxDeDromeVTT;
	private $clubOuIlYALePlusDeFeminineVTT;
	private $plusJeuneGarconVTTiste;
	private $plusJeuneFilleVTTiste;
	
	private $nombreParticipantsRoute;
	private $nombresNonLicencieRoute;
	private $nombresFeminineRoute;
	private $nombresNonLicencieDeSaintPerayRoute;
	private $nombresLicencieDeSaintPerayRoute;
	private $clubLePlusNombreuxRoute;
	private $repartitionSurLesParcoursRoute;
	private $clubLePlusNombreuxDArdecheRoute;
	private $clubLePlusNombreuxDeDromeRoute;
	private $clubOuIlYALePlusDeFeminineRoute;
	private $plusJeuneGarconRoutier;
	private $plusJeuneFilleRoutiere;
	
	private $annee;
	private $objetSerialise;
	
	public function __construct($annee) {
		//TODO Remplir toutes les variables avec les requetes appropriées 
		$bd = MaBD::getInstance ();
		$stats = new StatistiqueRandonneeDAO($bd);
		
		$this->annee=$annee;
		$this->objetSerialise=serialize($this);
		
		
		
		
	}
	
	public function getAnnee()
	{
	    return $this->annee;
	}
	
	public function getObjetSerialise()
	{
		return $this->objetSerialise;
	}
	
	
	// Redéfinition de __tostring pour affichage simplifié
	public function __tostring() {
		return " $this->annee </br>";
	}
	public function toHTML() {
		// TODO : À COMPLÉTER
	}
}
?>
