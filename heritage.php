<?php

class Sportif
{
	public $name;
}

class Footballer
{
	public $name;
	public $age;

	function getName()
	{
		return $this->name;
	}
}

class Tennisman
{
	public $name;

	function getName()
	{
		return $this->name;
	}
}

$sportif = new Sportif();
$sportif->name = "Alessandro Del Piero";
echo $sportif->name;

var_dump($sportif);

$footballer = new Footballer();
//$footballer->name = "Paul Pogba";
//$footballer->age = 23;
//echo $footballer->name;

var_dump($footballer);

$footballer2 = new Footballer();
var_dump($footballer2);

$footballer->name = "Patrice Evra";
echo $footballer->getName();

$footballer2->name = "Paul Pogba";
echo $footballer2->getName();

$tennisman = new Tennisman();
$tennisman->name = "Roger Federer";
echo $tennisman->getName();



