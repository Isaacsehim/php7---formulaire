<?php

session_start();
var_dump($_SESSION);

require_once '../../config.php';

if(!isset($_SESSION['user_id'])){
	header('Location: ../public');
	exit;
} else {
	$_SESSION['user_id'] = $_SESSION['user_id'];
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

// options activées sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// requete SQL me permettant de rechercher tous les posts
$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_SESSION['user_id'] . " ORDER BY `post_timestamp` DESC;";

// on prepare la requete pour se prémunir des injections SQL
$stmt = $pdo->query($sql);

// on stock le resultat de la requête dans un tableau associatif
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($allPosts);

$pdo = '';

include_once("../../src/View/view-profil.php");

?>