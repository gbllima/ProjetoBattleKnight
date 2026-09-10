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

function users_list() {
	global $mysql, $page;
	#error_reporting(E_ALL);
	if(isset($_GET["mode"])) {
		switch($_GET["mode"]) {
			case "index": users_index(); break;
			default		: users_list();
		}
	}
	//page setup
	if(isset($_GET["page"])) {
		$npage = $_GET["page"];
	} else {
		$npage = 1;
	}
	$mysql->sql = "SELECT * FROM users ";
	$search_mode = false;
	$search_val = '';
	$search_by = 'username';
	//sort
	if(isset($_GET["sort"])) {
		$arrsort = array("id", "name", "email", "level");
		if(in_array($_GET["sort"], $arrsort)) {
			$order = $_GET["sort"];
		} else {
			$order = "id";
		}
	} else { $order = "id"; }
		
	//search
	if(isset($_POST["search"])) {	
		$search = mysql_real_escape_string($_POST["search"]);
		if($_POST["by"] == "email") {
			$mysql->sql .= " WHERE (email LIKE '$search') ORDER BY $order LIMIT ".(($npage-1)*10).",10";
			$search_query = $mysql->query();
		} elseif($_POST["by"] == "username") {
			$mysql->sql .= " WHERE (name LIKE '%$search%') ORDER BY $order LIMIT ".(($npage-1)*10).",10";
			$search_query = $mysql->query();
		} else {
			$mysql->sql .= " WHERE (name LIKE '%$search%') ORDER BY $order LIMIT ".(($npage-1)*10).",10";
			$search_query = $mysql->query();
		}
		$search_mode = true;
		$search_by = $_POST["by"];
		$search_val = $_POST["search"];
		$search_result = $mysql->fetch($search_query);
	} else {
		$mysql->sql .= " ORDER BY $order ASC LIMIT ".(($npage-1)*10).",10";
	}
	$page->content .= "
	<form action='?do=users-list' method='post'>
	<table>
		<tr>
			<td>Search User</td>
			<td><input type='text' name='search' value='". $search_val ."'></td>
			<td colspan='3'><input type='submit' value='Search!'></td>
		</tr>
		<tr>
			<td>Search By</td>
			<td>". selectBox(array('username' =>'username', 'email' => 'email'), 'by',$search_by) ."</td>
		</tr>
	</table>
	</form>	<form name='form' action = './?do=delete-user' method='POST'>
	Mode : <a href='?do=users-list&mode=index'>Index</a> | Normal || 
	<a href='?do=create-user' title='Create a new User !!'><button>Create New User</button></a> <input type='button' value='Delete User' OnClick=\"delconf('users')\">
	
	<table class='box'>
		<tr>
			<td class='head'><a href='?do=users-list&sort=id' title='Sort List By Id'>Id</a></td>
			<td class='head'><a href='?do=users-list&sort=name' title='Sort List By Name'>Name</a></td>
			<td class='head'><a href='?do=users-list&sort=email' title='Sort List By Email'>Email</a></td>
			<td class='head'><a href='?do=users-list&sort=level' title='Sort List By Level'>Level</a></td>
			<td class='head' align='center'>(x)</td>
		</tr>
	";
	
	if($search_mode) {
		$num_query = mysql_num_rows($search_query);
		if($num_query > 1) {
			foreach($search_result as $search_result) {
				$page->content .= "
				<tr>
					<td>".$search_result["id"]."</td>
					<td><a href='?do=edit-user:".$search_result["id"]."'>".$search_result["name"]."</a></td>
					<td>".$search_result["email"]."</td>
					<td>".$search_result["level"]."</td>
					<td align='center'><input type='checkbox' name='del[]' value='". $search_result["id"] .":". $search_result["level"] ."'></td>			
				</tr>
				";
			}
		} elseif($num_query == 0) {
			$page->content .= "<tr>
				<td colspan='5'></td>
			</tr>
			";
		} else {
			$page->content .= "
			<tr>
	
				<td>".$search_result["id"]."</td>
				<td><a href='?do=edit-user:".$search_result["id"]."'>".$search_result["name"]."</a></td>
				<td>".$search_result["email"]."</td>
				<td>".$search_result["level"]."</td>
				<td align='center'><input type='checkbox' name='del[]' value='". $search_result["id"] .":". $search_result["level"] ."'></td>
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
				$page->content .= "
				<tr>

					<td>".$value["id"]."</td>
					<td><a href='?do=edit-user:".$value["id"]."'>".$value["name"]."</a></td>
					<td>".$value["email"]."</td>
					<td>".$value["level"]."</td>
					<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] .":". $value["level"] ."'></td>
					</tr>
				";
			}
		} else {
			$value = $mysql->fetch($query);
			$page->content .= "
			<tr>

				<td>".$value["id"]."</td>
				<td><a href='?do=edit-user:".$value["id"]."'>".$value["name"]."</a></td>
				<td>".$value["email"]."</td>
				<td>".$value["level"]."</td>
				<td align='center'><input type='checkbox' name='del[]' value='". $value["id"] .":". $value["level"] ."'></td>
			</tr>
			";
		}
	}
	$page->content .= "</table><br/><table class='box'>";
	//Setup page link
	$mysql->sql = "SELECT * FROM users ORDER BY id";
	$query = $mysql->query();

	$num_query = mysql_num_rows($query);
	$page_arr = ceil($num_query / 10);

	$page->content .= "<tr><td>Page :";
	for($i = 1; $i <= $page_arr; $i++) {
		
		if( $i == $npage) {
			$page->content .= " $npage |";
		} else {
			$page->content .= " <a href='?do=users-list&page=". $i ."'>$i</a> |";
		}
	}
	$page->content .= "</td></tr></table></form>";
	$page->title = "Users List";
	$page->show();
}

