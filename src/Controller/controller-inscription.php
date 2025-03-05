<?php
require_once('../../config.php');
// Définition des regex pour la validation des champs
$regex_name = "/^[a-zA-Z]+$/";
$regex_pseudo = "/^[a-zA-Z0-9]+$/";
$regex_firstname = "/^[a-zA-Z]+$/";
$regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
$regex_password = "/^[a-zA-Z0-9]+$/";
$regex_genre = "/^[a-zA-Z]+$/";
$regex_date = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";

$errors = [];

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Validation du champ "Nom"
	if (isset($_POST['nom'])) {
		if (empty($_POST['nom'])) {
			$errors['nom'] = 'Champs obligatoire';
		} else if (!preg_match($regex_name, $_POST['nom'])) {
			$errors['genre'] = 'Caractères non autorisés';
		}
	}

	// Validation du champ "Prénom"
	if (isset($_POST['prenom'])) {
		if (empty($_POST['prenom'])) {
			$errors['prenom'] = 'Champs obligatoire';
		} else if (!preg_match($regex_name, $_POST['prenom'])) {
			$errors['prenom'] = 'Caractères non autorisés';
		}
	}

	// Validation du champ "Prénom"
	if (isset($_POST['pseudo'])) {
		if (empty($_POST['pseudo'])) {
			$errors['pseudo'] = 'Champs obligatoire';
		} else if (!preg_match($regex_name, $_POST['pseudo'])) {
			$errors['pseudo'] = 'Caractères non autorisés';
		}
	}

	// Validation du champ "Genre"
	if (isset($_POST['genre'])) {
		if (empty($_POST['genre'])) {
			$errors['genre'] = 'Champs obligatoire';
		}
	}

	// Validation du champ "Date de naissance"
	if (isset($_POST['date_naissance'])) {
		if (empty($_POST['date_naissance'])) {
			$errors['date_naissance'] = 'Champs obligatoire';
		} else if (!preg_match($regex_date, $_POST['date_naissance'])) {
			$errors['date_naissance'] = 'Format invalide';
		}
	}

	// Validation du champ "Email"
	if (isset($_POST['email'])) {
		if (empty($_POST['email'])) {
			$errors['email'] = 'Champs obligatoire';
		} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 'Email non valide';
		}
	}

	// Validation du champ "Mot de passe"
	if (isset($_POST['password'])) {
		if (empty($_POST['password'])) {
			$errors['password'] = 'Champs obligatoire';
		} else if (strlen($_POST['password']) < 8) {
			$errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
		}
	}

	// Validation du champ "Confirmation du mot de passe"
	if (isset($_POST['confirm_password'])) {
		if (empty($_POST['confirm_password'])) {
			$errors['confirm_password'] = 'Champs obligatoire';
		} else if ($_POST['confirm_password'] !== $_POST['password']) {
			$errors['confirm_password'] = 'Les mots de passe ne correspondent pas';
		}
	}

	// Validation du champ "CGU"
	if (isset($_POST['cgu'])) {
		if (empty($_POST['cgu'])) {
			$errors['cgu'] = 'Vous devez accepter les conditions d\'utilisation';
		}
	}

	// !--ajout condition si checkbox checked mettre en rouge les inputs mal renseigné--!


	// Si aucun erreur, redirection vers la page de confirmation
	if (empty($errors)) {
		$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// var_dump($pdo);
		// header('Location: ../../src/View/view-confirmation.php');
		// exit;
		$sql = "INSERT INTO
		`76_users`(
			`user_gender`,
			`user_lastname`,
			`user_firstname`,
			`user_pseudo`,
			`user_birthdate`,
			`user_mail`,
			`user_password`
		)VALUES(
			:gender,
			:lastname,
			:firstname,
			:pseudo,
			:birthdate,
			:mail,
			:password
		);";
		$stmt = $pdo->prepare($sql);
		
		$stmt->bindValue(":gender", $_POST["genre"], PDO::PARAM_STR);
		$stmt->bindValue(":lastname", $_POST["nom"], PDO::PARAM_STR);
		$stmt->bindValue(":firstname", $_POST["prenom"], PDO::PARAM_STR);
		$stmt->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
		$stmt->bindValue(":birthdate", $_POST["date_naissance"], PDO::PARAM_STR);
		$stmt->bindValue(":mail", $_POST["email"], PDO::PARAM_STR);
		$stmt->bindValue(":password", $_POST["password"], PDO::PARAM_STR);

		$stmt->execute();
	}
}
?>

<?php
include_once('../View/view-inscription.php');
?>