<?php

interface Format
{
	public function textFormat($input);
	public function htmlFormat($input);
}

abstract class Document implements Format
{
	public function textFormat($text)
	{
		return $text . ' (modifié par textFormat)';
	}

	public function htmlFormat($property)
	{
		// $this->$property est résolu dynamiquement dans le contexte de l'object qui appelle la méthode
		// $this->$property
		// devient à l'exécution $a->title
		return '<strong>' . $this->$property . '</strong>';
	}
}

class Book extends Document
{
	public $title;
}

class Article extends Document
{
	public $issueYear = 2016;
	public $title = 'Voyage au bout de la nuit';
}

$b = new Book();
$a = new Article();


echo $b->textFormat('gsd gsdgs gsdgsd');

echo '<br />';

echo $a->htmlFormat('title'); // on donne en entrée de la méthode htmlFormat la propriété (liée au contexte de l'objet) qu'elle doit formater
// l'objet $a retourne une version formatée de sa propriété title


?>