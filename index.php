<?php

class Animal
{
	public $speed = 100;
	protected $weight; // tranmise par héritage
	public $height;
	private $nbFangs; // PEAR convention = $_nbFangs ; non tranmis par héritage

	public function test()
	{
		echo '<p>ciao</p>';
	}

	// getter => accesseur
	function getSpeed()
	{
		return $this->speed * 2;
	}

	function getNbFangs()
	{
		return $this->nbFangs;
	}

	function getWeight()
	{
		return $this->weight;
	}

	// setter => mutateur
	function setWeight($weight)
	{
		$this->weight = $weight;
	}
}

$loup = new Animal();
//$loup->weight = 50; // écriture autorisée si attribut public
//echo $loup->weight; // lecture utorisée si attribut public

// En portée protected => getter/setter
$loup->setWeight(123);
echo $loup->getWeight();


$ours = new Animal();
$ours->height = 240;
echo $ours->height;

$loup->test();
$ours->test();

echo $loup->getSpeed();
//echo $ours->nbFangs;
echo $ours->getNbFangs();



?>
