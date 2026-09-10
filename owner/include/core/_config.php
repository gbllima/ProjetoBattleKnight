<?php //Configuration
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

function config_adm() {
	global $db_id, $page;
	
	if(isset($_POST["save"])) {
	
		foreach($_POST as $index => $value) {
			if($value != "Save") {
				$query = "UPDATE config SET value='". $value ."'  WHERE name='".$index."'";
				$update = mysql_query($query, $db_id);
			}
		}

		if($update) {
			$page->title = "Success Edit";
			$page->content .= success("Success Edit Configuration!");
		} else {
			$page->title = "Failed Edit";
			$page->content .= fail("Failed Edit Configuration. <a href=\"javascript:history.go(-1);\">Go Back</a></center> And Try Again");
		}
	}
			
	$config = config();

	$array["adi"] = array(
		"1"	=> "Allow",
		"0"	=> "Deny"
	);
	$array["ade"] = array(
		"1"	=> "Allow",
		"0"	=> "Deny"
	);
	$array["login"] = array(
		"1"	=> "Open",
		"0" => "Closed"
	);
	$array["reg"] = array(
		"1"	=> "Open",
		"0"	=> "Closed"
	);
	$array["mnp"] = array(
		"1"	=> "Enable",
		"0"	=> "Disable"
	);
	$page->content .= "
		<form action='?do=config' method='post'>
		<table class='box'>
			<tr>
				<td>Duplicate ip</td>
				<td>". selectBox($array["adi"], $config[0][0], $config[0][1]) ."</td>
			</tr>
			<tr>
				<td>Duplicate email</td>
				<td>". selectBox($array["ade"], $config[1][0], $config[1][1]) ."</td>
			</tr>
			<tr>
				<td>Login</td>
				<td>".selectBox($array["login"], $config[2][0], $config[2][1])  ."</td>
			</tr>
			<tr>
				<td>Register</td>
				<td>". selectBox($array["reg"], $config[3][0], $config[3][1]) ."</td>
			</tr>
			<tr>
				<td>Mail New Password</td>
				<td>". selectBox($array["mnp"], $config[4][0], $config[4][1]) ."</td>
			</tr>
			<tr>
				<td colspan='2'><input type='submit' name='save' value ='Save'> <input type='reset' value='Reset'></td>
			</tr>
		</table></form>
		";
			$page->title = "Config";
			$page->show();
				
}

?>
