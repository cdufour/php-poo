<?php
/*
Exercice

Créer un object (une classe) User
propriétés : firstName, lastName, age
methode : getFullName qui renvoie la concaténation de firstName + lastName
*/

class User
{
	public $firstName;
	public $lastName;
	public $age;

	// méthode magique invoquée automatiquement à l'instanciation de la classe
	
	/*
	function __construct($firstName, $lastName) 
	{
		//echo 'classe instanciée';
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
	*/
	function __construct($options = [])
	{
		$this->firstName = $options['firstName'];
		$this->lastName = $options['lastName'];
	}

	function getFullName()
	{
		return $this->firstName . ' ' . strtoupper($this->lastName;
	}
}

/*
$u = new User();
$u->firstName = "Antonio";
$u->lastName = "Conte";

echo $u->getFullName();
*/

//$u2 = new User('Antonio', 'Conte');

$options = [
	'firstName' => 'Antonio',
	'lastName' => 'Conte'
];


$u3 = new User($options);
echo $u3->getFullName();
