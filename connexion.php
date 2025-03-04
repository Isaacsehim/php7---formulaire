<?php 
// Définition des regex pour la validation des champs
$regex_name = "/^[a-zA-Z]+$/";
$regex_firstname = "/^[a-zA-Z]+$/";
$regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
$regex_password = "/^[a-zA-Z0-9]+$/";
$regex_genre = "/^[a-zA-Z]+$/";
$regex_date = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";

$errors = [];

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


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

    // Si aucun erreur, redirection vers la page de confirmation
    if (empty($errors)) {
        header('Location: confirmation.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/inscription.css">
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>

    <!-- Navigation -->
    <nav>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
    </nav>

    <p>Les champs marqués d'un * sont obligatoires</p>

    <!-- Formulaire d'inscription -->
    <form action="" method="POST" novalidate>

        <label for="email"></label>
        <span><?= $errors['email'] ?? '' ?></span>
        <input type="email" id="email" name="email" placeholder="📧 Email*" value="<?= $_POST['email'] ?? '' ?>" required>

        <label for="password"></label>
        <span><?= $errors['password'] ?? '' ?></span>
        <input type="password" id="password" name="password" placeholder="🔑 Mot de Passe*" required>

        <input class="submit" type="submit" value="Envoyer">
    </form>

    <footer>
        <p>© 2025 - Tous droits réservés</p>
    </footer>
</body>
</html>
