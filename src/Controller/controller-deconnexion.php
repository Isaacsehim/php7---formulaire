<?php 

session_start();
unset($_SESSION);
session_destroy();

?>

<?php include_once("../../src/View/view-deconnexion.php"); ?>