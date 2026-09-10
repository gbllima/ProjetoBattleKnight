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

function buildings_list() {
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
	$mysql->sql = "SELECT * FROM buildings ";


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
				$faction .= "| <a href='./?do=buildings&faction=$f_data[0]'>$f_data[1]</a> ";
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
			<td class='head' width='4%'><a href='?do=buildings&sort=type$pguri' title='Sort List By type'>type</a></td>
			<td class='head' width='45px'></td>
			<td class='head' width='85%'><a href='?do=buildings&sort=name$pguri' title='Sort List By Name'>Name</a></td>
		</tr>
	";
	
	//Fetch Data From Database
	$query = $mysql->query();
	$num_query = mysql_num_rows($query);
	
	if($num_query > 1) {
		foreach($mysql->fetch($query) as $value) {
			$page->content .= "
			<tr>
				<td>".$value["type"]."</td>
				<td class='left' align='center'><img src='../default/1/b".$value["type"].".png' width='30px' height='35px'></td>
				<td><a href='?do=edit-bd:$where-".$value["type"]."'>".$value["name"]."</a></td>
			</tr>
			";
		}
	} elseif($num_query == 1) {
		$value = $mysql->fetch($query);
		$page->content .= "
		<tr>
			<td>".$value["type"]."</td>
			<td class='left'><img src='../default/1/b".$value["type"].".png' width='20px' height='25px'></td>
			<td><a href='?do=edit-bd:$where-".$value["type"]."'>".$value["name"]."</a></td>
		</tr>
		";
	} else {
		$page->content .= "
		<tr>
			<td colspan='4' align='center'>Building's Database Empty</td>
		</tr>
		";
	}
	
	$page->content .= "</table><br/>";
	
	//Setup Page Number's Link
	$mysql->sql = "SELECT * FROM buildings WHERE faction = '$where' ORDER BY type";
	$query = $mysql->query();

	$num_query = mysql_num_rows($query);
	$page_arr = ceil($num_query / 10);

	$page->content .= "<table class='box'><tr><td>Page :";
	for($i = 1; $i <= $page_arr; $i++) {
		
		if( $i == $npage) {
			$page->content .= " $npage |";
		} else {
			$page->content .= " <a href='?do=buildings$furi$orduri&page=". $i ."'>$i</a> |";
		}
	}
	$page->content .= "</td></tr></table>";
	$page->title = "Buildings Customization";
	$page->show();
}

function edit_building($type) {
	global $mysql, $page;
	
	$type = explode("-", $type);
	//Fetch Data From Database
	$mysql->sql = "SELECT * FROM buildings WHERE type = '$type[1]' AND faction = '$type[0]' LIMIT 1";
	$query = $mysql->query();
	$value = $mysql->fetch($query);
	
	//Check POST data
	if(isset($_POST["save"])) {
		
		$_POST = array_map("mres_deep", $_POST);
		extract($_POST);
		
		//Prepare Data
		if(isset($name1)) {
			$names = $name."-".$name1;
		} else {
			$names = $name;
		}
		$outputs = implode("-", $output);
		$inputs = implode("-", $input);
		$upks = implode("-", $upk);
		$durs = implode("-", $dur);
		
		//Insert Data To Database
		$mysql->sql = "UPDATE buildings SET name = '$names', requirements = '$req', output = '$outputs', input = '$inputs', upkeep = '$upks', duration = '$durs', description = '$desc'  WHERE type = '$type[1]' AND faction = '$type[0]'";
		
		$insert = $mysql->query();
		
		if($insert) {
			$page->title = "Success Edit";
			$page->content .= success("Success Edit Building! <a href='".$_SERVER["REQUEST_URI"]."'>Click here</a> to continue edit building.");
		} else {
			$page->title = "Failed Edit";
			$page->content .= fail("Failed Edit Buildings. <a href=\"javascript:history.go(-1);\">Go Back</a></center> And Try Again");
		}
			$page->show();
	}
	//Setup Name
	$name = explode("-", $value["name"]);
	if(isset($name[1])) {
		$n = "<input type='text' value='$name[0]' name='name'>, Make : <input type='text' name='name1' value='$name[1]'>";
	} else {
		$n = "<input type='text' value='$name[0]' name='name'>";
	}
	
	//Setup Requirement(s)
	
	if(!empty($value["requirements"])) {
		$req = "<table><tr>";
		$r = explode("/",$value["requirements"]);
		foreach($r as $ri => $rd) {
			$rd0 = explode("-", $rd);
			$req .= "<td><img src='../default/1/b".$rd0[0].".png' width='30px' height='55px'><br>Level $rd0[1]</td>";
		}
		$req .= "</tr></table><br/>Edit Requirements :".inputtext("req", $value["requirements"], "30");
	} else {
		$req = "none<br/>Add Some requirement ? : ".inputtext("req", $value["requirements"], "10");
	}
	
	//Setup Input Resources
	$resources = explode("-", $value["input"]);
	$res = "";
	foreach($resources as $ri => $rd) {
		$res .= "<img src='../default/1/0$ri.gif' width='23px' height='18px'>". inputtext("input[]", $rd, "3") ." |";
	}
	
	//Setup Output Resources
	$outputs = explode("-", $value["output"]);
	$out = "";
	$arr_sum = count($outputs);
	foreach($outputs as $oi => $od) {
		$out .= "<tr><td>level ".($oi+1)."</td><td>". inputtext("output[]", $od, "3") ."</td></tr>";
	}
	
	//Setup Duration
	$durations = explode("-", $value["duration"]);
	$dur = "";
	$arr_sum = count($durations);
	foreach($durations as $di => $dd) {
		$dur .= "<tr><td>level ".($di+1)."</td><td>". inputtext("dur[]", $dd, "3") ."</td></tr>";

	}

	//Setup Upkeep
	$upkeeps = explode("-", $value["upkeep"]);
	$upk = "";
	$arr_sum = count($upkeeps);
	foreach($upkeeps as $ui => $ud) {
		$upk .= "<tr><td>level ".($ui+1)."</td><td>". inputtext("upk[]", $ud, "3") ."</td></tr>";
	}	
	
	//Setup Template's Variables
	$tpl_var = array("type" => $value["type"],
			 "faction" => $value["faction"],
			 "name" => $n,
			 "req" => $req,
			 "res" => $res,
			 "out" => $out,
			 "desc" => $value["description"],
			 "dur" => $dur,
			 "upk" => $upk
			 );
	//Load Table		 
	$page->content .= $page->template("other/building_edit", $tpl_var);
	$page->title = "Edit - ". $value["name"];
	$page->show();
}


