<?php

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

	public function __construct($file)
	{
		// hydration à l'instanciation
		$this->file = $file;
	}

	public function write($text)
	{
		// méthode servant à écrire sur le disque
		$f = fopen($this->file, 'w'); // création du fichier sur le disque
		fwrite($f, $text);
		fclose($f);
	}
}

class DBWriter extends Writer
{
	protected $db; // PDO

	public function __construct($formater, $db)
	{
		$this->db = $db;
	}

	public function write($text)
	{
		// écrit dans la base de données
		$q = $this->db->prepare('INSERT INTO messages (text) VALUES (:text)');
		$q->bindValue(':text', $text);
		$q->execute();
	}
}

require '../tp1/classes/Database.php';
$db = new Database();
$pdo = $db->connection();

$dbw = new DBWriter(null, $pdo);
var_dump($dbw);
//$dbw->write('bisou');





?>

