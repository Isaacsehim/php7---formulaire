<?php

session_start();
var_dump($_SESSION);

if(!isset($_SESSION['user_id'])){
	header('Location: ../public');
	exit;
} else {
	$_SESSION['user_id'] = $_SESSION['user_id'];
}

include_once("../../src/View/view-profil.php");

?>