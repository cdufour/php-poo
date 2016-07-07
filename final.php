<?php

class Sportif
{
	public final function hello()
	{
		echo 'hello';
	}
}

class Footballer extends Sportif
{
	public function hello()
	{
		echo 'ciao';
	}
}

$f = new Footballer();
$f->hello(); // Erreur fatale, on ne peut pas récrire/écraser une méthode finale

?>

