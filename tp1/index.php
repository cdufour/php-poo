<?php
require_once("boot.php");

echo '<h1>Liste des utilisateurs</h1>';
echo '<button>Ajouter un utilisateur</button>';

// Afficher la liste

$user = new User();
$users = $user->findAll();

echo '<table>';
foreach ($users as $u) {
	echo '<tr>';
	echo '<td>' . $u->getFullName() . '</td>';
	echo '<td>Update</td>';
	echo '<td><a href="user_delete.php?id='.$u->id.'">Delete</a></td>';
	echo '</tr>';
}
echo '</table>';

