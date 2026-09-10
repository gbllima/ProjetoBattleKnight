<?php //Another....
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

function summary() {
	global $page;
	
	$stats = dostats();
	
	//Setup Faction's Stats
	$faction = "";
	foreach($stats["factions"] as $fi => $fd) {
		$data = explode(":", $fd);
		$faction .= "p.add('$data[0]',$data[1])\n";
	}
	if(isset($_GET["stat"])) {
		if($_GET["stat"] == "faction") {
		$page->content .= "<h2>Faction Statistic</h2>
		<script type=\"text/javascript\" src=\"./include/javascript/wz_jsgraphics.js\"></script>
		<script type=\"text/javascript\" src=\"./include/javascript/pie.js\"></script>
		<div id=\"pieCanvas\" style=\"overflow: auto; position:relative;height:310px;width:100%;\"></div>

		<script type=\"text/javascript\">
		var p = new pie();
		$faction
		p.render(\"pieCanvas\", \"Pie Graph\")
		</script>
		";
		$page->show();
		}
	}
	$page->content .= "
		<p>
			In here You Can See Summary From Your Game
		</p>
		<table class='box'>
			<tr>
				<td>Total Alliance(s)</td>
				<td>". $stats["total-allies"][0] ."</td>
			</tr>
			<tr>
				<td>Total User(s)</td>
				<td>". $stats["total-users"][0] ."</td>
			</tr>
			<tr>
				<td>Total User(s) Deletion</td>
				<td>". $stats["total-del"][0] ."</td>
			</tr>
			<tr>
				<td>Total Message(s)</td>
				<td>". $stats["total-msgs"][0] ."</td>
			</tr>
			<tr>
				<td>Total Report(s)</td>
				<td>". $stats["total-rp"][0] ."</td>
			</tr>
			<tr>
				<td>Total Construction(s)</td>
				<td>". $stats["c-queue"][0] ."</td>
			</tr>
			<tr>
				<td>Total Trade(s) Queue</td>
				<td>". $stats["t-queue"][0] ."</td>
			</tr>
			<tr>
				<td>Total Unit(s) Queue</td>
				<td>". $stats["u-queue"][0] ."</td>
			</tr>
			<tr>
				<td>Total Weapon(s) Queue</td>
				<td>". $stats["w-queue"][0] ."</td>
			</tr>
			<tr>
				<td>Total Unit(s)</td>
				<td>". $stats["tot-unit"] ."</td>
			</tr>
			<tr>
				<td>Total Weapon(s)</td>
				<td>". $stats["tot-wps"] ."</td>
			</tr>
		</table>
		<a href='./?do=summary&stat=faction'>Faction Stats</a>
	";
	
	$page->title = "Summary";
	$page->show();
}

function dostats() { //Check Some Stats From The Game
	global $db_id, $mysql;
	
	$stats = array();
	
	//Total Alliances
	$query = "SELECT count(*) FROM alliances";
	$result = mysql_query($query, $db_id);
	$stats["total-allies"] = mysql_fetch_row($result);
	
	//Total Users
	$query = "SELECT count(*) FROM users";
	$result = mysql_query($query, $db_id);
	$stats["total-users"] = mysql_fetch_row($result);
	
	//Total Deletion Queue
	$query = "SELECT count(*) FROM d_queue";
	$result = mysql_query($query, $db_id);
	$stats["total-del"] = mysql_fetch_row($result);
	
	//Total Messages Database
	$query = "SELECT count(*) FROM messages";
	$result = mysql_query($query, $db_id);
	$stats["total-msgs"] = mysql_fetch_row($result);
	
	//Total Reports Database
	$query = "SELECT count(*) FROM reports";
	$result = mysql_query($query, $db_id);
	$stats["total-rp"] = mysql_fetch_row($result);
	
	//Total Constructions Queue
	$query = "SELECT count(*) FROM c_queue";
	$result = mysql_query($query, $db_id);
	$stats["c-queue"] = mysql_fetch_row($result);
	
	//Total Trades Queue
	$query = "SELECT count(*) FROM t_queue";
	$result = mysql_query($query, $db_id);
	$stats["t-queue"] = mysql_fetch_row($result);
	
	//Total Units Queue
	$query = "SELECT count(*) FROM u_queue";
	$result = mysql_query($query, $db_id);
	$stats["u-queue"] = mysql_fetch_row($result);
	
	//Total Weapons Queue
	$query = "SELECT count(*) FROM w_queue";
	$result = mysql_query($query, $db_id);
	$stats["w-queue"] = mysql_fetch_row($result);
	
	//Total units In Game
	$query = "SELECT army FROM towns";
	$result = mysql_query($query, $db_id);
	$unit = 0;
	while($value = mysql_fetch_row($result)) {
		$data_arr = explode("-", $value[0]);
		$unit += array_sum($data_arr);
	}
	
	$stats["tot-unit"] = $unit;
	
	//Total Weapons In Game
	$query = "SELECT weapons FROM towns";
	$result = mysql_query($query, $db_id);
	$unit = 0;
	while($value = mysql_fetch_row($result)) {
		$data_arr = explode("-", $value[0]);
		$unit += array_sum($data_arr);
	}
	
	//Faction Statistic
	$mysql->sql = "SELECT * FROM factions";
	$query = $mysql->query();
	foreach($mysql->fetch($query) as $fi =>$fd) {
		$mysql->sql = "SELECT COUNT(*) as count FROM users WHERE faction = '". $fd["id"] ."'";
		$count = $mysql->fetch($mysql->query());
		$stats["factions"][$fi] = $fd["name"] .":". $count["count"];
	}
	$stats["tot-wps"] = $unit;		
	return $stats;
	
}

function about_adm() {
	global $page;
	
	$page->content .= "
		<p>
			<b>DevAdm</b> is an Admin Management For Devana Created. \n
			It's Make you easy to manage your game like edit user, config, or towns. You can easily add some admin module, if you want. This mod was released under GPL 3 License, so it mean this mod is opensource. <br/>\n
		</p>
		<p>
			For Latest Version or any news, You Should Check <a href='http://devana.eu/forum/viewtopic.php?f=20&t=81'>Devana Forum</a> regularly.\n
			If you have question, report bug, share devAdm's mods or maybe ideas to improve DevAdm post it to <a href='http://devana.eu/forum/viewtopic.php?f=20&t=81'>Devana's Forum</a>\n
		</p>
		<p align='center'>DevAdm Brought to You by <marquee><b><font color='red'>I Putu Yoga</font> <font color='grey'>Permana</font></marquee></b></p>
		<p align='center'>
			<br/>
			<a href='docs/' target='_new'>Documents</a><br/>
	";
	$page->title = "About Page";
	$page->show();
}

function gethelp() {
	global $page;
	
	$page->content = $page->template("help/main");
	$page->title = "Help Page";
	
	$page->show();
	
}
?>
