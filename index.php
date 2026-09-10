<?php
header("Cache-Control: private, max-age=3600");
header("Content-Type: text/html; charset=UTF-8");
include "include/antet.php";
include "include/func.php";
include "include/engine.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?=htmlspecialchars($title, ENT_QUOTES, 'UTF-8')?></title>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="template/index/favicon.ico" rel="shortcut icon">
<meta name="robots" content="index" />
<meta http-equiv="CACHE-CONTROL" content="NO-STORE" />
<link rel="stylesheet" type="text/css" href="template/index/battle.css" />
<script type="text/javascript" src="template/index/battle.js"></script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
if (typeof _gat !== 'undefined') {
  var pageTracker = _gat._getTracker("UA-6134506-1");
  pageTracker._trackPageview();
}
</script>
</head>
<body id="start">
<div id="content_container" >

<table id="table_login" width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90" height="35">&nbsp;</td>
    <td width="810">	
		<div id="nav_login">
			<form action="login_.php" name="form1" id="form" method="post" onsubmit="changeAction('Login');" target="_self" style="display:inline;">
			<table border="0" cellpadding="0" cellspacing="0">
			<tr>
      			<td class="user_name">
      		 	   <?php echo $lang['voiti'] ?>: <input class='textbox' type="text" name="name" id="button"> 
				</td>
			 	<td class="user_password">
					<?php echo $lang['password'] ?>: <input class='textbox' type="password" name="pass" id="button">
				</td>
      			<td class="user_submit">
					<input type="Submit" name="login" value="<?php echo $lang['vhod'] ?>" id="submit" />
				</td>
      		</tr>
      		</table>
      		</form>
		</div>		
	</td>
	<td width="90">&nbsp;</td>
  </tr>
</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td height="190">&nbsp;</td></tr>
</table>

<div id="startpage_menu">
	<ul>
		<?php include "modules/include/menu.php"; ?>
	</ul>
</div>

<div id="startpage_content_container">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td width="410">
		<div align="center">
			<img src="mask.jpg" width="357" height="360" alt="BattleKnight" />
		</div>
	</td>
    <td width="10">&nbsp;</td>
    <td width="570">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr><td id="header_middle">
			<div id="header_left"></div>
			<div id="header_text_small">Battleknight</div>
			<div id="header_right"></div>
		</td></tr>
		</table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td id="middle_left">&nbsp;</td>
			<td background="template/index/table_back.jpg">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr valign="top" style="padding:2px 5px 2px 5px;">
				<td valign="top"><img src="template/index/index_knight1.jpg" border="0" alt="Knight"></td>
				<td valign="top">
					<font color="red"><?php if (isset($_GET["msg"])) echo strip_tags($_GET["msg"]); ?></font>
					<?php
					$allowedTypes = ['news', 'register', 'contact'];
					if (in_array($type, $allowedTypes, true)) {
						include "modules/{$type}.php";
					} else {
						include "modules/news.php";
					}
					?>
				</td>
			</tr>
			</table>
			</td>
			<td id="middle_right">&nbsp;</td>
		</tr>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr><td height="20" id="footer_middle">
			<div id="footer_left"></div><div id="footer_right"></div>
		</td></tr>
		</table>
	</td>
  </tr>
</table><br>
</div>

<div id="game_footer"><p>All right reserved GameForge BattleKnight Forum</p></div>
</div>
</body>
</html>
