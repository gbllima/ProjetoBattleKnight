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

function weapons_list() {
	global $mysql, $page;
	#error_reporting(E_ALL);
	

	//Setup For Pagination
	//-------------------------
	if(isset($_GET["page"])) {
		$npage = $_GET["page"];
		$pguri = "&page=".$_GET["page"];
	} else {
		$npage = 1;
		$pguri = "";
	}
	$mysql->sql = "SELECT * FROM weapons ";


	//Setup Sort Order
	//-------------------------
	if(isset($_GET["sort"])) {

		$arrsort = array("type", "name");
		if(in_array($_GET["sort"], $arrsort)) {
			$order = $_GET["sort"];
			$orduri = "&sort=".$order;
		} else {
			$order = "type";
			$orduri = "&sort=".$order;
		}
	} else { $order = "type"; $orduri = "";}
	
	
	//Setup Category By Faction
	//-------------------------
	$f = factions();
	if(isset($_GET["faction"])) {

		foreach($f as $index => $f_data) {
			if($f_data[0] == $_GET["faction"]) {
				$where = $_GET["faction"];
				
				break;
			}
		}
		$furi = "&faction=".$where;
	} else {
		$furi = "";
		$where = $f[0][0];
	}
	
	//Make Faction Link
	$faction = "";
	if($f != false || !empty($f)) {
		foreach($f as $index => $f_data) {
			if($where == $f_data[0]) {
				$faction .= "| $f_data[1] ";
			} else {
				$faction .= "| <a href='./?do=weapons&faction=$f_data[0]'>$f_data[1]</a> ";
			}
		}
	}

		$mysql->sql .= " WHERE faction = '$where' ORDER BY $order ASC LIMIT ".(($npage-1)*10).",10";


	//Display The Link & Table
	//-------------------------		
	$page->content .= "
	Faction : $faction
	<table class='box'>
		<tr>
			<td class='head' width='5%'><a href='?do=weapons&sort=type$pguri' title='Sort List By type'>type</a></td>
			<td class='head' width='10%'> </td>
			<td class='head' width='85%'><a href='?do=weapons&sort=name$pguri' title='Sort List By Name'>Name</a></td>
		</tr>
	";
	
	//Fetch Data From Database
	$query = $mysql->query();
	$num_query = mysql_num_rows($query);
	
	if($num_query > 1) {
		foreach($mysql->fetch($query) as $value) {
			$page->content .= "
			<tr>
				<td>".$value["type"] ."</td>
				<td class='left' align='center'><img src='../default/1/1".$value["type"].".gif' width='30px' height='35px'></td>
				<td><a href='?do=edit-wp:$where-".$value["type"]."'>".$value["name"]."</a></td>
			</tr>
			";
		}
	} elseif($num_query == 1) {
		$value = $mysql->fetch($query);
			$page->content .= "
			<tr>
				<td>".$value["type"] ."</td>
				<td class='left' align='center'><img src='../default/1/1".$value["type"].".gif' width='30px' height='35px'></td>
				<td><a href='?do=edit-wp:$where-".$value["type"]."'>".$value["name"]."</a></td>
			</tr>
			";
	} else {
		$page->content .= "
		<tr>
			<td colspan='4' align='center'>weapon's Database Empty</td>
		</tr>
		";
	}
	
	$page->content .= "</table><br/>";
	
	//Setup Page Number's Link
	$mysql->sql = "SELECT * FROM weapons WHERE faction = '$where' ORDER BY type";
	$query = $mysql->query();

	$num_query = mysql_num_rows($query);
	$page_arr = ceil($num_query / 10);

	$page->content .= "<table class='box'><tr><td>Page :";
	for($i = 1; $i <= $page_arr; $i++) {
		
		if( $i == $npage) {
			$page->content .= " $npage |";
		} else {
			$page->content .= " <a href='?do=weapons$furi$orduri&page=". $i ."'>$i</a> |";
		}
	}
	$page->content .= "</td></tr></table>";
	$page->title = "weapons Customization";
	$page->show();
}

function edit_weapon($type) {
	global $mysql, $page;
	
	$type = explode("-", $type);
	//Fetch Data From Database
	$mysql->sql = "SELECT * FROM weapons WHERE type = '$type[1]' AND faction = '$type[0]' LIMIT 1";
	$query = $mysql->query();
	$value = $mysql->fetch($query);
	
	//Check POST data
	if(isset($_POST["save"])) {
		
		$_POST = array_map("mres_deep", $_POST);
		extract($_POST);
		$res = implode("-", $input);
		//Insert Data To Database
		$mysql->sql = "UPDATE weapons SET name = '$name', duration = '$dur', input = '$res', description = '$desc'  WHERE type = '$type[1]' AND faction = '$type[0]'";
		
		$insert = $mysql->query();
		
		if($insert) {
			$page->title = "Success Edit";
			$page->content .= success("Success Edit weapon: ".$value["name"]."! <a href='".$_SERVER["REQUEST_URI"]."'>Click here</a> to continue edit this weapon.");
		} else {
			$page->title = "Failed Edit";
			$page->content .= fail("Failed Edit weapon: ".$value["name"]."! <a href=\"javascript:history.go(-1);\">Go Back</a></center> And Try Again");
		}
			$page->show();
	}
	//Setup Name

	$n = inputtext("name", $value["name"], "25");
	
	
	//Setup Cost Resources
	$resources = explode("-", $value["input"]);
	$res = "";
	foreach($resources as $ri => $rd) {
		$res .= "<img src='../default/1/0$ri.gif' width='23px' height='18px'>". inputtext("input[]", $rd, "3") ." |";
	}
	
	//Setup Ability
	$dur = inputtext("dur", $value["duration"], "3");	
	//Setup Template's Variables
	$tpl_var = array("type" => $value["type"],
			 "faction" => $value["faction"],
			 "name" => $n,
			 "res" => $res,
			 "dur" => $dur,
			 "desc" => $value["description"],
			 );
	//Load Table		 
	$page->content .= $page->template("other/weapon_edit", $tpl_var);
	$page->title = "Edit - weapon: ". $value["name"];
	$page->show();
}


