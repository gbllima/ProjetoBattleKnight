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

	global $page, $mysql;

	$map = "";
	$content ="";
	$mysql->sql = "SELECT * FROM map";
	$query = $mysql->query();
	while ($row = mysql_fetch_assoc($query)) {
		$x = $row["x"];
		$y = $row["y"];
		$type = $row["type"];
		$subtype = $row["subtype"];

		if($type == 0 && $subtype > 0){
		//fix water lake 0x, where 00 = ocean & 01 - etc = lake
			$subtype = 2; 
		}
		if($y == 0){ //new line
			$map .= "<br />\n"; 
		} 
		switch($type) {
			case 0: 
				switch($subtype) {
				case 0:
					$owner = "Sea";
					break;
				case 2:
					$owner = "Lake";
					break;
				} break;
						
			case 1:
				switch($subtype) {
				case 1:
				case 2:
					$owner = "Forest";
					break;
				case 3:
				case 4:
				case 5:
				case 6:
					$owner = "Land";
					break;
				} break;
			case 2:
				$owner = "Mountain";
				break;
			case 3: 
				$town = town($subtype);
				$user = user($town[1]);
				$owner = "Town : ". str_replace("'", "\"", stripslashes($town[2])) .", Owner : ". stripslashes($user[1]) ."";
				break;
		}
		if($type == 3) {
			$l = "./?do=edit-town:$town[0]";
		} else {
			$l = "../map.php?x=$x&y=$y";
		}
		if(isset($_GET["large"])) {
			if(isset($_GET["size"])) {
				$s = $_GET["size"];
			} else {
				$s = '15';
			}
			$map .= "<a href='$l' target='_blank'><img src='include/mods/view-map/images/env_$type$subtype.gif' style='width:". $s ."px; height:". $s ."px;' title='$owner'></a>";
		} else {		
			$map .= "<img src='include/mods/view-map/images/env_$type$subtype.gif' style='width: 3px; height: 3px;' title='$owner'>";
		}			
	}
	
	$desc = "
		<h3>View Map</h3>
		<p>In here you can view map on large mode, so you can maintenance ".
		"your game more quick and can see how fast your game grow ;)</p>
	";
					
	if(!isset($_GET["large"])) {
			$content .= "
				<center>
				$desc
				$map <br /> <a href=\"./?mod=view-map&large=true\" target='_parent' title='View On large mode'> View on large mode</a>
				";
			$content .= "</table>";
			$page->content = $content;
			$page->show();
	} else {
			$content .= "
				<html>
				<head>
				<title>View Map  : Large Mode</title>
				<link rel='stylesheet' type='text/css' href='./include/css/main.css'>
				<!--[if IE 6]>
    				<style type=\"text/css\">
    				/* <![CDATA[ */
    					html {
      						overflow-y: scroll;
   					}
    				/* ]]> */
    				</style>
    				<![endif]-->
				</head>
				<body>
				<center>
				<form method='GET'>
				<input type='hidden' name='mod' value='view-map'>
				<input type='hidden' name='large' value='true'>
				<input type='text' name='size' value='$s'> <input type='submit' value='Set'><br/>
				For maximum size, I recommend is 19, because if size > 19 the layout will be scrolled
				$desc
				<table style='width:auto'>
				<tr><td class='box' align='center'>Back To <a href='./'>Devana's Admin Page</a></td></tr>
				<tr><td align='center'  class='main'>
				$map
				</td></tr></table>
				</center>
				</body>
				</html>				
				";
			$content .= "</table>";
			echo $content;
			exit;
	}			
	
?>
