<?php
spl_autoload_register(function ($class) {require $class . '.php';});
class Entity {
	private $prop = []; // valeur des colonnes
	private $lbl = []; // nom des colonnes
	public $type;	// type d'affichage: Table / Liste à puce / liste ordonnée | T U O
	public $ds; // DataSet

	public function __construct($DS, $type) {
		$this->ds = $DS;
		$this->type = $type;
	}

	public function __toString() {
		$i=0;
		switch ($this->type) {
		 	case 'T':
				$s = '<tr>';
				foreach ($this->prop as $va)
					$s .= "<td>$va</td>";
				return $s."</tr>\n";
		 		break;
		 	case 'U':
				$s = '<li><ul>';
				foreach ($this->prop as $va)
					$s .= "<li>" . $this->lbl[$i++] . ": $va</li>";
				return $s."</ul></li>\n";
		 		break;
		 	case 'O':
				$s = '<li><ol>';
				foreach ($this->prop as $va)
					$s .= "<li>". $this->lbl[$i++] . ": $va</li>";
				return $s."</ol></li>\n";
		 		break;
		 	default:
		 		$s = "Erreur de balise html conteneur classe: " . __CLASS__ . 
		 			" / methode: " . __METHOD__ . " / ligne: " . __LINE__ . "<br/>";
		 		return $s;
		 		break;
		}		

	}

	public function __get($name) {
		return $this->prop[$name];
	}
	public function __set($name, $value) {
		$this->prop[$name] = $value;
	}

	public function tabhead($DS) {
		$ds = $DS;
		$s = '<tr>';
#		foreach(range(0, $DS->columnCount() - 1) as $idx)
		for($idx=0; $idx<$DS->columnCount(); $idx++ ) {
			$this->lbl[] = $DS->getColumnMeta($idx)['name'];
			$s.= "<th>".$DS->getColumnMeta($idx)['name']."</th>";
		}
		return $s."</tr>";
	}
}

try {
	$bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', 'root');
}
catch(Exception $e) {
	die('Erreur:' . $e->getMessage() );
}
	$DS = $bdd->query('SELECT * FROM `jeux_video`');

	echo new Liste($DS, 'U');

	$DS->closeCursor();
	$bdd = null;

?>

</body>
</html>