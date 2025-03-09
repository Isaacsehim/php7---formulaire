<?php 

session_start();
unset($_SESSION);
session_destroy();

?>

<?php include_once("../../View/view/view-deconnexion.php"); ?>