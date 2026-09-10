<?php include "include/antet.php"; include "include/func.php";

$_SESSION = array();
session_destroy();
header('Location: index.php');
?>