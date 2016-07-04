<?php
require_once("classes/Database.php");
require_once("classes/User.php");

echo '<h1>Liste des utilisateurs</h1>';
echo '<button>Ajouter un utilisateur</button>';

// Afficher la liste

$user = new User();
$users = $user->findAll();

foreach ($users as $u) {
	echo '<p>' . $u->firstName . ' ' .
	$u->lastName . '</p>';

	//echo $u->getFullName();
}
