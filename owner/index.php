<?php
if(isset($_POST["delete_acc"])) {delete_acc($_POST['delete_acc']);}

	error_reporting(E_ALL); //Set '0' when online or 'E_ALL' when debug
	include("include/ini.php");
	$ips = explode(" ",$ip);
if (array_search($_SERVER["REMOTE_ADDR"],$ips) === FALSE) {
echo "<script language='JavaScript'> <!--

window.location.href = '/'</script>";
exit;
};
	
	if(isset($_GET["do"])) { //Core Function
		$do = explode(":", $_GET["do"]);
		switch($do[0]) {
			//Session Management
			case "login"		: admin_login(); break;
			case "logout"		: logout(); break;
			case "sc"		: secretKey(); break;
			
			
			//Users Management
			case "users-list"	: include("include/core/_users.php"); users_list(); break;
			case "edit-user"	: include("include/core/_users.php"); edit_user($do[1]); break;
			case "create-user"	: include("include/core/_users.php"); create_user(); break;
			case "delete-user"	: include("include/core/_users.php"); delete_users(); break;
			
			//Towns Management
			case "towns-list"	: include("include/core/_towns.php"); towns_list(); break;
			case "edit-town"	: include("include/core/_towns.php"); edit_town($do[1]); break;
			case "delete-town"	: include("include/core/_towns.php"); delete_towns(); break;
			
			//Alliances Management
			case "allies-list"	: include("include/core/_alliances.php"); alliances_list(); break;
			case "edit-ally"	: include("include/core/_alliances.php"); edit_alliance($do[1]); break;
			case "delete-ally"	: include("include/core/_alliances.php"); delete_alliances(); break;
			
			//Buildings Customization
			case "buildings"	: include("include/core/_buildings.php"); buildings_list(); break;
			case "edit-bd"		: include("include/core/_buildings.php"); edit_building($do[1]); break;
			
			//Unit Customization
			case "units"		: include("include/core/_units.php"); units_list(); break;
			case "edit-ut"		: include("include/core/_units.php"); edit_unit($do[1]); break;	
			
			//Unit Customization
			case "weapons"		: include("include/core/_weapons.php"); weapons_list(); break;
			case "edit-wp"		: include("include/core/_weapons.php"); edit_weapon($do[1]); break;					
			//Factions Customization
			case "factions"		: include("include/core/_factions.php"); factions_list(); break;
								
			//Game Configuration
			case "config"		: include("include/core/_config.php"); config_adm(); break;
			
			//Mods Management
			case "mods"		: include("include/core/_mods.php"); mods(); break;
			
			//Misc
			case "summary"		: include("include/core/_misc.php"); summary(); break;
			case "about"		: include("include/core/_misc.php"); about_adm(); break;
			case "help"		: include("include/core/_misc.php"); gethelp(); break;
			default			: main(); break;
		}
	} elseif(isset($_GET["mod"])) { //Get Mod
			
		$mods->input = $_GET["mod"];
		$mods->get();
		
	} else { main(); }

function main() { //Main Index Page For Admin
	global $page;
	$page->title = "Home";

	$page->content .= "
	<p>
		<h3>Welcome To Administration Area - DevAdm 0.3.1 Beta. </h3>
		At DevAdm, you can do some admin task like edit a user, example if you want give resources to user just change their town's resources value, and much more you can do!
	</p>
	<p>
		<h3>Need Help ?</h3>
		You Need A Help ? Devana Comunity will help you by ask on <a href='http://devana.eu/forum/viewtopic.php?f=20&t=81'>forum</a> !
		Or you can contact me at below : <br/>
			- yahoo messenger : <a href='ymsgr:putuyoga_brahmacari'>putuyoga_brahmacari</a><br/>
			- email : putuyoga[at]gmail[dot]com
	</p>
	<p>
		<h3>Improve DevAdm !</h3>
		Have idea ? that can make DevAdm more usefull ? please, post it on <a href='http://devana.eu/forum/viewtopic.php?f=20&t=81'>forum</a> !
		Or maybe want share your mods for DevAdm ? share it ! we'll try it :D~
	</p>
	";
	$page->show();
}

