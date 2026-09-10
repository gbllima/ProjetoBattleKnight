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

function towns_list() {
	global $mysql, $page;
	#error_reporting(E_ALL);
	if(isset($_GET["mode"])) {
		switch($_GET["mode"]) {
			case "index": towns_index(); break;
			default		: towns_list();
		}
	}
	//page setup
	if(isset($_GET["page"])) {
		$npage = $_GET["page"];
	} else {
		$npage = 1;
	}
	//Sort
	if(isset($_GET["sort"])) {
		$arrsort = array("id", "name", "owner");
		if(in_array($_GET["sort"], $arrsort)) {
			$order = $_GET["sort"];
		} else {
			$order = "id";
		}
	} else { $order = "id"; }
		
	$mysql->sql = "SELECT * FROM towns ";
	$search_mode = false;
	$search_val = '';
	$search_by = 'townname';
	if(isset($_POST["search"])) {	
		$search = mysql_real_escape_string($_POST["search"]);
		if($_POST["by"] == "population") {
			$mysql->sql .= "WHERE population = '$search' ORDER BY $order LIMIT ".(($npage-1)*10).", 10";
			$search_query = $mysql->query();
		} elseif($_POST["by"] == "name") {
			$mysql->sql .= "WHERE (name LIKE '%$search%') ORDER BY $order LIMIT ".(($npage-1)*10).", 10";
			$search_query = $mysql->query();
		} else {
			$mysql->sql .= "WHERE (name LIKE '%$search%') ORDER BY $order LIMIT ".(($npage-1)*10).", 10";
			$search_query = $mysql->query();
		}
		$search_mode = true;
		$search_by = $_POST["by"];
		$search_val = $_POST["search"];
		$search_result = $mysql->fetch($search_query);
	} else {
		$mysql->sql .= "ORDER BY $order LIMIT ".(($npage-1)*10).", 10";
	}
	
	$page->content .= "
	<form action='?do=towns-list' method='post'>
	<table>
		<tr>
			<td>Search Town</td>
			<td><input type='text' name='search' value='". $search_val ."'></td>
			<td colspan='3'><input type='submit' value='Search!'></td>
		</tr>
		<tr>
			<td>Search By</td>
			<td>". selectBox(array('name' =>'name', 'population' => 'population'), 'by',$search_by) ."</td>
		</tr>
	</table>
	</form>
	<form name='form' action='./?do=delete-town' method='POST'>
	Mode : <a href='?do=towns-list&mode=index'>Index</a> | Normal || <input type='button' value='Delete Town' OnClick=\"delconf('towns')\">
	<table class='box'>
		<tr>
			<td class='head'><a href='?do=towns-list&sort=id' title='Sort List By Id'>Id</a></td>
			<td class='head'><a href='?do=towns-list&sort=name' title='Sort List By Id'>Name</a></td>
			<td class='head'><a href='?do=towns-list&sort=owner' title='Sort List By Owner'>Owner</a></td>
			<td class='head'>Cord.</td>
			<td class='head' align='center'>(x)</td>
		</tr>
	";
	
	if($search_mode) {
		//Fetch Data From Database
		$num_query = mysql_num_rows($search_query);
		if($num_query > 1) {
			foreach($search_result as $value) {
				$user = user($value["owner"]);
				$cord = town_xy($value["id"]);
				$page->content .= "
				<tr>
					<td>".$value["id"]."</td>
					<td><a href='?do=edit-town:".$value["id"]."' >".stripslashes($value["name"])."</a></td>
					<td><a href='?do=edit-user:". $value["owner"] ."' target='_blank'>".$user[1]."</a></td>
					<td><a href='../map.php?x=".$cord[0]."&y=".$cord[1]."' target='_blank'>". $cord[0]." - ".$cord[1] ."</a></td>
					<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] ."'></td>
				</tr>
				";
			}
		}  elseif($num_query == 0) {
			$page->content .= "<tr>
				<td colspan='5'></td>
			</tr>
			";
		} else {
			$user = user($search_result["owner"]);
			$cord = town_xy($search_result["id"]);
			$page->content .= "
			<tr>
				<td>".$search_result["id"]."</td>
				<td><a href='?do=edit-town:".$search_result["id"]."'>".stripslashes($search_result["name"])."</a></td>
				<td><a href='?do=edit-user:". $search_result["owner"] ."' target='_blank'>".$user[1]."</a></td>
				<td><a href='../map.php?x=".$cord[0]."&y=".$cord[1]."' target='_blank'>". $cord[0]." - ".$cord[1] ."</a></td>
				<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] ."'></td>
			</tr>
			";
		}
		$page->content .= success("We've Found ". mysql_num_rows($search_query) ." data(s)");
	} else {
		//Fetch Data From Database
		$query = $mysql->query();
		if(mysql_num_rows($query) > 1) {
			foreach($mysql->fetch($query) as $value) {
				$user = user($value["owner"]);
				$cord = town_xy($value["id"]);
				$page->content .= "
				<tr>
					<td>".$value["id"]."</td>
					<td><a href='?do=edit-town:".$value["id"]."' >".stripslashes($value["name"])."</a></td>
					<td><a href='?do=edit-user:". $value["owner"] ."' target='_blank'>".$user[1]."</a></td>
					<td><a href='../map.php?x=".$cord[0]."&y=".$cord[1]."' target='_blank'>". $cord[0]." - ".$cord[1] ."</a></td>
					<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] ."'></td>
				</tr>
				";
			}
		} elseif(mysql_num_rows($query) == 0) {
			$page->content .= "
			<tr>
				<td colspan='4' align='center'>Town's Database Empty</td>
			</tr>
			";
		} else {
			$value = $mysql->fetch($query);
			$user = user($value["owner"]);
			$cord = town_xy($value["id"]);
			$page->content .= "
			<tr>
				<td>".$value["id"]."</td>
				<td><a href='?do=edit-town:".$value["id"]."'>".stripslashes($value["name"])."</a></td>
				<td><a href='?do=edit-user:". $value["owner"] ."' target='_blank'>".$user[1]."</a></td>
				<td><a href='../map.php?x=".$cord[0]."&y=".$cord[1]."' target='_blank'>". $cord[0]." - ".$cord[1] ."</a></td>
				<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] ."'></td>
			</tr>
			";
		}
	}
	$page->content .= "</table><br/>";
	//Setup page link
	$mysql->sql = "SELECT * FROM towns ORDER BY id";
	$query = $mysql->query();

	$num_query = mysql_num_rows($query);
	$page_arr = ceil($num_query / 10);

	$page->content .= "<table class='box'><tr><td>Page :";
	for($i = 1; $i <= $page_arr; $i++) {
		
		if( $i == $npage) {
			$page->content .= " $npage |";
		} else {
			$page->content .= " <a href='?do=towns-list&page=". $i ."'>$i</a> |";
		}
	}
	$page->content .= "</td></tr></table></form>";
	$page->title = "Towns List";
	$page->show();
}


