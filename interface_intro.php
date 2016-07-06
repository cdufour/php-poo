<?php

interface A
{
	// une interface ne contient que des méthodes. Pas de propriétés.
	public function hello();
}

interface B
{
	public function bye();
}

class Document implements A, B
{
	public function hello()
	{
		echo 'hello';
	}

	public function bye()
	{
		echo 'bye';
	}
}

class Article extends Document
{

}

$d = new Document();
$d->hello();
echo '<br />';
$d->bye();
echo '<br />';

$a = new Article(); // la classe Article hérite de l'implémentation d'interface réalisée par la classe parente (Document)
$a->hello();
echo '<br />';
$a->bye();

?>