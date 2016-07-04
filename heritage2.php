<?php

class Sportif // classe parent
{
	public $name = "Vincent Auriol";
	protected $age;

	function getName()
	{
		return $this->name;
	}
}

class Footballer extends Sportif // classe fille
{
	public $name = "Paul Pogba";

	function getNbGoals()
	{
		return 56;
	}
}

class Tennisman extends Sportif // classe fille
{

}

$footballer = new Footballer();
$tennisman = new Tennisman();

var_dump($footballer);
var_dump($tennisman);

//$footballer->name = "Paul Pogba";
echo $footballer->getName();

//$footballer->age = 23;
echo $footballer->getNbGoals();