function edit_user($id) {
	global $mysql, $page, $log;
		
	//Fetch Data From Database
	$mysql->sql = "SELECT * FROM `users` WHERE id='$id' LIMIT 1";
	$query = $mysql->query();
	$value = $mysql->fetch($query);
	//Check POST data
	if(isset($_POST["save"])) {

		//check for password
		if(!empty($_POST["oldpass"])) {
			if(md5($_POST["oldpass"]) == $value["pass"]) {
				if($_POST["newpass"] == $_POST["repass"]) {
					$_POST["pass"] = md5($_POST["newpass"]);
				} else {
					$page->message = "The New Pass With ReType Pass Not Same !";
					$page->show_error();
				}
			} else {
				$page->message = "The Old Pass Wrong !";
				$page->show_error();
			}
		} else {
			$_POST["pass"] = $value["pass"];
		}
		$_POST = array_map("mysql_real_escape_string", $_POST);
		extract($_POST);
		
		//Check, The Admin Can't Modify Super Admin
		if($_SESSION["user"][4] == "4" && ($level == "5" || $level == "4")) {
			//Write Log
			$log->msg = "Attempt to modify super admin/another admin level!";
			$log->writeLog();
			
			$page->content = fail("Failed Edit User. Reason : You can't modify super admin account !");
			$page->title = "Failed Edit User";
			$page->show();
		}
		
		//Insert Data To Database
		$mysql->sql = "UPDATE users SET name = '$name', email='$email', level='$level', pass='$pass', alliance = '$ally', faction = '$faction', points='".($value["points"] + $points)."', grPath='$grpath', lang='$lang', description = '$desc'  WHERE id='".$id."'";
		
		$insert = $mysql->query();
		
		if($insert) {
			//Write Log
			$log->msg = "Success edit users";
			$log->writeLog();
			
			$page->title = "Success Edit";
			$page->content .= success("Success Edit User! <a href='".$_SERVER["REQUEST_URI"]."'>Click Here</a> To continue Edit user");
		} else {
			$page->title = "Failed Edit";
			$page->content .= fail("Failed Edit User. <a href=\"javascript:history.go(-1);\">Go Back</a></center> And Try Again");
		}
			$page->show();
	}
	//Setup User's Name
	$name = inputtext("name", $value["name"], "30");
		
	//Setup User's Email
	$email = inputtext("email", $value["email"], "30");
	
	//Setup User's Password
	//Old
	$oldpass = inputtext("oldpass", '', "30");
	//New
	$newpass = inputtext("newpass", '', "30");	
	//Retype
	$repass = inputtext("repass", '', "30");
		
		
	//Setup User's Faction
	$ufaction = faction($value["faction"]);
	
	//and make SelectBox for user's faction
	$factions = factions();
	$f = array();
	foreach($factions as $fi => $fd) {
		$f[$fd[0]] = $fd[1];
	}
	$faction = SelectBox($f, "faction", $ufaction[0]);
	
	//Setups User's Alliance
	if($value["alliance"] == 0) {
		$ally_name = "none";
		$ally_id = inputtext("ally", "", "3");
	} else {
		$ally = alliance($value["alliance"]);
		$ally_name = $ally[1];
		$ally_id = inputtext("ally", $ally[0], "3");
	}
	
	//Setup Language
	$dir = dir("../language/");
	$languages = array();
	while($filename = $dir->read()) {
		if ($filename[0] != "." && $filename[0] != "..") {
			$languages[$filename] = $filename;
		}
	}
	$language = SelectBox($languages, "lang", $value["lang"]);
	
	//Setup User's Level
	$levelBox = array(
		"0" 	=>	"0 - Banned",
		"1" 	=>	"1 - Member",
		"2" 	=>	"2 - Gold",
		"3"	=>	"3 - -----",
		"4"	=>	"4 - Admin",
		"5"	=>	"5 - Owner"
	);
	$level = SelectBox($levelBox,"level", $value["level"]);
	
	//Setup User's grPath
	$grpath = inputtext("grpath", $value["grPath"], "10");
	//Setup User's Join Date
	$joindate = date("d M Y", strtotime($value["joined"]));
	
	//Setup User's Last Visit
	$lastvisit = date("d M Y, H:i:s", strtotime($value["lastVisit"]));
	
	//Setup User's Point
	$point = $value["points"]." + ".inputtext("points", "", "5");
	
	//Setup User's Town List
	$mysql->sql = "SELECT * FROM towns WHERE owner = '". $value["id"] ."'";
	$tquery = $mysql->query();
	$towns = $mysql->fetch($tquery);
	$towns_n = mysql_num_rows($tquery);
	
	$town = "<tr><td>Id</td><td>Name</td><td>Population</td>";
	if($towns_n != '0') {
		if($towns_n > '1') {
			foreach($towns as $ti => $td) {
				$town .= "<tr>
						<td>". $td["id"] ."</td>
						<td><a href='./?do=edit-town:". $td["id"] ."' target='_blank'>". $td["name"] ."</a></td>
						<td>". $td["population"] ."</td>
						<td></td>
					</tr>
					";
				$ntown = $towns_n + 2;
			}
		} else {
			$td = $towns;
			$town .= "<tr>
					<td>". $td["id"] ."</td>
					<td><a href='./?do=edit-town:". $td["id"] ."' target='_blank'>". $td["name"] ."</a></td>
					<td>". $td["population"] ."</td>
				</tr>
				";
			$ntown = "3";
		}
	} else {
		$town .= "<tr><td colspan='3'>This User Don't Have Town !</td></tr>";
		$ntown = "3";
	}
	
	//Make Table
	

	//Setup Template's Variables
	$tpl_var = array("id" => $value["id"],
			 "faction" => $faction,
			 "name" => $name,
			 "email" => $email,
			 "level" => $level,
			 "oldpass" => $oldpass,
			 "newpass" => $newpass,
			 "repass" => $repass,
			 "joindate" => $joindate,
			 "lastvisit" => $lastvisit,
			 "point" => $point,
			 "desc" => stripslashes($value["description"]),
			 "lang" => $language,
			 "allyid" => $ally_id,
			 "allyn" => $ally_name,
			 "grpath" => $grpath,
			 "town" => $town,
			 "ntown" => $ntown
			 );
	//Load Table		 
	$page->content .= $page->template("other/user_edit", $tpl_var);
	$page->title = "Edit - User: ". $value["name"];
	$page->show();
}

