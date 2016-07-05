<?php

class User
{
	private $db;
	public $id;
	public $firstName;
	public $lastName;
	public $email;

	private static $database; // variante si contexte statique


	public function __construct()
	{
		$connection = new Database();
		$this->db = $connection->connection();
	}

	// méthode statique = méthode de classe
	// invoquée par le ::
	public static function findById($id)
	{
		// variante si contexte statique
		$connection = new Database();
		self::$database = $connection->connection();
		$sth = self::$database->query("SELECT * FROM user WHERE id=".$id);
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_OBJ);

		if (!$result) {
			return false;
		} else {
			// instanciation d'objet + hydration
			$user = new User();
			$user->id = $result->id;
			return $user;
		}

	}

	public function findAll()
	{
		$sth = $this->db->query("SELECT * FROM user");
		$sth->execute();
		$results = $sth->fetchAll(PDO::FETCH_OBJ);

		$users = [];
		foreach ($results as $result) {

			$user = new User();
			// hydration de l'objet : on alimente
			// ses propriétés avec des valeurs
			$user->id = $result->id;
			$user->firstName = $result->firstName;
			$user->lastName = $result->lastName;
			$user->email = $result->email;

			$users[] = $user;

		}
		return $users; // retourne un tableau d'objets User
	}

	public function insert()
	{

	}

	public function update($id)
	{

	}

	public function delete()
	{
		$sth = $this->db->query("DELETE FROM user WHERE id=".$this->id);
		$sth->execute();
	}

	public function getFullName()
	{
		return $this->firstName . ' ' . $this->lastName;
	}
}