function admin_login() { //Login Page
	global $page, $secretKey, $log;

	
	//Check POST Login
	if (isset($_POST["name"], $_POST["pass"])) {
		if($_POST["sum"] == ($_SESSION["a"] + $_SESSION["b"]) ) { //If Sum is right. Prevent Bots
			$_SESSION["user"] = login($_POST["name"], md5($_POST["pass"]));
			if ($_SESSION["user"][0]) { //If true login
				if($_SESSION["user"][4] == 5 || $_SESSION["user"][4] == 4) { //If He/She an admin
					if($_POST["secret-key"] != $secretKey) { //Check SecretKey					
						$page->message = "Failed Login. No Such user Or Password (oo)";
						$page->show_error(); 					
					} else {
						$_SESSION["secretkey"] = md5($secretKey);
						
						//Write Log
						$log->msg = "Success Login!";
						$log->writeLog();
						
						$trueLogin = true;
						
						$page->title = "Login Success";
						$page->content = "Administration Login Success. Go To <a href=\"./\">Admin Home</a>";
						$page->show();
					}
				} else {
					//Write Log
					$log->msg = "Someone attempt to Login!";
					$log->writeLog();
					$page->message = "Failed Login. No Such user Or Password (o0)";
					$page->show_error(); 
				}
			} else {
				//Write Log
				$log->msg = "Someone attempt to Login!";
				$log->writeLog();
				$page->message = "Failed Login. No Such user Or Password (0o)";
				$page->show_error();
			}
		} else {
			//Write Log
			$log->msg = "Someone attempt to Login!";
			$log->writeLog();
			$page->message = "Failed Login. No Such user Or Password (00)";
			$page->show_error(); 
		}	
	} else {
		//prepare for random number
		$_SESSION["a"] = rand(1,100);
		$_SESSION["b"] = rand(50,200);
		$num = array($_SESSION["a"],$_SESSION["b"]);
		$content = "<center>
		
			<p class='grey'>
				Welcome To Devana's Administration Area, Please Login First to Access Admin Interface.\n
			  You must input right secret key, you can't enter even you input right username & password !
			</p>
			
			<form action='?do=login' name='form-login' method='post'>
			<table class='box'>
				<tr>
					<td class='head' colspan='2' align='center'><b>Login Box</b></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type='text' name='name' value=''></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type='password' name='pass' value=''></td>
				</tr>
				<tr>
					<td>SecretKey</td>
					<td><input type='password' name='secret-key' value=''></td>
				</tr>
				<tr>
					<td>Value of <u>$num[0] + $num[1]</u></td>
					<td><input type='text' name='sum' value=''></td>
				</tr>
				
				<tr>
					<td colspan='2'><input type='submit' name='login' value='Login'></td>
				</tr>
			</table>
			</form>
			</center>
		";
		
		$page->title = "Admin Login";
		$page->content = $content;
		$page->show();
	}
}

function secretKey() {
	global $page, $secretKey;
	
	if(isset($_POST["sc"])) {
		if($secretKey == $_POST["sc"]) { //Check :p
		
			$_SESSION["secretkey"] = md5($secretKey);
			$page->content .= success("Validate Success");
			$page->show();
			
		} else {
			$page->content .= fail("Failed Validate");
		}
	}
	$page->content .= "<center>
		<p class='grey'>
			You have an admin session, but before you can access the panel, we must validate that you're a real admin.\n
		  You can validate yourself by input the right secretKey!
		</p>
		
		<form action='?do=sc' name='form-login' method='post'>
		<table class='box'>
			<tr>
				<td class='head' colspan='2' align='center'><b>Validation</b></td>
			<tr>
				<td>SecretKey</td>
				<td><input type='password' name='sc' value=''></td>
			</tr>
			
			<tr>
				<td colspan='2'><input type='submit' name='v' value='Validate'></td>
			</tr>
		</table>
		</form>
		</center>
	";
	$page->title = "Validation";
	$page->show();
}

function logout() {

	$_SESSION = array();
	session_destroy();
	die(header("Location: ?do=login"));
}

?> 
