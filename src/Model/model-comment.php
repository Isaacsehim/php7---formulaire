<?php

Class Model_comment {

public static function showComment ($post) {
	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_users` INNER JOIN `76_comments` ON `76_posts`.`post_id` = `76_comments`.`post_id` WHERE `76_posts`.`post_id` = " . $post . " ORDER BY `com_timestamp` DESC;";
	$stmt = $pdo->query($sql);
	$stmt->execute();
	$allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$pdo = '';
	return $allComments;
}

public static function countComment ($post) {
	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT COUNT(*) FROM `76_comments` WHERE `post_id` = " . $post;
	$stmt = $pdo->query($sql);
	$stmt->execute();
	$countComments = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$countComments = $countComments[0]['COUNT(*)'];
	$pdo = '';
	return $countComments;
}

public static function getComment ($post) {
	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT COUNT(*) FROM `76_comments` WHERE `post_id` = " . $post;
	$stmt = $pdo->query($sql);
	$stmt->execute();
	$countComments = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$countComments = $countComments[0]['COUNT(*)'];
	$pdo = '';
	return $countComments;
}
?>

<div>
<i class="fa-solid fa-comment" style="color: #63E6BE;" id="comment"></i>
<i class="fa-regular fa-comment" style="color: #63E6BE;" id="uncomment"></i>
</div>