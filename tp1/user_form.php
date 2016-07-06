<?php
	require_once('boot.php');

	if (isset($_GET['id'])) {
		$mode = 'update';
		// formulaire en mode update
		$user = User::findById($_GET['id']);
		//var_dump($user);
	} else {
		$mode = 'insert';
		// formulaire en mode insert
		// créer un user vide pour éviter "notice: undefined variable/property" (attributs value des input du formulaire)
		$user = new User();
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

		// déterminer au submit si on est en mode update ou en mode insert

		/*
		if (isset($_POST['id'])) {
			//echo 'mode update';
			$user->id = $_POST['id'];
			$user->update();
			redirect('index.php');
		} else {
			//echo 'mode insert';
			$user->insert();
			redirect('index.php');
		}
		*/

		if (isset($_POST['id'])) {
			$user->id = $_POST['id'];
		};

		$user->save();
		redirect('index.php');

	}
?>

<h2>Add User Form</h2>
<form action="" method="post">
	<label for="firstName">First Name</label>
	<input type="text" name="firstName" value="<?= $user->firstName ?>">
	<br />

	<label for="lastName">Last Name</label>
	<input type="text" name="lastName" value="<?= $user->lastName ?>">
	<br />

	<label for="email">Email</label>
	<input type="email" name="email" value="<?= $user->email ?>">
	<br />

	<?php 
		if ($mode == 'update') {
			echo '<input type="hidden" name="id" value="'. $user->id .'">';
		}
	?>

	<input type="submit" name="submit">
</form>