function create_user() {
	global $page, $config, $mysql;
	
	if(isset($_POST["create"])) {
		$_POST = array_map("clean", $_POST);
		//Check Username
		
		$mysql->sql = "SELECT `id` FROM `users` WHERE `name` = '".$_POST["name"]."'";
		$usr = $mysql->fetch($mysql->query());
		
		if(empty($_POST["name"])) {
			$page->message = "Username field can not be blank!";
			$page->show_error();		
		} elseif(empty($_POST["email"])) {
			$page->message = "Username field can not be blank!";
			$page->show_error();	
		} elseif ($usr == true) {
			$page->message = "Username was taken !";
			$page->show_error();
		} else {
 			$mysql->sql = "insert into users(name, pass, email, level, joined, lastVisit, points, ip, grPath,".
			"faction) values('".$_POST["name"]."', '".md5($_SESSION["rand_pass"])."', '".$_POST["email"]."', 1, now(), now(), 0, '-', 'default/', '".$_POST["faction"]."')";
 			$result = $mysql->query();
			$mysql->sql = "SELECT `id` FROM `users` WHERE `name` = '".$_POST["name"]."'";
			$id = $mysql->fetch($mysql->query());
			$page->title = "Create User Success!";
			$page->content = "'".$_POST["name"]."' create was successed. <p>The Password is <b>".$_SESSION["rand_pass"]."</b> </p><p>If you want edit this user, <a href='./?do=edit-user:".$id["id"]."'>click here</a></p><br><b>CHANGE THE PASSWORD AFTER LOGIN!!!</b>";
			$page->show();
		}

	}
	$_SESSION["rand_pass"] = rand(1,10000) + rand(1,30000);
	$faction = factions();
	$f = array();
	foreach($faction as $index => $value) {
		$f[$value[0]] = $value[1];
	}

	$factions = selectBox($f, "faction");
	$page->content = "
		<form name='crtpage' method='post' action='?do=create-user'>
		<table class='box'>
			<tr>
		  		<td>Username</td>
		 		<td><input class='textbox' type='text' name='name'></td>
                 	</tr>

			<tr>
                  		<td>Email</td>
                  		<td><input class='textbox' type='text' name='email'></td>
                  	</tr>
                	<tr>
                		<td>Faction</td>
                  		<td>$factions</td>
			</tr>
               		<tr>
				<td colspan='2'><input type='submit' name='create' value='Create'></td>
			</tr>
                </table>
		</form>
		<p><a href='./?do=users-list'>Back to users list</a></p>
		";
		$page->title = "Create User";
		$page->show();	

}

