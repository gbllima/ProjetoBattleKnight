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

	global $page;
	
	if(isset($_POST["send"])) {
		if($_POST["subject"] != "") {
			send_to_all($_POST["subject"], $_POST["contents"]);
			$page->content .= success("Already Sent To All User");
			//$page->show();
		} else {
			$page->title = "Failed Send";
			$page->content = fail("<p>The message, Must have a subject ! go back and try again</p>");
			//$page->show();
		}
	} else {
		$page->content .= "
			<form name='form1' method='post' action='?mod=mass-msg'>
			<p>Subject: 
				<input name='subject' type='text' size='75'>
			</p>
			<p>
				<textarea name='contents' cols='52' rows='20'></textarea>
			</p>
			<p>
				<input type='submit' name='send' value='Send'>
			</p>
			</form>
		";
	}
	
	$page->title = "Send Messages To All Users";
	$page->show();
	
?>
