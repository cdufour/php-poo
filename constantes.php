<?php

class Sportif
{
	public $force;

	// Par convention, les constantes s"écrivent en Majscules
	const NAME 				= "Footballer";
	const FORCE_LOW 		= 0;
	const FORCE_MEDIUM 		= 50;
	const FORCE_HIGH 		= 100;

	function __construct($force)
	{
		$this->force = $force;
		if ($force == self::FORCE_MEDIUM) {
			echo 'Sportif ayant une force moyenne de '. $force;
		}

	}
}

class Champion
{
	const FORCE_MEDIUM = 50;
}

class Tennisman extends Sportif
{
	const NAME = 'Tennisman';
}

echo Sportif::NAME;

//$s = new Sportif(50); // instanciation aveugle
$s = new Sportif(Champion::FORCE_MEDIUM);

echo $s->NAME; // non valable, NAME n'est pas une propriété de l'objet mais une constante de classe

echo Tennisman::NAME; // la classe fille a écrasé la constante de la classe parente


?>