function users_index() {
	global $page, $mysql;
	
	$index = array (
	'a','b','c','d','e','f','g','h',
	'i','j','k','l','m','n','o','p',
	'q','r','s','t','u','v','w','x',
	'y','z','0','1','2','3','4','5',
	'6','7','8','9'
	);

	$index2 = array();
	$mysql->sql = "SELECT LEFT(name, 1) as I FROM users GROUP BY I";
	$query = $mysql->query();
	
	while($data = mysql_fetch_assoc($query)) {
		$index2[] = strtolower($data["I"]);	
	}

	$page->content .= "
	<form action='?do=users-list' method='post'>
	<table>
		<tr>
			<td>Search User</td>
			<td><input type='text' name='search' value=''></td>
			<td colspan='3'><input type='submit' value='Search!'></td>
		</tr>
		<tr>
			<td>Search By</td>
			<td>". selectBox(array('username' =>'username', 'email' => 'email'), 'by','') ."</td>
		</tr>
	</table>
	</form>
	Mode : Index | <a href='?do=users-list'>Normal</a><br/><br/>
	";
	$page->content .= "<center><table class='box'><tr>";
	foreach ($index as $key => $val) {
		if (isset($_GET['index']) && $_GET['index'] == $val) {
			$page->content .= '<td class="now">'.strtoupper($val).'</td>';
		} elseif (in_array($val,$index2)) {
			$page->content .= '<td class="av"><a href="?do=users-list&mode=index&index='.$val.'">'.strtoupper($val).'</a></td>';
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
		$mysql->sql = "SELECT * FROM users WHERE LEFT(name,1) = '$index' OR LEFT(name,1) = '". strtoupper($index) ."' GROUP BY name";
		$query = $mysql->query();
		$data_f = $mysql->fetch($query);
		
		$page->content .="<h2>". strtoupper($index) ."</h2>";
		$page->content .= "<table class='box'>
			<tr>
				<td class='head'><a href='?do=users-list&sort=id' title='Sort List By Id'>Id</a></td>
				<td class='head'><a href='?do=users-list&sort=name' title='Sort List By Name'>Name</a></td>
				<td class='head'><a href='?do=users-list&sort=email' title='Sort List By Email'>Email</a></td>
				<td class='head'><a href='?do=users-list&sort=level' title='Sort List By Level'>Level</a></td>
				<td class='head'>Profile</td>
			</tr>
		";

		if(mysql_num_rows($query) > 1) {
			foreach($data_f as $data) {
				$page->content .= "
				<tr>
					<td>".$data["id"]."</td>
					<td><a href='?do=edit-user:".$data["id"]."'>".$data["name"]."</a></td>
					<td>".$data["email"]."</td>
					<td>".$data["level"]."</td>
					<td><a href='../profile_view.php?id=".$data["id"]."' target='_blank'>View</a></td>
				</tr>";
			}
		} else {
				$page->content .= "
				<tr>
					<td>".$data_f["id"]."</td>
					<td><a href='?do=edit-user:".$data_f["id"]."'>".$data_f["name"]."</a></td>
					<td>".$data_f["email"]."</td>
					<td>".$data_f["level"]."</td>
					<td><a href='../profile_view.php?id=".$data_f["id"]."' target='_blank'>View</a></td>
				</tr>";
		}

		$page->content .= "</table><br/>";
	} else {
		$page->content .= '<div class="grey"><center>Click the alphabet for view the user\'s name begin with that alphabet</center></div>';
	}
		$page->title = "Users Index";
		$page->show();

}

function delete_users() {
	global $page;
	//Receive the data from 'users-list'

	if(isset($_POST["del"])) {
		
		foreach($_POST["del"] as $i => $d) {
				
			$dat = explode(":", $d);
			
			if($dat[1] != "5") {
				del_u($dat[0]);
			} else {
				$page->message = "You can not delete \'Owner / Super Admin\'";
				$page->show_error();
			}
		}
		$page->content .= "The users was deleted. Back to <a href='./?do=users-list'>Users List</a>";
		$page->show();
	} else {

		$page->content .= fail("No any users was deleted. Back to <a href='./?do=users-list'>users list</a>");
		$page->title = "Delete users management";
		$page->show();
	}

}
?>
