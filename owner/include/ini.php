<?php
/*
	-----------------------------------------------------||
	DevAdm - A New Admin Panel For Devana
	Version	: 0.3.1 Beta
	Author : I Putu Yoga Permana
	Date Released	: 02 January 2009
	
	Visit http://devana.eu/forum/viewtopic.php?f=20&t=81
	for News and update
	------------------------------------------------------||
*/

	//Database Info
	
	$db_host = "localhost"; //Server Name
	$db_user = "login"; 	//DB User Name
	$db_pass = "pass";		//DB User Pass 
	$db_name = "basename";	//DB Name
	$ip = 'admin ip';			// Administrator ip
	
	//This secret key for your admin panel, must be unique
	//It can hold the attacker, to access your admin panel
	//Even they get your password ! :D~
	$secretKey = "secretpass"; 
	
	
	session_start();
	
	//Include from devana directory
	if(file_exists("../include/func.php")) {
		include("../include/func.php");
	} else {
		$msg = "<b>Hey! We detected that you ".
		       "install DevAdm on wrong path</b>".
		       "<br /> Just see <i>docs/readme.txt</i> ".
		       "how to install DevAdm";
		//$msg .= $_SERVER["PHP_SELF"];
		die($msg);
	}
	
	//Admin's File Include
	include("include/config.php");
	include("include/libs/function.php");
	include("include/libs/class.php");
	
	//Initial Some Class
	$page = new page();
	$file = new file();
	$log = new log();
	$mysql = new mysql();
	$mods = new mods();
	
	//Check Admin Session Access
	$url = explode("/", $_SERVER["REQUEST_URI"]);
	if(isset($_SESSION["user"])) {
		if($_SESSION["user"][4] && ($_SESSION["user"][4] == 5 || $_SESSION["user"][4] == 4)) {
			//Good, Have Admin Access,
			//And then, check secretKey session
			if(!isset($_SESSION["secretkey"])) {
				if(!in_array("?do=sc", $url)) {
					die(header("Location: ?do=sc"));
				}
			}
		} else { //They Don't Have Admin Access, Throw To Login Page
			if(!in_array("?do=login", $url)) {
				die(header("Location: ?do=login"));
			}
		}
	} else {
		if(!in_array("?do=login", $url)) {
			die(header("Location: ?do=login"));
		}
	}
	
?>
