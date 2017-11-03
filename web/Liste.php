<?php
spl_autoload_register(function ($class) {require $class . '.php';});
class Liste {
	private $ds;
	public $type;	// type d'affichage: Table / Liste à puce / liste ordonnée | T U O

	public function __construct($DS, $type) {
		$this->ds = $DS;
		$this->type = $type;
	}
	
	public function __toString() {
		switch ($this->type) {
		 	case 'T':
				$s = "<table border=1>";
				$s.= (new Entity($this->ds, $this->type))->tabhead($this->ds);
		 		$f = "</table>";
		 		break;
		 	case 'U':
		 		$s = "<ul>";
		 		$f = "</ul>";
		 		break;
		 	case 'O':
		 		$s = "<ol>";
		 		$f = "</ol>";
		 		break;		 	
		 	default:
		 		$s = "Erreur de balise html conteneur classe: " . __CLASS__ . 
		 			 " / methode: " . __METHOD__ . " / ligne: " . __LINE__ ;
		 		$f = "<br/>";
		 		break;
		}		

		$ent = $this->ds->fetchObject('Entity', array($this->ds, $this->type) );
		do {
			$ent->tabhead($this->ds);
			$ent->type = $this->type;
			$s .= $ent; }
		while ($ent = $this->ds->fetchObject('Entity', array($this->ds, $this->type)));

		$s .= $f;
		return $s;
	}

}

