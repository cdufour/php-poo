<?php

// strategy2 : relation entre les classes qui formatent et celles qui écrivent

interface Formater
{
	public function format($text);
}

// Formaters
// 3 classes implémentant l'interface Formater
// chacune d'entre elles propose sa version (son implémentation) de la méthode format
class XMLFormater implements Formater
{
	public function format($text)
	{
		return '<?XML version="1.0" encoding="ISO-8859-1"?>' . "\n".'<message>'."\n"."\t".'<date>'.time().'</date>'."\n"."\t".'<text>'.$text.'</text>'."\n".'</message>';
	}
}

class TextFormater implements Formater
{
	public function format($text)
	{
		return 'Date: '.time()."\n".'Text: '.$text;
	}
}

class HTMLFormater implements Formater
{
	public function format($text)
	{
		return '<p>Date: '.time()."\n".'Text: '.$text.'</p>';
	}
}


// Writers

abstract class Writer
{
	protected $formater;

	public function __construct($formater)
	{
		//hydration à l'instanciation
		$this->formater = $formater;
	}

	public abstract function write($text);
}

// 2 classes d'écriture qui héritent de Writer
class FileWriter extends Writer
{
	protected $file;

	public function __construct($formater, $file)
	{
		// hydratation à l'instanciation
		$this->file = $file;

		$this->formater = $formater;
	}

	public function write($text)
	{
		// méthode servant à écrire sur le disque
		$f = fopen($this->file, 'w'); // création du fichier sur le disque
		fwrite($f, $this->formater->format($text));
		fclose($f);
	}
}

class DBWriter extends Writer
{
	protected $db; // PDO

	public function __construct($formater, $db)
	{
		$this->db = $db;

		//propriété héritée
		$this->formater = $formater;
	}

	public function write($text)
	{
		// écrit dans la base de données
		$q = $this->db->prepare('INSERT INTO messages (text) VALUES (:text)');
		//$q->bindValue(':text', $text);
		$q->bindValue(':text', $this->formater->format($text));
		$q->execute();
	}
}

require '../tp1/classes/Database.php';
$db = new Database();
$pdo = $db->connection();

$dbw = new DBWriter(new XMLFormater, $pdo);
//var_dump($dbw);
$dbw->write('bisou');

$fw = new FileWriter(new PDFFormater, 'log.txt');
$fw->write('bisou');

// Développement possible
// Créer une classe PDFFormater





?>

