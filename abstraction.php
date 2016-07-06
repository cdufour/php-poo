<?php

abstract class Sportif
{
	abstract public function hello(); // méthode abstraite, elle devra être implementée (avoir un corps {}) dans les classes filles
	// l'abstraction de méthode force les classes filles à implémenter leur logique spécifique

	public function bye()
	{
		echo 'bye';
	}

}

class Footballer extends Sportif
{
	// on implémente la function abstraite définie dans la classe parente
	public function hello()
	{
		echo 'hello';
	}
}

class Tennisman extends Sportif
{

}

//$s = new Sportif(); Il est interdit d'instancier une classe abstraite
// la classe abstraite sert de base générique aux classes filles qui héritent d'elle

$f = new Footballer();

$f->hello();
echo '<br />';
$f->bye();

$t = new Tennisman();

$t->bye(); // correct, la méthode bye() est normalement implémentée dans la classe parente et héritée par la classe fille

//$t->hello(); Fatal Error, la classe Tennisman n'a pas implémenté la méthode abstraite hello()

?>