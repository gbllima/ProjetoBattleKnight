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

function alliances_list() {
	global $mysql, $page;
	#error_reporting(E_ALL);
	if(isset($_GET["mode"])) {
		switch($_GET["mode"]) {
			case "index": alliances_index(); break;
			default		: alliances_list();
		}
	}
	//page setup
	if(isset($_GET["page"])) {
		$npage = $_GET["page"];
	} else {
		$npage = 1;
	}
	$mysql->sql = "SELECT * FROM alliances ";
	$search_mode = false;
	$search_val = '';
	$search_by = 'name';
	//sort
	if(isset($_GET["sort"])) {
		$arrsort = array("id", "name");
		if(in_array($_GET["sort"], $arrsort)) {
			$order = $_GET["sort"];
		} else {
			$order = "id";
		}
	} else { $order = "id"; }
		
	//search
	if(isset($_POST["search"])) {	
		$search = mysql_real_escape_string($_POST["search"]);
		if($_POST["by"] == "name") {
			$mysql->sql .= " WHERE (name LIKE '%$search%') ORDER BY $order LIMIT ".(($npage-1)*10).",10";
			$search_query = $mysql->query();
		} else {
			$mysql->sql .= " WHERE (name LIKE '%$search%') ORDER BY $order LIMIT ".(($npage-1)*10).",10";
			$search_query = $mysql->query();
		}
		$members = 0;
		$search_mode = true;
		$search_by = $_POST["by"];
		$search_val = $_POST["search"];
		$search_result = $mysql->fetch($search_query);
	} else {
		$mysql->sql .= " ORDER BY $order ASC LIMIT ".(($npage-1)*10).",10";
	}
	$page->content .= "
	<form action='?do=allies-list' method='post'>
	<table>
		<tr>
			<td>Search Alliance</td>
			<td><input type='text' name='search' value='". $search_val ."'></td>
			<td colspan='3'><input type='submit' value='Search!'></td>
		</tr>
		<tr>
			<td>Search By</td>
			<td>". selectBox(array('name' =>'name'), 'by', $search_by) ."</td>
		</tr>
	</table>
	</form>
	<form name='form' action='./?do=delete-ally' method='POST'>
	Mode : <a href='?do=allies-list&mode=index'>Index</a> | Normal || <input type='button' value='Delete Alliance' OnClick=\"delconf('alliances')\">
	<table class='box'>
		<tr>
			<td class='head'><a href='?do=allies-list&sort=id' title='Sort List By Id'>Id</a></td>
			<td class='head'><a href='?do=allies-list&sort=name' title='Sort List By Name'>Name</a></td>
			<td class='head'>Members</td>
			<td class='head'>Home</td>
			<td class='head' align='center'>(X)</td>
		</tr>
	";
	
	if($search_mode) {
		$num_query = mysql_num_rows($search_query);
		if($num_query > 1) {
			foreach($search_result as $search_result) {
			$mysql->sql = "SELECT * FROM users WHERE alliance='". $search_result["id"] ."'";
			$members = mysql_num_rows($mysql->query());
				$page->content .= "
				<tr>
					<td>".$search_result["id"]."</td>
					<td><a href='?do=edit-ally:".$search_result["id"]."'>".$search_result["name"]."</a></td>
					<td>$members</td>
					<td><a href='../profile_view.php?id=".$search_result["id"]."' target='_blank'>View</a></td>
					<td align='center'><input type='checkbox' name='del[]' value='". $search_result["id"] ."'></td>				
				</tr>
				";
			}
		}  elseif($num_query == 0) {
			$page->content .= "<tr>
				<td colspan='4'></td>
			</tr>
			";
		} else {
			$mysql->sql = "SELECT * FROM users WHERE alliance='". $search_result["id"] ."'";
			$members = mysql_num_rows($mysql->query());
			$page->content .= "
			<tr>
				<td>".$search_result["id"]."</td>
				<td><a href='?do=edit-ally:".$search_result["id"]."'>".$search_result["name"]."</a></td>
				<td>$members</td>
				<td><a href='../profile_view.php?id=".$search_result["id"]."' target='_blank'>View</a></td>
					<td align='center'><input type='checkbox' name='del[]' value='". $search_result["id"] ."'></td>				
			</tr>
			";
		}
		$page->content .= success("We've Found ". mysql_num_rows($search_query) ." data(s)");
	} else {
		//Fetch Data From Database
		$query = $mysql->query();
		$num_query = mysql_num_rows($query);

		if($num_query > 1) {
			foreach($mysql->fetch($query) as $value) {
				$mysql->sql = "SELECT * FROM users WHERE alliance='". $value["id"] ."'";
				$members = mysql_num_rows($mysql->query());
				$page->content .= "
				<tr>
					<td>".$value["id"]."</td>
					<td><a href='?do=edit-ally:".$value["id"]."'>".$value["name"]."</a></td>
					<td>$members</td>
					<td><a href='../a_view.php?id=".$value["id"]."' target='_blank'>View</a></td>
					<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] ."'></td>				
				</tr>
				";
			}
		} elseif($num_query == 1) {
			$value = $mysql->fetch($query);
			$mysql->sql = "SELECT * FROM users WHERE alliance='". $value["id"] ."'";
			$members = mysql_num_rows($mysql->query());
			$page->content .= "
			<tr>
				<td>".$value["id"]."</td>
				<td><a href='?do=edit-ally:".$value["id"]."'>".$value["name"]."</a></td>
				<td>$members</td>
				<td><a href='../a_view.php?id=".$value["id"]."' target='_blank'>View</a></td>
				<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] ."'></td>	
			</tr>
			";
		} else {
			$page->content .= "
			<tr>
				<td colspan='4' align='center'>Alliance's Database Empty</td>
			</tr>
			";
		}
	}
	$page->content .= "</table><br/>";
	//Setup page link
	$mysql->sql = "SELECT * FROM alliances ORDER BY id";
	$query = $mysql->query();

	$num_query = mysql_num_rows($query);
	$page_arr = ceil($num_query / 10);

	$page->content .= "<table class='box'><tr><td>Page :";
	for($i = 1; $i <= $page_arr; $i++) {
		
		if( $i == $npage) {
			$page->content .= " $npage |";
		} else {
			$page->content .= " <a href='?do=allies-list&page=". $i ."'>$i</a> |";
		}
	}
	$page->content .= "</td></tr></table></form>";
	$page->title = "Alliances List";
	$page->show();
}

