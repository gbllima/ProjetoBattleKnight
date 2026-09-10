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

	$page->content .= "
	<table class='box'>
		<tr>
			<td class='head'>Name</td>
			<td class='head'>Version</td>
			<td class='head'>Author</td>
		</tr>
	";
	$path = 'include/mods/';
	if ($handle = opendir($path)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != ".." && $file != "index.html") {
				$nfo = explode("(--)", file_get_contents($path.$file."/info.txt"));
				$page->content .= "
				<tr>
					<td><a href='?mod=$nfo[0]'>$nfo[1]</a></td>
					<td>$nfo[4]</td>
					<td><a href='$nfo[3]'>$nfo[2]</a></td>
				</tr>
				";
			}
		}
		closedir($handle);
	} else {
		$page->content .= "
			<tr>
				<td colspan='3'>Don't see any mods around</td>
			</tr>
		";
	}
	$page->content .= "</table>";
	
	$page->title = "Mods Management";
	$page->show();
?>
