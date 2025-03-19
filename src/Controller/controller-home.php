<?php

session_start();

require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {

    header('Location: ../../public/');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_users` NATURAL JOIN `76_pictures` WHERE `user_id` IN (
(SELECT GROUP_CONCAT(fav_id) FROM 76_favorites WHERE `user_id` = " . $_SESSION['user_id'] . " GROUP BY `user_id`)," . $_SESSION['user_id'] . ");";

$stmt = $pdo->query($sql);


$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

?>

<?php include_once "../../src/View/view-home.php";