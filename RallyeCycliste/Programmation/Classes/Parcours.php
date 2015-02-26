<?php
class Parcours extends TableObject {

    // Redéfinition pour affichage simplifié 
    public function __tostring() {
         return "$this->idParcours, distance $this->distance, type $this->type";
    }

    public function toHTML() {
    	// TODO : À COMPLÉTER
    }
    
    
    public function toSelectDistance(){
    	echo '<option value="', $this->idParcours,'">', $this->distance,'</option>';
    }
    
}
?>