function edit_town($id) {
	global $db_id, $page, $log;
	

		
	//Fetch Data From Database
	$query = "SELECT * FROM towns WHERE id='$id' ORDER BY id LIMIT 1";
	$result = mysql_query($query, $db_id);
	$value = mysql_fetch_assoc($result);
	$value["name"] = stripslashes($value["name"]);

	//if save button was clicked, Check POST data
	if(isset($_POST["save"])) {
		
		$_POST = array_map("mres_deep", $_POST);
		extract($_POST);
		$res = implode("-", $res);
		$pro = implode("-", $pro);
		$lim = implode("-", $lim);
		$land = array(	"l0" => implode("-", $l0),
			"l1" => implode("-", $l1),
			"l2" => implode("-", $l2),
			"l3" => implode("-", $l3)
		     );
		$land = implode("/", $land);
		$bd = implode("-", $bd);
		$wps = implode("-", $wps);
		$army = implode("-", $army);

		//UPDATE Database
		$query = "UPDATE towns SET name = '$name', owner = '$owner', population='$pop', land='$land', upkeep='$upk', morale='$morale', weapons='$wps', army='$army', buildings='$bd', resources='$res', limits='$lim', production='$pro', land='$land', general='$general', description='$desc' WHERE id='".$value["id"]."'";
		
		$insert = mysql_query($query, $db_id);
		//die(mysql_error()."<br/>".$query);
		if($insert) {
			//Write Log
			$log->msg = "Success edit towns";
			$log->writeLog();
			
			$page->title = "Success Edit";
			$page->content .= success("Success Edit Town! <a href='".$_SERVER["REQUEST_URI"]."'>Click Here</a> To continue Edit town");
		} else {
			$page->title = "Failed Edit";
			$page->content .= fail("Failed Edit Town. <a href=\"javascript:history.go(-1);\">Go Back</a></center> And Try Again");
		}
			$page->show();
	}
	//End Check POST data
	

	$res = explode("-", $value["resources"]);
	$pro = explode("-", $value["production"]);
	$lim = explode("-", $value["limits"]);

	$lnd = explode("/", $value["land"]);
	$bd = explode("-", $value["buildings"]);
	$wp = explode("-", $value["weapons"]);
	$unt = explode("-", $value["army"]);
	
	//Setup Town's Name

	$name = inputtext("name", $value["name"], "25");
	
	//Setup Town's Owner
	$owner = user($value["owner"]);
	$owner = "<a href='./?do=edit-user:$owner[0]'>$owner[1]</a> - ". inputtext("owner", $value["owner"], "2");
		
	//Setup Town's Population
	$pop = inputtext("pop", $value["population"], "5");
	
	//Setup Town's Upkeep
	$upk = inputtext("upk", $value["upkeep"], "5");
	
	//Setup Town's Morale
	$morale = inputtext("morale", $value["morale"], "5");	
	
	//Setup Town's General
	$general = inputtext("general", $value["general"], "15");	
	
	//Setup Town's Water/ Sea
	if($value["water"]) {
		$water = "Available";
	} else {
		$water = "Negative";
	}

	//Setup Town's Last Check
	$lastcheck = date("d M Y, H:i:s", strtotime($value["lastCheck"]));
				
	//Setup Town's Building
	$buildings = "<table><tr>";
	foreach($bd as $index_b => $building){
		$buildings .= "<td align='center'><img src='../default/1/b$index_b.png' width='30px' height='45px'><br>". inputtext("bd[]", $building, "1") ."</td>";
		if($index_b == "10" || $index_b == "21") {
			$buildings .= "<tr/><tr>";
		}
	}
	$buildings .= "</tr></table>";

	//Setup Town's Weapon
	$weapons = "<table><tr>";
	foreach($wp as $index_w => $weapon){
		$weapons .= "<td align='center'><img src='../default/1/1$index_w.gif' width='35px' height='34px'><br>". inputtext("wps[]", $weapon, "1") ."</td>";
		if($index_w == "10" || $index_w == "21") {
			$weapons .= "<tr/><tr>";
		}
	}
	$weapons .= "</tr></table>";

	//Setup Town's Army
	$units = "<table><tr>";
	foreach($unt as $index_u => $unit){
		$units .= "<td align='center'><img src='../default/1/2$index_u.gif' width='29px' height='34px'><br>". inputtext("army[]", $unit, "1") ."</td>";
		if($index_u == "12" || $index_u == "21") {
			$units .= "<tr/><tr>";
		}
	}
	$units .= "</tr></table>";
	//Setup Town's Land
	$land = "";
	foreach($lnd as $li => $ld) {
		$ld = explode("-", $ld);
		$land .= "<tr><td><img src='../default/1/0$li.gif'></td><td>";
		foreach($ld as $li2 =>$ld2) {
			$land .= inputtext("l".$li."[]", $ld2, "1") ." | ";
		}
		$land .= "</td></tr>";
	}
	
	//Setup Town's Resources
	//owned resources
	$resources = "<table>";
	$resources .=  "<tr><td colspan='2'>Owned</td></tr>";
	foreach($res as $index_r => $resource){
		$resources .= "<tr><td align='center'><img src='../default/1/0$index_r.gif'></td><td>". inputtext("res[]", $resource, "10") ."</td></tr>";
	}
	$resources .= "</table>";
	
	//resources production
	$productions = "<table>";
	$productions .=  "<tr><td colspan='2'>Production</td></tr>";
	foreach($pro as $index_p => $production){
		$productions .= "<tr><td align='center'><img src='../default/1/0$index_p.gif'></td><td>". inputtext("pro[]", $production, "10") ."</td></tr>";
	}
	$productions .= "</table>";
		
	//storage capacity
	$limits = "<table>";
	$limits .= "<tr><td colspan='2'>Storage Capacity</td></tr>";
	$limits .= "<tr><td align='center'><img src='../default/1/00.gif'></td><td>". inputtext("lim[]", $lim[0], "10") ."</td></tr>";
	$limits .= "<tr><td align='center'><img src='../default/1/01.gif'><br/><img src='../default/1/02.gif'><br/><img src='../default/1/03.gif'></td><td><br/>". inputtext("lim[]", $lim[1], "10") ."</td></tr>";
	$limits .= "<tr><td align='center'><img src='../default/1/04.gif'></td><td>". inputtext("lim[]", $lim[2], "10") ."</td></tr>";
	$limits .= "</table>";
	
	//Misc Limit Setup
	$mlim = "<tr><td colspan='2'>House Space</td><td>". inputtext("lim[]", $lim[3], "5")."</td></tr>";
	$mlim .= "<tr><td colspan='2'>Construction Speed</td><td>". inputtext("lim[]", $lim[4], "5")."</td></tr>";
	$mlim .= "<tr><td colspan='2'>Cache Capacity</td><td>". inputtext("lim[]", $lim[5], "5")."</td></tr>";
	$mlim .= "<tr><td colspan='2'>Wall Defense</td><td>". inputtext("lim[]", $lim[6], "5")."</td></tr>";
	$mlim .= "<tr><td colspan='2'>Tower Offense</td><td>". inputtext("lim[]", $lim[7], "5")."</td></tr>";
	$mlim .= "<tr><td colspan='2'>Barrack Speed Production</td><td>". inputtext("lim[]", $lim[8], "5")."</td></tr>";
	$mlim .= "<tr><td colspan='2'>Warshop Speed Production</td><td>". inputtext("lim[]", $lim[9], "5")."</td></tr>";
	$mlim .= "<tr><td colspan='2'>Stable Speed Breed</td><td>". inputtext("lim[]", $lim[10], "5")."</td></tr>";	
	$mlim .= "<tr><td colspan='2'>SiegeShop Speed Production</td><td>". inputtext("lim[]", $lim[11], "5")."</td></tr>";	
	$mlim .= "<tr><td colspan='2'>WarStorage Space</td><td>". inputtext("lim[]", $lim[12], "5")."</td></tr>";	
			
	//Make Table
	
	//Setup Template's Variables
	$tpl_var = array("id" => $value["id"],
			 "pop" => $pop,
			 "name" => $name,
			 "owner" => $owner,
			 "upk" => $upk,
			 "morale" => $morale,
			 "weapons" => $weapons,
			 "army" => $units,
			 "buildings" => $buildings,
			 "resources" => $resources,
			 "productions" => $productions,
			 "limits" => $limits,
			 "desc" => stripslashes($value["description"]),
			 "ws" => $water,
			 "general" => $general,
			 "lastcheck" => $lastcheck,
			 "land" => $land,
			 "mlim" => $mlim
			 );
	//Load Table		 
	$page->content .= $page->template("other/town_edit", $tpl_var);
	$page->title = "Edit - Town: ". $value["name"];
	$page->show();
}

