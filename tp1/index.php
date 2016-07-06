<?php
require_once("boot.php");

echo '<h1>Liste des utilisateurs</h1>';
echo '<p>Nombre d\'utilisateurs: ' . User::countAll() . '</p>';
echo '<a href="user_form.php">Ajouter un utilisateur</a>';

// Afficher la liste

$user = new User();
$users = $user->findAll();

echo '<table>';
foreach ($users as $u) {
	echo '<tr>';
	echo '<td>' . $u->getFullName() . '</td>';
	echo '<td><a href="user_form.php?id='.$u->id.'">Update</a></td>';
	echo '<td><a href="user_delete.php?id='.$u->id.'">Delete</a></td>';
	echo '</tr>';
}
echo '</table>';

