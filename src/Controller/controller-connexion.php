<?php

session_start();

require_once '../../config.php';
// Définition des regex pour la validation des champs

$regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
$regex_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";

$errors = [];

// Vérification si le formulaire a été soumis
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// 	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 	$sql = "SELECT * from 76_users where `user_mail` = :mail OR `user_password` = :password";

// 	$stmt = $pdo->prepare($sql);
// 	$stmt->bindValue(':mail', $_POST['email'], PDO::PARAM_STR);
// 	$stmt->rowCount() == 0 ? $found = false : $found = true;
// 	$pdo = '';

// !--ajout condition si checkbox checked mettre en rouge les inputs mal renseigné--!


	// Validation du champ "Email"
	if (isset($_POST['email'])) {
		if (empty($_POST['email'])) {
			$errors['email'] = 'Champs obligatoire';
		}
	}

	// Validation du champ "Mot de passe"
	if (isset($_POST['password'])) {
		if (empty($_POST['password'])) {
			$errors['password'] = 'Champs obligatoire';
		}
	}

	// Si aucun erreur, redirection vers la page de confirmation
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * from 76_users where `user_pseudo` = :identifiant OR `user_mail` = :identifiant";

		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':identifiant', $_POST['email'], PDO::PARAM_STR);
		$stmt->execute();
		$stmt->rowCount() == 0 ? $found = false : $found = true;
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if($found == false) {
			$errors['connexion'] = 'identifiant ou mot de passe incorrect';
		} else {
			if (password_verify($_POST['password'], $user['user_password'])) {
				$_SESSION = $user;
				header('Location: controller-profil.php');
			} else {
				$errors['connexion'] = 'identifiant ou mot de passe incorrect';
			}
			var_dump($user);

		// header('Location: ../../src/Controller/controller-profil.php');
		// exit;
	}
}



?>

<?php

include_once('../View/view-connexion.php');

?>