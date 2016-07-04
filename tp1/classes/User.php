<?php

class User
{
	private $db;
	private $id;
	public $firstName;
	public $lastName;
	public $email;

	public function __construct()
	{
		$connection = new Database();
		$this->db = $connection->connection();
	}

	public function findAll()
	{
		$sth = $this->db->query("SELECT * FROM user");
		$sth->execute();
		$results = $sth->fetchAll(PDO::FETCH_OBJ);
		//echo '<pre>';
		//var_dump($results);
		return $results;
	}

	public function insert()
	{

	}

	public function update($id)
	{

	}

	public function delete($id)
	{

	}
}