function towns_index() {
	global $page, $mysql;
	
	$index = array (
	'a','b','c','d','e','f','g','h',
	'i','j','k','l','m','n','o','p',
	'q','r','s','t','u','v','w','x',
	'y','z','0','1','2','3','4','5',
	'6','7','8','9'
	);

	$index2 = array();
	$mysql->sql = "SELECT LEFT(name, 1) as I FROM towns GROUP BY I";
	$query = $mysql->query();
	
	while($data = mysql_fetch_assoc($query)) {
		$index2[] = strtolower($data["I"]);	
	}

	$page->content .= "
	<form action='?do=towns-list' method='post'>
	<table>
		<tr>
			<td>Search Town</td>
			<td><input type='text' name='search' value=''></td>
			<td colspan='3'><input type='submit' value='Search!'></td>
		</tr>
		<tr>
			<td>Search By</td>
			<td>". selectBox(array('name' =>'name', 'population' => 'population'), 'by','') ."</td>
		</tr>
	</table>
	</form>
	Mode : Index | <a href='?do=towns-list'>Normal</a><br/><br/>
	";
	$page->content .= "<center><table class='box'><tr>";
	foreach ($index as $key => $val) {
		if (isset($_GET['index']) && $_GET['index'] == $val) {
			$page->content .= '<td class="now">'.strtoupper($val).'</td>';
		} elseif (in_array($val,$index2)) {
			$page->content .= '<td class="av"><a href="?do=towns-list&mode=index&index='.$val.'">'.strtoupper($val).'</a></td>';
		} else {
			$page->content .= '<td class="list">'.strtoupper($val).'</td>';	
		}
		if ($key == 17 || $key == 35) {
			$page->content .= '</tr><tr>';
		}

	}
	$page->content .= '</tr></table></center>';

	
	if (isset($_GET['index'])) {
		//Lets Get It
		$index = substr($_GET['index'],0,1);
		$mysql->sql = "SELECT * FROM towns WHERE LEFT(name,1) = '$index' OR LEFT(name,1) = '". strtoupper($index) ."' GROUP BY name";
		$query = $mysql->query();
		$data_f = $mysql->fetch($query);
		
		$page->content .="<h2>". strtoupper($index) ."</h2>";		
		$page->content .= "
			<table class='box'>
			<tr>
				<td class='head'>Id</td>
				<td class='head'>Name</td>
				<td class='head'>Owner</td>
				<td class='head'>Coord.</td>
			</tr>
			";
		if(mysql_num_rows($query) > 1) {
			foreach($data_f as $data) {
			$user = user($data["owner"]);
			$cord = town_xy($data["id"]);
			$page->content .= "
			<tr>
				<td>".$data["id"]."</td>
				<td><a href='?do=edit-town:".$data["id"]."'>".stripslashes($data["name"])."</a></td>
				<td><a href='?do=edit-user:". $data["owner"] ."' target='_blank'>".$user[1]."</a></td>
				<td><a href='../map.php?x=".$cord[0]."&y=".$cord[1]."' target='_blank'>". $cord[0]." - ".$cord[1] ."</a></td>
			</tr>
			";
			}
		} else {
			$value = $data_f;
			$user = user($value["owner"]);
			$cord = town_xy($value["id"]);
			$page->content .= "
			<tr>
				<td>".$value["id"]."</td>
				<td><a href='?do=edit-town:".$value["id"]."'>".stripslashes($value["name"])."</a></td>
				<td><a href='?do=edit-user:". $value["owner"] ."' target='_blank'>".$user[1]."</a></td>
				<td><a href='../map.php?x=".$cord[0]."&y=".$cord[1]."' target='_blank'>". $cord[0]." - ".$cord[1] ."</a></td>
			</tr>
			";
		}
		$page->content .= '</table>';
	} else {
		$page->content .= '<div class="grey"><center>Click the alphabet for view the town\'s name begin with that alphabet</center></div>';
	}
		$page->title = "Town Index";
		$page->show();

}

function delete_towns() {
	global $page;
	//Receive the data from 'towns-list'

	if(isset($_POST["del"])) {
		
		foreach($_POST["del"] as $i => $d) {
				
			purge($d);

		}
		$page->content .= "The towns was deleted. Back to <a href='./?do=towns-list'>Towns List</a>";
		$page->show();
	} else {

		$page->content .= fail("No any towns was deleted. Back to <a href='./?do=towns-list'>Towns list</a>");
		$page->title = "Delete towns management";
		$page->show();
	}

}
?>
