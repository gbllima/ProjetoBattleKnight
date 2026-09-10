<?php
session_start();
if (isset($_SESSION["user"][0])) include "./language/ru.php";
else if (isset($_SESSION["lang"])) include "./language/ru.php";
else include "./language/ru.php";




$title="BattleKnight The Empire"; 
$announcement=$lang['announc']; 
$m=49; $n=49;
$db_host = "localhost"; //Server Name
$db_user = "root"; 	//DB User Name
$db_pass = "";		//DB User Pass 
$db_name = "devana";	//DB Name
$ip = '62.205.195.53';			// Administrator ip
$gmip = '62.205.195.53';			// GM,Administrator ip
$mcost=1.5;//constant for cost multiplier
?>