function edit_alliance($id) {
	global $mysql, $page;
		
	//Fetch Data From Database
	$mysql->sql = "SELECT * FROM `alliances` WHERE id='$id' LIMIT 1";
	$query = $mysql->query();
	$value = $mysql->fetch($query);
	
	//Check POST data
	if(isset($_POST["save"])) {
		
		$_POST = array_map("mres_deep", $_POST);
		extract($_POST);
		if(!empty($del)) {
			$countk = count($del);
			foreach($del as $i => $d) {
				if($d == $value["founder"]) {
					$page->message = "Founder Can not be kicked. If you want kick it, change the founder first and then kick it";
					$page->show_error();
				} else {
					a_quit($d);
				}
			}
			$ukicked = " $countk Member(s) of ". $value["name"] ." was kicked.";
		} else {
			$ukicked = "";
		}
		//Insert Data To Database
		$mysql->sql = "UPDATE alliances SET description='$desc'  WHERE id='".$id."'";
		
		$insert = $mysql->query();
		
		if($insert) {
			$page->title = "Success Edit";
			$page->content .= success("<p>Success Edit ". $value["name"] ." Alliance Data! $ukicked<br/><br/><a href='".$_SERVER["REQUEST_URI"]."'>Click Here</a> To continue Edit alliance</p>");
		} else {
			$page->title = "Failed Edit";
			$page->content .= fail("Failed Edit alliance. <a href=\"javascript:history.go(-1);\">Go Back</a></center> And Try Again");
		}
			$page->show();
	}
	//Setup Alliance's Name
	$name = inputtext("name", $value["name"], "10");
	
	//Setup Alliance's Founder
	$user = user($value["founder"]);
	$founder = "<a href='./?do=edit-user:$user[0]'>$user[1]</a> - ".inputtext("founder", $value["founder"], "1");
	
	//Setup Alliance's Member
	$mysql->sql = "SELECT * FROM users WHERE alliance = '". $value["id"] ."'";
	$query = $mysql->query();
	$member = "<tr>
			<td class='head'>Id</td>
			<td class='head'>Name</td>
			<td class='head'>Rank</td>
			<td class='head'>Kick</td>
		  </tr>";
	$countm = mysql_num_rows($query);
	if($countm > 1) {
		foreach($mysql->fetch($query) as $mi => $md) {
			if(empty($md["rank"])) {
				$md["rank"] = "-";
			}
			$member .= "<tr><td>". $md["id"] ."</td><td><a href='./?do=edit-user:". $md["id"] ."'>". $md["name"] ."</a></td><td>". $md["rank"] ."<td><input type='checkbox' name='del[]' value='". $md["id"] ."'></td></tr>";	
		}
	} else {
		$md = $mysql->fetch($query);
		if(empty($md["rank"])) {
			$md["rank"] = "-";
		}
		$member .= "<tr><td>". $md["id"] ."</td><td><a href='./?do=edit-user:". $md["id"] ."'>". $md["name"] ."</a></td><td>". $md["rank"] ."<td><input type='checkbox' name='del[]' value='". $md["id"] ."'></td></tr>";	
	}		
	
	//Setup Alliance's Pacts
	$mysql->sql = "SELECT * FROM pacts WHERE a1 = '". $value["id"] ."'";
	$query = $mysql->query();
	$pact = "<tr>
			<td class='head'>Type</td>
			<td class='head'>With Alliance</td>
		  </tr>";
	$countp = mysql_num_rows($query);
	if($countp > 1) {
		foreach($mysql->fetch($query) as $pi => $pd) {
			if($pd["type"] == "0") {
				$pt = "Peace";
			} else {
				$pt = "War";
			}
			$alliancep = alliance($pd["a2"]);
			$pact .= "<tr><td>$pt</td><td><a href='./?do=edit-ally:". $pd["a2"] ."'>". $alliancep[1] ."</a></td></tr>";	
		}
	} elseif($countp == 1) {
		$pd = $mysql->fetch($query);
			if($pd["type"] == "0") {
				$pt = "Peace";
			} else {
				$pt = "War";
			}
			$alliancep = alliance($pd["a2"]);
		$pact .= "<tr><td>$pt</td><td><a href='./?do=edit-ally:". $pd["a2"] ."'>".  $alliancep[1] ."</a></td></tr>";	
	} else {
		$countp = "1";
		$pact = "<tr><td>This alliance don't have any pact</td></tr>";
	}
	
	//Setup Template's Variables
	$tpl_var = array("id" => $value["id"],
			 "founder" => $founder,
			 "name" => $name,
			 "members" => $member,
			 "countm" => $countm+2,
			 "countp" => $countp+2,
			 "pacts" => $pact,
			 "desc" => $value["description"],
			 );
	//Load Table		 
	$page->content .= $page->template("other/alliance_edit", $tpl_var);
	$page->title = "Edit - Alliance: ". $value["name"];
	$page->show();
}
function alliances_index() {
	global $page, $mysql;
	
	$index = array (
	'a','b','c','d','e','f','g','h',
	'i','j','k','l','m','n','o','p',
	'q','r','s','t','u','v','w','x',
	'y','z','0','1','2','3','4','5',
	'6','7','8','9'
	);

	$index2 = array();
	$mysql->sql = "SELECT LEFT(name, 1) as I FROM alliances GROUP BY I";
	$query = $mysql->query();
	
	while($data = mysql_fetch_assoc($query)) {
		$index2[] = strtolower($data["I"]);	
	}

	$page->content .= "
	<form action='?do=allies-list' method='post'>
	<table>
		<tr>
			<td>Search Alliance</td>
			<td><input type='text' name='search' value=''></td>
			<td colspan='3'><input type='submit' value='Search!'></td>
		</tr>
		<tr>
			<td>Search By</td>
			<td>". selectBox(array('name' =>'name', 'email' => 'email'), 'by','') ."</td>
		</tr>
	</table>
	</form>
	Mode : Index | <a href='?do=allies-list'>Normal</a><br/><br/>
	";
	$page->content .= "<center><table class='box'><tr>";
	foreach ($index as $key => $val) {
		if (isset($_GET['index']) && $_GET['index'] == $val) {
			$page->content .= '<td class="now">'.strtoupper($val).'</td>';
		} elseif (in_array($val,$index2)) {
			$page->content .= '<td class="av"><a href="?do=allies-list&mode=index&index='.$val.'">'.strtoupper($val).'</a></td>';
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
		$mysql->sql = "SELECT * FROM alliances WHERE LEFT(name,1) = '$index' OR LEFT(name,1) = '". strtoupper($index) ."' GROUP BY name";
		$query = $mysql->query();
		$data_f = $mysql->fetch($query);
		
		$page->content .='<h2>'.strtoupper($index).'</h2>';
			$page->content .= "<table class='box'>
			<tr>
				<td class='head'>Id</td>
				<td class='head'>Name</td>
				<td class='head'>Member</td>
				<td class='head' width='15%'>Home</td>

			</tr>
		";
		if(mysql_num_rows($query) > 1) {
			foreach($data_f as $data) {
			$mysql->sql = "SELECT COUNT(*) as num FROM users WHERE alliance = '". $data["id"] ."'";
			$count = $mysql->fetch($mysql->query());
			$page->content .= "
			<tr>
				<td>".$data["id"]."</td>
				<td><a href='?do=edit-ally:".$data["id"]."'>".stripslashes($data["name"])."</a></td>
				<td>". $count["num"] ."</td>
				<td><a href='../a_view.php?id=". $data["id"] ."'>View</a></td>
			</tr>
			";
			}
		} else {

			$data = $data_f;
			$mysql->sql = "SELECT COUNT(*) as num FROM users WHERE alliance = '". $data["id"] ."'";
			$count = $mysql->fetch($mysql->query());
			$page->content .= "
			<tr>
				<td>".$data["id"]."</td>
				<td><a href='?do=edit-ally:".$data["id"]."'>".stripslashes($data["name"])."</a></td>
				<td>". $count["num"] ."</td>
				<td><a href='../a_view.php?id=". $data["id"] ."'>View</a></td>
			</tr>
			";
		}
		$page->content .= '</table>';
	} else {
		$page->content .= '<div class="grey"><center>Click the alphabet for view the alliance\'s name begin with that alphabet</center></div>';
	}
		$page->title = "Alliances Index";
		$page->show();

}

function delete_alliances() {
	global $page;
	//Receive the data from 'alliances-list'

	if(isset($_POST["del"])) {
		
		foreach($_POST["del"] as $i => $d) {
				
			a_del($d);

		}
		$page->content .= "The alliances was deleted. Back to <a href='./?do=allies-list'>Alliances List</a>";
		$page->show();
	} else {

		$page->content .= fail("No any alliances was deleted. Back to <a href='./?do=allies-list'>Alliances list</a>");
		$page->title = "Delete alliances management";
		$page->show();
	}

}
?>
