<?php
require_once("boot.php");

if (isset($_GET['id'])) {

	$user = User::findById($_GET['id']);

	if (!$user) {
		echo 'User introuvable';
	} else {
		$user->delete();
		//echo '<div class="success">Utilisateur supprimé</div>';
		redirect('index.php');
	}

} else {
	echo 'Il manque l\'id';
}

?>