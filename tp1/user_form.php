<?php
	require_once('boot.php');

	if (isset($_GET['id'])) {
		$user = User::findById($_GET['id']);
		var_dump($user);
	}

	if (isset($_POST['submit'])) {
		// formulaire envoyé
		// utiliser la classe User
		// pour insérer en DB les données postées

		// instanciation d'un objet vide
		$user = new User();
		// hydratation de l'objet
		$user->firstName = $_POST['firstName'];
		$user->lastName = $_POST['lastName'];
		$user->email = $_POST['email'];

		$user->insert();

	}
?>

<h2>Add User Form</h2>
<form action="" method="post">
	<label for="firstName">First Name</label>
	<input type="text" name="firstName">
	<br />

	<label for="lastName">Last Name</label>
	<input type="text" name="lastName">
	<br />

	<label for="email">Email</label>
	<input type="email" name="email">
	<br />

	<input type="submit" name="submit">
</form>