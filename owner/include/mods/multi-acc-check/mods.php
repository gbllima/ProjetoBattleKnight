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
	$base = "cc.ip=cc2.ip";
	if(isset($_GET["mode"])) {
		if($_GET["mode"] == "ip-pass") {
			$mode = "Mode : Ip & Pass Same| <a href='?mod=multi-acc-check&mode=ip-only'>Ip Only Same</a>".
				" | <a href='?mod=multi-acc-check&mode=email-only'>Email Only Same</a><br/>";
			$sql = "AND cc.pass=cc2.pass";
		} elseif($_GET["mode"] == "ip-only") {
			$mode = "Mode : <a href='?mod=multi-acc-check&mode=ip-pass'>Ip & Pass Same</a>".
				" | Ip Only Same | <a href='?mod=multi-acc-check&mode=email-only'>Email Only Same</a><br/>";
			$sql = "";
		} else {
			$mode = "Mode : <a href='?mod=multi-acc-check&mode=ip-pass'>Ip & Pass Same</a>".
				" | <a href='?mod=multi-acc-check&mode=ip-only'>Ip Only Same</a> | Email Only Same<br/>";
			$base = "cc.email=cc2.email";
			$sql = "";
		}			
	} else {
		$mode = "Mode : <a href='?mod=multi-acc-check&mode=ip-pass'>Ip & Pass Same</a>".
		 	"| <a href='?mod=multi-acc-check&mode=ip-only'>Ip Only Same</a>".
		 	"| <a href='?mod=multi-acc-check&mode=email-only'>Email Only Same</a><br/>";
		$sql = "";
	}
	$mysql->sql = "SELECT * FROM users cc WHERE EXISTS(SELECT cc2.ip FROM users cc2 WHERE $base $sql AND cc.name<>cc2.name) order by ip";
	$query = $mysql->query();
	$data = $mysql->fetch($query);
	
	$num = mysql_num_rows($query);
	$page->content .= "
		$mode
		". success("<br/>We'Ve Found ". $num ." user(s)") ."
		<form name='form' action = './?do=delete-user' method='POST'>
		<table class='box'>
			<tr>
				<td class='head'>Id</td>
				<td class='head'>Name</td>
				<td class='head'>Ip</td>
				<td class='head'>Email</td>
				<td class='head' align='center'>(X)</td>
			</tr>
	";
	
	if($num > 1) {
		foreach($data as $result) {
			
			$page->content .= "
			<tr>
				<td>". $result["id"] ."</td>
				<td><a href='?do=edit-user:". $result["id"] ."'>". $result["name"] ."</td>
				<td>". $result["ip"] ."</td>
				<td>". $result["email"] ."</td>
				<td align='center'><input type='checkbox' name='del[]' value='". $result["id"] .":". $result["level"] ."'></td>			
			</tr>
			";
		}
	}
	$page->content .= "</table><br/><input type='button' value='Delete User' OnClick=\"delconf('users')\"></form>";
		$page->title = "Multi Account Checker";
		$page->show();

?>
