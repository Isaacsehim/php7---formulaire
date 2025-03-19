<?php

session_start();

require_once '../../config.php';

// on controle si la personne est bien loggée
if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}

// connexion à la base de données via PDO (PHP Data Objects) = création instance
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);

// options activées sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// requete SQL me permettant de rechercher tous les posts
$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` NATURAL JOIN `76_users` WHERE `user_id` = " . $_SESSION['user_id'] . " ORDER BY `post_timestamp` DESC;";

// on prepare la requete pour se prémunir des injections SQL
$stmt = $pdo->query($sql);

// on stock le resultat de la requête dans un tableau associatif
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';



class Like {
	public static function like($user_id, $post_id, like_id) {

	}
}

class Unlike {
	public static function unlike($user_id, $post_id, $like_id) {

	}
}


?>
<div>
<i class="fa-solid fa-heart" style="color: #ff0000;" id="like"></i>
<i class="fa-regular fa-heart" style="color: #ff0000;" id="unlike"></i>
</div>