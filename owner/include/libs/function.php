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

function mres_deep($input) {
	if(is_array($input)) {
		return array_map("mres_deep", $input);
	} else {
		return mysql_real_escape_string($input);
	}
}

//Make Selectbox
function selectBox($array, $name, $selected='') {
	$output = "<select name='".$name."'>";
	foreach($array as $index => $value) {
		if($index == $selected) {
			$output .= "<option value='". $index ."' selected='selected'>". $value ."</option>";
		} else {
			$output .= "<option value='". $index ."'>". $value ."</option>";
		}
	}
	$output .= "</select>";
		return $output;
}

//Make Input Text
function inputtext($name, $value='', $s='3') {
	return "<input type = 'text' name='$name' value = '$value' size='$s'>";
}

//How fast our script run ?
function get_microtime() {

    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);

}

//URL Maker, make dynamic url
function makeurl($base, $var=array()) {
	$url = "$base";
	if(!empty($var)) {
		foreach($var as $index => $data) {
			if(!$data == 0 || $data == false) {
				$url .= "&$index=$data";
			}
		}
	}
		return $url;
}

//get their IP >:)
function checkIp() {
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		 return $_SERVER['REMOTE_ADDR'];
	}	
}

//A Simple Function, huh ?
function success($word) {
	return "<font style='color: green; padding: 13px;'>$word</font>";
}

function fail($word) {
	return "<font style='color: red; padding: 13px;'>$word</font>";
}

?>
