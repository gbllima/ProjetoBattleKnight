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

	global $page, $mysql, $file;
	
	if(isset($_POST["send"])) {
		if(!empty($_POST["point"])) {
			$mysql->sql = "SELECT * FROM users ORDER BY id";
			$query = $mysql->query();
			$num_query = mysql_num_rows($query);
			$_POST = array_map("mres_deep", $_POST);
			extract($_POST);	
			
			if($num_query > 1) {		

				foreach($mysql->fetch($query) as $index => $data) {
					$mysql->sql = "UPDATE users SET points = '" . ($data["points"] + $point) ."' WHERE id = '" . $data["id"] . "'";
					if($mysql->query()) {
						$page->content .= success("Success Give Points To " . $data["name"] ."<br />");
					} else {
						$page->content = failed("Failed Give Points To All Users");
						$page->show();
					}
				}
			} else {
				$data = $mysql->fetch($query);
				$mysql->sql = "UPDATE users SET points = '" . ($data["points"] + $point) ."' WHERE id = '" . $data["id"] . "'";

				if($mysql->query()) {
					$page->content .= success("Success Give Points To " . $data["name"] ."<br />");
				} else {
					$page->content = failed("Failed Give Points To All Users");
					$page->show();
				}			
			}
			
			$page->content .= "<br /> <a href='./?mod=give-point-all'>Go Back to mods</a>";
		} else {
			$page->title = "Failed Send";
			$page->content = fail("<p>Points field must not be blank ! go back and try again</p>");
			//$page->show();
		}
	} else {
		$page->content .= "
			Give Points to all users, can boost interest your users to play your game
			<form name='form1' method='post' action='?mod=give-point-all'>
			<p>Point: + 
				<input name='point' type='text' size='15'> <input type='submit' name='send' value='Send'>
			</p>	
			</form>
		";
	}
	
	$page->title = "Give Points To All Users";
	$page->show();
	
?>
