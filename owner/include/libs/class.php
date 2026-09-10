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

$start = get_microtime();

class page {

	public $message = ''; //error message
	public $title = ''; //for title page
	public $content = ''; //for content page

	//Get Template from directory
	function template ($tpl, $array=array()) {
		
		$file_path = "include/templates/$tpl.html";

		switch(file_exists($file_path)) {
			case true:
				$template = file_get_contents($file_path);		
				foreach ($array as $index => $var) {
					$template = str_replace("[[$index]]", $var, $template);
				}
			break;
			case false:
				die("Can't Get <i><b>$tpl's Template</b></i> !. Check The Template In Template Directory !"); 
			break;
		}
		return $template;
	}
	
	function show_error () { //Control Output Error
		$msg_error = $this->message;
		
		//If JavaScript Is 0n, Let's Show Error Via JS
		$error = "<script>window.alert('$msg_error');</script>"; 
		$error .= "<script>history.go(-1);</script>"; //And Then Go Back
		
		//ElseIf Javascript is Off, Alert Them !
		$error .= "<body><noscript><span style='color: red; font-weight: bold; font-style: italic;'>
				  $msg_error</span><br/>Please Go Back And Try Again</noscript></body>";
		die($error); //Show Them !
	}	
	function getmenu() { //Manage Menu
		if(isset($_SESSION["user"])) {
			if($_SESSION["user"][4] == 5 || $_SESSION["user"][4] == 4) {
				$content = $this->template("menu");
				return $content;
			} else {
				return "";
			}
		} else { return ""; }
	}
	function show() { //make output to browser
		global $start, $secretKey;
		
		//Check SecretKey isn't empty
		if(trim($secretKey) == "") { 
			$err = "<p class='big' style='color:red'>Security Alert ! ".
			       "Please Fill SecretKey on <i>'ini.php'</i>!</p><br/>";
		} elseif($secretKey == "po3t"){
			$err = "<p class='big' style='color:red'>Security Alert ! ".
			       "Please Change SecretKey on <i>'ini.php'</i>!, ".
			       "You still use default SecretKey</p><br/>";
		} else { $err = ""; }
		
		//Set The Array First, and then another...
		$array = array();
		$array["title"] = $this->title;
		$array["content"] = $err.$this->content;
		$array["menu"] = $this->getmenu();
		$array["debug"] = "<!-- ". (get_microtime() - $start)." Second(s) -->";
		
		//Set templates, and then Print to browser
		$page = $this->template('main', $array);
		echo $page;
		exit;
	}
}

class mods {
	public $input;
	
	function get() {

		$path = 'include/mods/';
		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != ".." && $file != "index.html") {
					if($file == $this->input) {
						include($path.$file."/mods.php"); exit;
					}
				}
			}
		closedir($handle);
		}
	}
}

//Make some task with MySQL more simple :)
class mysql {
	//property
	public $sql = '';
	
	function query() {
		global $db_id;
		$sqlquery = mysql_query($this->sql, $db_id);
		if(!$sqlquery) {
			die(mysql_error()); //just for debug
		}
		return $sqlquery;
	}

	function fetch($sqlquery) {
		switch (mysql_num_rows($sqlquery)) {
			case 0:
				$row = false;
				break;
			case 1:
				$row = mysql_fetch_assoc($sqlquery);
				break;
			default:
				while ($temprow = mysql_fetch_assoc($sqlquery)) {
					$row[] = $temprow;
				}
				break;
		}
			//die(print_r($row));
				return $row;
	}
		
}

class file {
	public $file;
	
	function createfile() {
		$crt = fopen($this->file, 'w');
		fclose($crt);
		return $crt;
	}
	
	function getfile() {
		if(file_exists($this->file)) {
			$get = file_get_contents($this->file);
			return $get;
		} else {
			die('File <b>'.$this->file.'</b> can not be loaded');
		}
	}
	
	function writefile($data, $new=false) {
			if($new == true) {
				$open = fopen($this->file, 'w');
				$result = fwrite($open, $data);
				fclose($open);
			} else {
				if(file_exists($this->file)) {
					$open = fopen($this->file, 'a');
					$result = fwrite($open, $data);
					fclose($open);
				} else {
					die('File <b>'.$this->file.'</b> can not be loaded');
				}
			}
			return $result;
	}
	
	function deletefile() {
		if(file_exists($this->file)) {
			return unlink($this->file);
		} else { return true; }
	}

}

class log {
	public $msg;
	function writeLog() {
		global $file;
		
		//Info
		$date = date("d-m-Y H:i:s");
		$uri = $_SERVER["REQUEST_URI"];
		if(isset($_SESSION["user"][1])) {
			$user = $_SESSION["user"][1];
		} else {
			$user = "Anonym";
		}
		$ip = checkIp();
		//Format of log
		$format = "Date-Time: $date\n".
			  "IP: $ip\n".
			  "User: $user\n".
			  "URI: $uri\n".
			  "Action: " . $this->msg;
		$file->file = "logs/". $date . ".txt";
		$file->writefile($format, true);
		
	}
}	
?>
