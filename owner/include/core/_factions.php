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

function factions_list() {
	global $mysql, $page;
	#error_reporting(E_ALL);

	//Setup Pagination
	if(isset($_GET["page"])) {
		$npage = $_GET["page"];
	} else {
		$npage = 1;
	}
	
	if(isset($_POST["save"])) {
		$_POST = array_map("mres_deep", $_POST);
		extract($_POST);
		$mysql->sql = "UPDATE factions SET name = '$name', grPath = '$grpath', ratio = '$ratio' WHERE id = '$id'";
		
		if($mysql->query()) {
			$page->content .= success("Success Edit $name faction!");
		} else {
			$page->content .= fail("Failed Edit $name faction!");
		}
		//die(mysql_error());
	}
	
	$mysql->sql = "SELECT * FROM factions ";
	//Setup Sort Order
	if(isset($_GET["sort"])) {
		$arrsort = array("id", "name", "grpath", "ratio");
		if(in_array($_GET["sort"], $arrsort)) {
			$order = $_GET["sort"];
		} else {
			$order = "id";
		}
	} else { $order = "id"; }
		
	$mysql->sql .= " ORDER BY $order ASC LIMIT ".(($npage-1)*10).",10";
	
	$page->content .= "
	<table class='box'>
		<tr>
			<td class='head'><a href='?do=factions&sort=id' title='Sort List By Id'>Id</a></td>
			<td class='head'><a href='?do=factions&sort=name' title='Sort List By Name'>Name</a></td>
			<td class='head'><a href='?do=factions&sort=grpath' title='Sort List By Level'>grPath</a></td>
			<td class='head'><a href='?do=factions&sort=ratio' title='Sort List By Level'>Ratio</a></td>
			<td class='head'>Do</td>			
		</tr>
	";

	//Fetch Data From Database
	$query = $mysql->query();
	$num_query = mysql_num_rows($query);
	
	if($num_query > 1) {
		foreach($mysql->fetch($query) as $value) {
			$page->content .= "
			<form action='./?do=factions' method='post' name='f".$value["id"]."'><tr>
				<td>".$value["id"]."<input type='hidden' name='id' value='".$value["id"]."'></td>
				<td>".inputtext("name", $value["name"], "15")."</td>
				<td>".inputtext("grpath", $value["grPath"], "15")."</td>
				<td>".inputtext("ratio", $value["ratio"], "15")."</td>
				<td><input type='submit' value='Save' name='save'></td>
			</tr></form>
			";
		}
	} elseif($num_query == 1) {
		$value = $mysql->fetch($query);
		$page->content .= "
		<form action='./?do=factions' method='post' name='f".$value["id"]."'><tr>
			<td>".$value["id"]."<input type='hidden' name='id' value='".$value["id"]."'></td>
			<td>".inputtext("name", $value["name"], "15")."</td>
			<td class='head'>".inputtext("grpath", $value["grPath"], "15")."</td>
			<td class='head'>".inputtext("ratio", $value["ratio"], "15")."</td>
			<td><input type='submit' value='Save' name='save'></td>
		</tr></form>
		";
	} else {
		$page->content .= "
		<tr>
			<td colspan='4' align='center'>faction's Database Empty</td>
		</tr>
		";
	}
	
	$page->content .= "</table><br/>";
	
	//Setup page link
	$mysql->sql = "SELECT * FROM factions ORDER BY id";
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
	$page->content .= "</td></tr></table>";
	$page->title = "Factions Edit";
	$page->show();
}

?>
