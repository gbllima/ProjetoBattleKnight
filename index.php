<?
session_start();
header("Cache-control: private");
header("Cache-control: max-age=3600");
include "include/antet.php"; 
include "include/func.php";
include "include/engine.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?=$title?></title>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="CONTENT-TYPE" content="text/html; charset=windows-1251" />
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
var pageTracker = _gat._getTracker("UA-6134506-1");
pageTracker._trackPageview();
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
			<tr>
				
			</tr>
      		</table>
      		</form>
		</div>		
	</td>
	<td width="90">&nbsp;</td>

  </tr>
</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="190">&nbsp;</td>
  </tr>
</table>

<div id="startpage_menu">
	 <ul>
		 <?
include "modules/include/menu.php";
?> 
	</ul>
</div> 

<div id="startpage_content_container">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr valign="top">
    <td width="410">

			  <div align="center">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="436" height="237" id="mask.jpg" align="middle">
				<param name="allowScriptAccess" value="sameDomain" />
				<param name="movie" value="mask.jpg" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#000000" />

				<embed src="mask.jpg" quality="high" bgcolor="#000000" width="357" height="360" name="bk_video" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
				</object>
			  </div>

	</td>
    <td width="10">&nbsp;</td>
    <td width="570">
		

		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>	
			<td id="header_middle">

				<div id="header_left"></div>
				<div id="header_text_small">Battleknight</div>
				<div id="header_right"></div>
			</td>
		</tr>
		</table>
		<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>

			<td id="middle_left">&nbsp;</td>
			<td background="template/index/table_back.jpg">


		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		  <tr valign="top" style="padding:2px 5px 2px 5px;">
		    <td valign="top">
		    <img src="template/index/index_knight1.jpg" border="0">
		    </td>
		    <td valign="top">
			<font color="red"><?php if (isset($_GET["msg"])) echo strip_tags($_GET["msg"]); ?></font>
 <?
include "modules/$type.php";
?> 
			</td>
		    </td>
		  </tr>

		</table>


			</td>
			<td id="middle_right">&nbsp;</td>
		</tr>
		</table>
		
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td height="20" id="footer_middle">			
				<div id="footer_left"></div>			
				<div id="footer_right"></div>

			</td>
		</tr>
		</table>		
		</td>
  </tr>
</table><br>
</div>

<div id="game_footer"><p>
	All right reserved GameForge <a href="">BattleKnight</a> <a href="/forum">Forum</a><p>
</div>
</div>
<!-- #MMO:NETBAR# -->
<script type="text/javascript">
var mmostyle = document.createElement('style');
if (navigator.appName == "Microsoft Internet Explorer") {
	mmostyle.setAttribute("type", "text/css");
	mmostyle.styleSheet.cssText = ' body {margin:0; padding:0;} #mmonetbar { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.bg.png) repeat-x; font:normal 11px Tahoma, Arial, Helvetica, sans-serif !important; height:32px; left:0; padding:0; position:absolute; text-align:center; top:0; width:100%; z-index:3000; } #mmonetbar #mmoContent { height:32px; margin:0 auto; width:1024px; } #mmonetbar .mmosmallbar {width:585px !important;} #mmonetbar .mmonewsout {width:845px !important;} #mmonetbar .mmouseronlineout {width:768px !important;} #mmonetbar a { color:#666 !important; font:normal 11px Tahoma, Arial, Helvetica, sans-serif !important; outline: none; text-decoration:none; white-space:nowrap; } #mmonetbar select { background-color:#3a3530 !important; border:1px solid #686051 !important; color:#d3c8b4 !important; font:normal 11px Verdana, Arial, Helvetica, sans-serif; height:18px; margin-top:3px; width:100px; } #mmonetbar .mmoGames select {width:80px;} #mmonetbar option { background-color:#3a3530 !important; color:#d3c8b4 !important; } #mmonetbar option:hover { background-color:#4d4740 !important; } #mmonetbar select#mmoCountry {width:120px;} #mmonetbar .mmoSelectbox { background-color:#3a3530; float:left; margin:3px 0 0 3px; position:relative; } * html #mmonetbar .mmoSelectbox {position:static;} *+html #mmonetbar .mmoSelectbox {position:static;} #mmonetbar #mmoOneGame {cursor:default; height:14px; margin-top:3px; padding-left:5px; width:80px;} #mmonetbar .label {float:left; font-weight:bold; margin-right:4px; overflow:hidden !important;} #mmonetbar #mmoUsers .label {font-size:10px;} #mmonetbar .mmoBoxLeft, #mmonetbar .mmoBoxRight { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -109px -4px; float:left; width:5px; height:24px; } #mmonetbar .mmoBoxRight {background-position:-126px -4px;} #mmonetbar .mmoBoxMiddle { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.bg.png) repeat-x 0 -36px; color:#d3c8b4 !important; float:left; height:24px; line-height:22px; text-align:left; white-space:nowrap; } #mmonetbar #mmoGames, #mmonetbar #mmoLangs {margin:0px 4px 0 0;} #mmonetbar #mmoNews, #mmonetbar #mmoUsers, #mmonetbar #mmoGame, #mmonetbar .nojsGame {margin:4px 4px 0 0;} #mmonetbar #mmoLogo { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat top left; float:left; display:block; height:32px; width:108px; } #mmonetbar #mmoNews {float:left; width:252px;} #mmonetbar #mmoNews #mmoNewsContent {text-align:left; width:200px;} #mmonetbar #mmoNews #mmoNewsticker {overflow:hidden; width:240px;} #mmonetbar #mmoNews #mmoNewsticker ul { list-style-type: none; margin: 0; padding: 0px; } #mmonetbar #mmoNews #mmoNewsticker ul li { font:normal 11px/22px Tahoma, Arial, Helvetica, sans-serif !important; color:#d3c8b4 !important; padding: 0px; margin: 0; } #mmonetbar #mmoNews #mmoNewsticker ul li a {color:#d3c8b4 !important;} #mmonetbar #mmoNews #mmoNewsticker ul li a:hover {text-decoration:underline;} #mmonetbar #mmoUsers {float:left; width:178px;} #mmonetbar #mmoUsers .mmoBoxLeft {width:17px;} #mmonetbar #mmoUsers .mmoBoxMiddle {padding-left:3px; width:150px;} #mmonetbar .mmoGame {display:none; float:left; width:472px;} #mmonetbar .mmoGame #mmoGames {float:left; width:206px;} #mmonetbar .mmoGame #mmoLangs {float:left; margin:0; width:245px;} #mmonetbar .mmoGame label { color:#d3c8b4 !important; float:left; font-weight:400 !important; line-height:22px; margin:0px; text-align:right !important; width:110px; } #mmonetbar .nojsGame {display:block; width:470px;} #mmonetbar .nojsGame .mmoBoxMiddle {width:450px;} #mmonetbar .nojsGame .mmoSelectbox {margin:0px 0 0 3px;} *+html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} * html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} #mmonetbar .nojsGame .mmoGameBtn { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -162px -7px; border:none; cursor:pointer; float:left; height:18px; margin:3px 0 0 7px; padding:0; width:18px; } #mmonetbar .mmoSelectArea { border:1px solid #686051; color:#d3c8b4 !important; display:block !important; float:none; font-weight:400 !important; font-size:11px; height:16px; line-height:13px; overflow:hidden !important; width:90px; } #mmonetbar #mmoLangSelect .mmoSelectArea {width:129px;} #mmonetbar #mmoLangSelect .mmoOptionsDivVisible {min-width:129px;} #mmonetbar .mmoSelectArea .mmoSelectButton { background: url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -141px -8px; float:right; width:17px; height:16px; } #mmonetbar .mmoSelectText {cursor:pointer; float:left; overflow:hidden; padding:1px 2px; width:68px;} #mmonetbar #mmoLangSelect .mmoSelectText {width:107px;} #mmonetbar #mmoOneLang {cursor:default; height:14px;} #mmonetbar .mmoOptionsDivInvisible, #mmonetbar .mmoOptionsDivVisible { background-color: #3a3530 !important; border: 1px solid #686051; position: absolute; min-width:90px; z-index: 3100; } * html #mmonetbar .mmoOptionsDivVisible .highlight {background-color:#4d4740 !important} #mmonetbar .mmoOptionsDivInvisible {display: none;} #mmonetbar .mmoOptionsDivVisible ul { border:0; font:normal 11px Tahoma, Arial, Helvetica, sans-serif; list-style: none; margin:0; padding:2px; overflow:auto; overflow-x:hidden; } #mmonetbar #mmoLangs .mmoOptionsDivVisible ul {min-width:125px;} #mmonetbar .mmoOptionsDivVisible ul li { background-color: #3a3530; height:14px; padding:2px 0; } #mmonetbar .mmoOptionsDivVisible a { color: #d3c8b4 !important; display: block; font-weight:400 !important; height:16px !important; min-width:80px; text-decoration: none; white-space:nowrap; width:100%; } #mmonetbar #mmoContent .mmoLangList a {min-width:102px;} #mmonetbar .mmoOptionsDivVisible li:hover {background-color: #4d4740;} #mmonetbar .mmoOptionsDivVisible li a:hover {color: #d3c8b4 !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive {background-color: #4d4740 !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive a {color: #d3c8b4 !important;} #mmonetbar .mmoOptionsDivVisible ul.mmoListHeight {height:240px} #mmonetbar .mmoOptionsDivVisible ul.mmoLangList.mmoListHeight li {padding-right:15px !important; width:100%;} #mmonetbar #mmoGameSelect ul.mmoListHeight a {min-width:85px;} #mmonetbar #mmoLangSelect ul.mmoListHeight a {min-width:105px;} #mmonetbar #mmoFocus {position:absolute;left:-2000px;top:-2000px;} #mmonetbar #mmoLangs .mmoSelectText span, #mmonetbar #mmoLangs .mmoflag { background: transparent url(http://mmogame.com/img/mmoflags.png) no-repeat; height:14px !important; padding-left:23px; } .mmo_AE {background-position:left 0px !important} .mmo_AR {background-position:left -14px !important} .mmo_BE {background-position:left -28px !important} .mmo_BG {background-position:left -42px !important} .mmo_BR {background-position:left -56px !important} .mmo_BY {background-position:left -70px !important} .mmo_CA {background-position:left -84px !important} .mmo_CH {background-position:left -98px !important} .mmo_CL {background-position:left -112px !important} .mmo_CN {background-position:left -126px !important} .mmo_CO {background-position:left -140px !important} .mmo_CZ {background-position:left -154px !important} .mmo_DE {background-position:left -168px !important} .mmo_DK {background-position:left -182px !important} .mmo_EE {background-position:left -196px !important} .mmo_EG {background-position:left -210px !important} .mmo_EN {background-position:left -224px !important} .mmo_ES {background-position:left -238px !important} .mmo_EU {background-position:left -252px !important} .mmo_FI {background-position:left -266px !important} .mmo_FR {background-position:left -280px !important} .mmo_GR {background-position:left -294px !important} .mmo_HK {background-position:left -308px !important} .mmo_HR {background-position:left -322px !important} .mmo_HU {background-position:left -336px !important} .mmo_ID {background-position:left -350px !important} .mmo_IL {background-position:left -364px !important} .mmo_IN {background-position:left -378px !important} .mmo_INTL {background-position:left -392px !important} .mmo_IR {background-position:left -406px !important} .mmo_IT {background-position:left -420px !important} .mmo_JP {background-position:left -434px !important} .mmo_KE {background-position:left -448px !important} .mmo_KR {background-position:left -462px !important} .mmo_LT {background-position:left -476px !important} .mmo_LV {background-position:left -490px !important} .mmo_ME {background-position:left -504px !important} .mmo_MK {background-position:left -518px !important} .mmo_MX {background-position:left -532px !important} .mmo_NL {background-position:left -546px !important} .mmo_NO {background-position:left -560px !important} .mmo_PE {background-position:left -574px !important} .mmo_PH {background-position:left -588px !important} .mmo_PK {background-position:left -602px !important} .mmo_PL {background-position:left -616px !important} .mmo_PT {background-position:left -630px !important} .mmo_RO {background-position:left -644px !important} .mmo_RS {background-position:left -658px !important} .mmo_RU {background-position:left -672px !important} .mmo_SE {background-position:left -686px !important} .mmo_SI {background-position:left -700px !important} .mmo_SK {background-position:left -714px !important} .mmo_TH {background-position:left -728px !important} .mmo_TR {background-position:left -742px !important} .mmo_TW {background-position:left -756px !important} .mmo_UA {background-position:left -770px !important} .mmo_UK {background-position:left -784px !important} .mmo_US {background-position:left -798px !important} .mmo_VE {background-position:left -812px !important} .mmo_VN {background-position:left -826px !important} .mmo_YU {background-position:left -840px !important} .mmo_ZA {background-position:left -854px !important} ';
} else {
	var mmostyleTxt = document.createTextNode(' body {margin:0; padding:0;} #mmonetbar { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.bg.png) repeat-x; font:normal 11px Tahoma, Arial, Helvetica, sans-serif !important; height:32px; left:0; padding:0; position:absolute; text-align:center; top:0; width:100%; z-index:3000; } #mmonetbar #mmoContent { height:32px; margin:0 auto; width:1024px; } #mmonetbar .mmosmallbar {width:585px !important;} #mmonetbar .mmonewsout {width:845px !important;} #mmonetbar .mmouseronlineout {width:768px !important;} #mmonetbar a { color:#666 !important; font:normal 11px Tahoma, Arial, Helvetica, sans-serif !important; outline: none; text-decoration:none; white-space:nowrap; } #mmonetbar select { background-color:#3a3530 !important; border:1px solid #686051 !important; color:#d3c8b4 !important; font:normal 11px Verdana, Arial, Helvetica, sans-serif; height:18px; margin-top:3px; width:100px; } #mmonetbar .mmoGames select {width:80px;} #mmonetbar option { background-color:#3a3530 !important; color:#d3c8b4 !important; } #mmonetbar option:hover { background-color:#4d4740 !important; } #mmonetbar select#mmoCountry {width:120px;} #mmonetbar .mmoSelectbox { background-color:#3a3530; float:left; margin:3px 0 0 3px; position:relative; } * html #mmonetbar .mmoSelectbox {position:static;} *+html #mmonetbar .mmoSelectbox {position:static;} #mmonetbar #mmoOneGame {cursor:default; height:14px; margin-top:3px; padding-left:5px; width:80px;} #mmonetbar .label {float:left; font-weight:bold; margin-right:4px; overflow:hidden !important;} #mmonetbar #mmoUsers .label {font-size:10px;} #mmonetbar .mmoBoxLeft, #mmonetbar .mmoBoxRight { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -109px -4px; float:left; width:5px; height:24px; } #mmonetbar .mmoBoxRight {background-position:-126px -4px;} #mmonetbar .mmoBoxMiddle { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.bg.png) repeat-x 0 -36px; color:#d3c8b4 !important; float:left; height:24px; line-height:22px; text-align:left; white-space:nowrap; } #mmonetbar #mmoGames, #mmonetbar #mmoLangs {margin:0px 4px 0 0;} #mmonetbar #mmoNews, #mmonetbar #mmoUsers, #mmonetbar #mmoGame, #mmonetbar .nojsGame {margin:4px 4px 0 0;} #mmonetbar #mmoLogo { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat top left; float:left; display:block; height:32px; width:108px; } #mmonetbar #mmoNews {float:left; width:252px;} #mmonetbar #mmoNews #mmoNewsContent {text-align:left; width:200px;} #mmonetbar #mmoNews #mmoNewsticker {overflow:hidden; width:240px;} #mmonetbar #mmoNews #mmoNewsticker ul { list-style-type: none; margin: 0; padding: 0px; } #mmonetbar #mmoNews #mmoNewsticker ul li { font:normal 11px/22px Tahoma, Arial, Helvetica, sans-serif !important; color:#d3c8b4 !important; padding: 0px; margin: 0; } #mmonetbar #mmoNews #mmoNewsticker ul li a {color:#d3c8b4 !important;} #mmonetbar #mmoNews #mmoNewsticker ul li a:hover {text-decoration:underline;} #mmonetbar #mmoUsers {float:left; width:178px;} #mmonetbar #mmoUsers .mmoBoxLeft {width:17px;} #mmonetbar #mmoUsers .mmoBoxMiddle {padding-left:3px; width:150px;} #mmonetbar .mmoGame {display:none; float:left; width:472px;} #mmonetbar .mmoGame #mmoGames {float:left; width:206px;} #mmonetbar .mmoGame #mmoLangs {float:left; margin:0; width:245px;} #mmonetbar .mmoGame label { color:#d3c8b4 !important; float:left; font-weight:400 !important; line-height:22px; margin:0px; text-align:right !important; width:110px; } #mmonetbar .nojsGame {display:block; width:470px;} #mmonetbar .nojsGame .mmoBoxMiddle {width:450px;} #mmonetbar .nojsGame .mmoSelectbox {margin:0px 0 0 3px;} *+html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} * html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} #mmonetbar .nojsGame .mmoGameBtn { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -162px -7px; border:none; cursor:pointer; float:left; height:18px; margin:3px 0 0 7px; padding:0; width:18px; } #mmonetbar .mmoSelectArea { border:1px solid #686051; color:#d3c8b4 !important; display:block !important; float:none; font-weight:400 !important; font-size:11px; height:16px; line-height:13px; overflow:hidden !important; width:90px; } #mmonetbar #mmoLangSelect .mmoSelectArea {width:129px;} #mmonetbar #mmoLangSelect .mmoOptionsDivVisible {min-width:129px;} #mmonetbar .mmoSelectArea .mmoSelectButton { background: url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -141px -8px; float:right; width:17px; height:16px; } #mmonetbar .mmoSelectText {cursor:pointer; float:left; overflow:hidden; padding:1px 2px; width:68px;} #mmonetbar #mmoLangSelect .mmoSelectText {width:107px;} #mmonetbar #mmoOneLang {cursor:default; height:14px;} #mmonetbar .mmoOptionsDivInvisible, #mmonetbar .mmoOptionsDivVisible { background-color: #3a3530 !important; border: 1px solid #686051; position: absolute; min-width:90px; z-index: 3100; } * html #mmonetbar .mmoOptionsDivVisible .highlight {background-color:#4d4740 !important} #mmonetbar .mmoOptionsDivInvisible {display: none;} #mmonetbar .mmoOptionsDivVisible ul { border:0; font:normal 11px Tahoma, Arial, Helvetica, sans-serif; list-style: none; margin:0; padding:2px; overflow:auto; overflow-x:hidden; } #mmonetbar #mmoLangs .mmoOptionsDivVisible ul {min-width:125px;} #mmonetbar .mmoOptionsDivVisible ul li { background-color: #3a3530; height:14px; padding:2px 0; } #mmonetbar .mmoOptionsDivVisible a { color: #d3c8b4 !important; display: block; font-weight:400 !important; height:16px !important; min-width:80px; text-decoration: none; white-space:nowrap; width:100%; } #mmonetbar #mmoContent .mmoLangList a {min-width:102px;} #mmonetbar .mmoOptionsDivVisible li:hover {background-color: #4d4740;} #mmonetbar .mmoOptionsDivVisible li a:hover {color: #d3c8b4 !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive {background-color: #4d4740 !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive a {color: #d3c8b4 !important;} #mmonetbar .mmoOptionsDivVisible ul.mmoListHeight {height:240px} #mmonetbar .mmoOptionsDivVisible ul.mmoLangList.mmoListHeight li {padding-right:15px !important; width:100%;} #mmonetbar #mmoGameSelect ul.mmoListHeight a {min-width:85px;} #mmonetbar #mmoLangSelect ul.mmoListHeight a {min-width:105px;} #mmonetbar #mmoFocus {position:absolute;left:-2000px;top:-2000px;} #mmonetbar #mmoLangs .mmoSelectText span, #mmonetbar #mmoLangs .mmoflag { background: transparent url(http://mmogame.com/img/mmoflags.png) no-repeat; height:14px !important; padding-left:23px; } .mmo_AE {background-position:left 0px !important} .mmo_AR {background-position:left -14px !important} .mmo_BE {background-position:left -28px !important} .mmo_BG {background-position:left -42px !important} .mmo_BR {background-position:left -56px !important} .mmo_BY {background-position:left -70px !important} .mmo_CA {background-position:left -84px !important} .mmo_CH {background-position:left -98px !important} .mmo_CL {background-position:left -112px !important} .mmo_CN {background-position:left -126px !important} .mmo_CO {background-position:left -140px !important} .mmo_CZ {background-position:left -154px !important} .mmo_DE {background-position:left -168px !important} .mmo_DK {background-position:left -182px !important} .mmo_EE {background-position:left -196px !important} .mmo_EG {background-position:left -210px !important} .mmo_EN {background-position:left -224px !important} .mmo_ES {background-position:left -238px !important} .mmo_EU {background-position:left -252px !important} .mmo_FI {background-position:left -266px !important} .mmo_FR {background-position:left -280px !important} .mmo_GR {background-position:left -294px !important} .mmo_HK {background-position:left -308px !important} .mmo_HR {background-position:left -322px !important} .mmo_HU {background-position:left -336px !important} .mmo_ID {background-position:left -350px !important} .mmo_IL {background-position:left -364px !important} .mmo_IN {background-position:left -378px !important} .mmo_INTL {background-position:left -392px !important} .mmo_IR {background-position:left -406px !important} .mmo_IT {background-position:left -420px !important} .mmo_JP {background-position:left -434px !important} .mmo_KE {background-position:left -448px !important} .mmo_KR {background-position:left -462px !important} .mmo_LT {background-position:left -476px !important} .mmo_LV {background-position:left -490px !important} .mmo_ME {background-position:left -504px !important} .mmo_MK {background-position:left -518px !important} .mmo_MX {background-position:left -532px !important} .mmo_NL {background-position:left -546px !important} .mmo_NO {background-position:left -560px !important} .mmo_PE {background-position:left -574px !important} .mmo_PH {background-position:left -588px !important} .mmo_PK {background-position:left -602px !important} .mmo_PL {background-position:left -616px !important} .mmo_PT {background-position:left -630px !important} .mmo_RO {background-position:left -644px !important} .mmo_RS {background-position:left -658px !important} .mmo_RU {background-position:left -672px !important} .mmo_SE {background-position:left -686px !important} .mmo_SI {background-position:left -700px !important} .mmo_SK {background-position:left -714px !important} .mmo_TH {background-position:left -728px !important} .mmo_TR {background-position:left -742px !important} .mmo_TW {background-position:left -756px !important} .mmo_UA {background-position:left -770px !important} .mmo_UK {background-position:left -784px !important} .mmo_US {background-position:left -798px !important} .mmo_VE {background-position:left -812px !important} .mmo_VN {background-position:left -826px !important} .mmo_YU {background-position:left -840px !important} .mmo_ZA {background-position:left -854px !important} ');
	mmostyle.type = 'text/css';
	mmostyle.appendChild(mmostyleTxt);
}
document.getElementsByTagName('head')[0].appendChild(mmostyle);
</script>
<noscript>
<style type="text/css">
 body {margin:0; padding:0;} #mmonetbar { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.bg.png) repeat-x; font:normal 11px Tahoma, Arial, Helvetica, sans-serif !important; height:32px; left:0; padding:0; position:absolute; text-align:center; top:0; width:100%; z-index:3000; } #mmonetbar #mmoContent { height:32px; margin:0 auto; width:1024px; } #mmonetbar .mmosmallbar {width:585px !important;} #mmonetbar .mmonewsout {width:845px !important;} #mmonetbar .mmouseronlineout {width:768px !important;} #mmonetbar a { color:#666 !important; font:normal 11px Tahoma, Arial, Helvetica, sans-serif !important; outline: none; text-decoration:none; white-space:nowrap; } #mmonetbar select { background-color:#3a3530 !important; border:1px solid #686051 !important; color:#d3c8b4 !important; font:normal 11px Verdana, Arial, Helvetica, sans-serif; height:18px; margin-top:3px; width:100px; } #mmonetbar .mmoGames select {width:80px;} #mmonetbar option { background-color:#3a3530 !important; color:#d3c8b4 !important; } #mmonetbar option:hover { background-color:#4d4740 !important; } #mmonetbar select#mmoCountry {width:120px;} #mmonetbar .mmoSelectbox { background-color:#3a3530; float:left; margin:3px 0 0 3px; position:relative; } * html #mmonetbar .mmoSelectbox {position:static;} *+html #mmonetbar .mmoSelectbox {position:static;} #mmonetbar #mmoOneGame {cursor:default; height:14px; margin-top:3px; padding-left:5px; width:80px;} #mmonetbar .label {float:left; font-weight:bold; margin-right:4px; overflow:hidden !important;} #mmonetbar #mmoUsers .label {font-size:10px;} #mmonetbar .mmoBoxLeft, #mmonetbar .mmoBoxRight { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -109px -4px; float:left; width:5px; height:24px; } #mmonetbar .mmoBoxRight {background-position:-126px -4px;} #mmonetbar .mmoBoxMiddle { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.bg.png) repeat-x 0 -36px; color:#d3c8b4 !important; float:left; height:24px; line-height:22px; text-align:left; white-space:nowrap; } #mmonetbar #mmoGames, #mmonetbar #mmoLangs {margin:0px 4px 0 0;} #mmonetbar #mmoNews, #mmonetbar #mmoUsers, #mmonetbar #mmoGame, #mmonetbar .nojsGame {margin:4px 4px 0 0;} #mmonetbar #mmoLogo { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat top left; float:left; display:block; height:32px; width:108px; } #mmonetbar #mmoNews {float:left; width:252px;} #mmonetbar #mmoNews #mmoNewsContent {text-align:left; width:200px;} #mmonetbar #mmoNews #mmoNewsticker {overflow:hidden; width:240px;} #mmonetbar #mmoNews #mmoNewsticker ul { list-style-type: none; margin: 0; padding: 0px; } #mmonetbar #mmoNews #mmoNewsticker ul li { font:normal 11px/22px Tahoma, Arial, Helvetica, sans-serif !important; color:#d3c8b4 !important; padding: 0px; margin: 0; } #mmonetbar #mmoNews #mmoNewsticker ul li a {color:#d3c8b4 !important;} #mmonetbar #mmoNews #mmoNewsticker ul li a:hover {text-decoration:underline;} #mmonetbar #mmoUsers {float:left; width:178px;} #mmonetbar #mmoUsers .mmoBoxLeft {width:17px;} #mmonetbar #mmoUsers .mmoBoxMiddle {padding-left:3px; width:150px;} #mmonetbar .mmoGame {display:none; float:left; width:472px;} #mmonetbar .mmoGame #mmoGames {float:left; width:206px;} #mmonetbar .mmoGame #mmoLangs {float:left; margin:0; width:245px;} #mmonetbar .mmoGame label { color:#d3c8b4 !important; float:left; font-weight:400 !important; line-height:22px; margin:0px; text-align:right !important; width:110px; } #mmonetbar .nojsGame {display:block; width:470px;} #mmonetbar .nojsGame .mmoBoxMiddle {width:450px;} #mmonetbar .nojsGame .mmoSelectbox {margin:0px 0 0 3px;} *+html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} * html #mmonetbar .nojsGame .mmoSelectbox {margin:2px 0 0 3px;} #mmonetbar .nojsGame .mmoGameBtn { background:transparent url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -162px -7px; border:none; cursor:pointer; float:left; height:18px; margin:3px 0 0 7px; padding:0; width:18px; } #mmonetbar .mmoSelectArea { border:1px solid #686051; color:#d3c8b4 !important; display:block !important; float:none; font-weight:400 !important; font-size:11px; height:16px; line-height:13px; overflow:hidden !important; width:90px; } #mmonetbar #mmoLangSelect .mmoSelectArea {width:129px;} #mmonetbar #mmoLangSelect .mmoOptionsDivVisible {min-width:129px;} #mmonetbar .mmoSelectArea .mmoSelectButton { background: url(http://mmogame.com/games/battleknight/default/netbar.sprites.png) no-repeat -141px -8px; float:right; width:17px; height:16px; } #mmonetbar .mmoSelectText {cursor:pointer; float:left; overflow:hidden; padding:1px 2px; width:68px;} #mmonetbar #mmoLangSelect .mmoSelectText {width:107px;} #mmonetbar #mmoOneLang {cursor:default; height:14px;} #mmonetbar .mmoOptionsDivInvisible, #mmonetbar .mmoOptionsDivVisible { background-color: #3a3530 !important; border: 1px solid #686051; position: absolute; min-width:90px; z-index: 3100; } * html #mmonetbar .mmoOptionsDivVisible .highlight {background-color:#4d4740 !important} #mmonetbar .mmoOptionsDivInvisible {display: none;} #mmonetbar .mmoOptionsDivVisible ul { border:0; font:normal 11px Tahoma, Arial, Helvetica, sans-serif; list-style: none; margin:0; padding:2px; overflow:auto; overflow-x:hidden; } #mmonetbar #mmoLangs .mmoOptionsDivVisible ul {min-width:125px;} #mmonetbar .mmoOptionsDivVisible ul li { background-color: #3a3530; height:14px; padding:2px 0; } #mmonetbar .mmoOptionsDivVisible a { color: #d3c8b4 !important; display: block; font-weight:400 !important; height:16px !important; min-width:80px; text-decoration: none; white-space:nowrap; width:100%; } #mmonetbar #mmoContent .mmoLangList a {min-width:102px;} #mmonetbar .mmoOptionsDivVisible li:hover {background-color: #4d4740;} #mmonetbar .mmoOptionsDivVisible li a:hover {color: #d3c8b4 !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive {background-color: #4d4740 !important;} #mmonetbar .mmoOptionsDivVisible li.mmoActive a {color: #d3c8b4 !important;} #mmonetbar .mmoOptionsDivVisible ul.mmoListHeight {height:240px} #mmonetbar .mmoOptionsDivVisible ul.mmoLangList.mmoListHeight li {padding-right:15px !important; width:100%;} #mmonetbar #mmoGameSelect ul.mmoListHeight a {min-width:85px;} #mmonetbar #mmoLangSelect ul.mmoListHeight a {min-width:105px;} #mmonetbar #mmoFocus {position:absolute;left:-2000px;top:-2000px;} #mmonetbar #mmoLangs .mmoSelectText span, #mmonetbar #mmoLangs .mmoflag { background: transparent url(http://mmogame.com/img/mmoflags.png) no-repeat; height:14px !important; padding-left:23px; } .mmo_AE {background-position:left 0px !important} .mmo_AR {background-position:left -14px !important} .mmo_BE {background-position:left -28px !important} .mmo_BG {background-position:left -42px !important} .mmo_BR {background-position:left -56px !important} .mmo_BY {background-position:left -70px !important} .mmo_CA {background-position:left -84px !important} .mmo_CH {background-position:left -98px !important} .mmo_CL {background-position:left -112px !important} .mmo_CN {background-position:left -126px !important} .mmo_CO {background-position:left -140px !important} .mmo_CZ {background-position:left -154px !important} .mmo_DE {background-position:left -168px !important} .mmo_DK {background-position:left -182px !important} .mmo_EE {background-position:left -196px !important} .mmo_EG {background-position:left -210px !important} .mmo_EN {background-position:left -224px !important} .mmo_ES {background-position:left -238px !important} .mmo_EU {background-position:left -252px !important} .mmo_FI {background-position:left -266px !important} .mmo_FR {background-position:left -280px !important} .mmo_GR {background-position:left -294px !important} .mmo_HK {background-position:left -308px !important} .mmo_HR {background-position:left -322px !important} .mmo_HU {background-position:left -336px !important} .mmo_ID {background-position:left -350px !important} .mmo_IL {background-position:left -364px !important} .mmo_IN {background-position:left -378px !important} .mmo_INTL {background-position:left -392px !important} .mmo_IR {background-position:left -406px !important} .mmo_IT {background-position:left -420px !important} .mmo_JP {background-position:left -434px !important} .mmo_KE {background-position:left -448px !important} .mmo_KR {background-position:left -462px !important} .mmo_LT {background-position:left -476px !important} .mmo_LV {background-position:left -490px !important} .mmo_ME {background-position:left -504px !important} .mmo_MK {background-position:left -518px !important} .mmo_MX {background-position:left -532px !important} .mmo_NL {background-position:left -546px !important} .mmo_NO {background-position:left -560px !important} .mmo_PE {background-position:left -574px !important} .mmo_PH {background-position:left -588px !important} .mmo_PK {background-position:left -602px !important} .mmo_PL {background-position:left -616px !important} .mmo_PT {background-position:left -630px !important} .mmo_RO {background-position:left -644px !important} .mmo_RS {background-position:left -658px !important} .mmo_RU {background-position:left -672px !important} .mmo_SE {background-position:left -686px !important} .mmo_SI {background-position:left -700px !important} .mmo_SK {background-position:left -714px !important} .mmo_TH {background-position:left -728px !important} .mmo_TR {background-position:left -742px !important} .mmo_TW {background-position:left -756px !important} .mmo_UA {background-position:left -770px !important} .mmo_UK {background-position:left -784px !important} .mmo_US {background-position:left -798px !important} .mmo_VE {background-position:left -812px !important} .mmo_VN {background-position:left -826px !important} .mmo_YU {background-position:left -840px !important} .mmo_ZA {background-position:left -854px !important} </style>

</noscript>
<div id="mmonetbar" class="mmobattleknight">
<script type="text/javascript">
var mmoActive_select=null;function mmoInitSelect(){if(!document.getElementById)return false;document.getElementById('mmonetbar').style.display='block';document.getElementById('mmoGame').style.display='block';document.getElementById('mmoFocus').onkeyup=function(e){mmo_selid=mmoActive_select.id.replace('mmoOptionsDiv','');var e=e||window.event;if(e.keyCode)var thecode=e.keyCode;else if(e.which)var thecode=e.which;mmoSelectMe(mmo_selid,thecode);}}
function mmoSelectMe(selid,thecode){var mmolist=document.getElementById('mmoList'+selid);var mmoitems=mmolist.getElementsByTagName('li');switch(thecode){case 13:mmoShowOptions(selid);window.location=mmoActive_select.url;break;case 38:mmoActive_select.activeit.className='';var minus=((mmoActive_select.activeid-1)<=0)?'0':(mmoActive_select.activeid-1);mmoActive_select=mmoSetActive(selid,minus);break;case 40:mmoActive_select.activeit.className='';var plus=((mmoActive_select.activeid+1)>=mmoitems.length)?(mmoitems.length-1):(mmoActive_select.activeid+1);mmoActive_select=mmoSetActive(selid,plus);break;default:thecode=String.fromCharCode(thecode);var found=false;for(var i=0;i<mmoitems.length;i++){var _a=mmoitems[i].getElementsByTagName('a');if(navigator.appName.indexOf("Explorer")>-1){}
else{txtContent=_a[0].textContent;}
if(!found&&(thecode.toLowerCase()==txtContent.charAt(0).toLowerCase())){mmoActive_select.activeit.className='';mmoActive_select=mmoSetActive(selid,i);found=true;}}
break;}}
function mmoSetActive(selid,itemid){mmoActive_select=null;var mmolist=document.getElementById('mmoList'+selid);var mmoitems=mmolist.getElementsByTagName('li');mmoActive_select=document.getElementById('mmoOptionsDiv'+selid);;mmoActive_select.selid=selid;if(itemid!=undefined){var _a=mmoitems[itemid].getElementsByTagName('a');var textVar=document.getElementById("mmoMySelectText"+selid);textVar.innerHTML=_a[0].innerHTML;if(selid==1)textVar.className=_a[0].className;mmoitems[itemid].className='mmoActive';}
for(var i=0;i<mmoitems.length;i++){if(mmoitems[i].className=='mmoActive'){mmoActive_select.activeit=mmoitems[i];mmoActive_select.activeid=i;mmoActive_select.url=(mmoitems[i].getElementsByTagName('a'))?mmoitems[i].getElementsByTagName('a')[0].href:null;}}
return mmoActive_select;}
function mmoShowOptions(g){var _elem=document.getElementById("mmoOptionsDiv"+g);if((mmoActive_select)&&(mmoActive_select!=_elem)){mmoActive_select.className="mmoOptionsDivInvisible";document.getElementById('mmonetbar').focus();}
if(_elem.className=="mmoOptionsDivInvisible"){document.getElementById('mmoFocus').focus();mmoActive_select=mmoSetActive(g);if(document.documentElement){document.documentElement.onclick=mmoHideOptions;}else{window.onclick=mmoHideOptions;}
_elem.className="mmoOptionsDivVisible";}else if(_elem.className=="mmoOptionsDivVisible"){_elem.className="mmoOptionsDivInvisible";document.getElementById('mmonetbar').focus();}}
function mmoHideOptions(e){if(mmoActive_select){if(!e)e=window.event;var _target=(e.target||e.srcElement);if((_target.id.indexOf('mmoOptionsDiv')!=-1))return false;if(mmoisElementBefore(_target,'mmoSelectArea')==0&&(mmoisElementBefore(_target,'mmoOptionsDiv')==0)){mmoActive_select.className="mmoOptionsDivInvisible";mmoActive_select=null;}}else{if(document.documentElement)document.documentElement.onclick=function(){};else window.onclick=null;}}
function mmoisElementBefore(_el,_class){var _parent=_el;do _parent=_parent.parentNode;while(_parent&&(_parent.className!=null)&&(_parent.className.indexOf(_class)==-1))
return(_parent.className&&(_parent.className.indexOf(_class)!=-1))?1:0;}
var ua=navigator.userAgent.toLowerCase();var ie6browser=((ua.indexOf("msie 6")>-1)&&(ua.indexOf("opera")<0))?true:false;function highlight(el,mod){if(ie6browser){if(mod==1&&!el.className.match(/highlight/))el.className=el.className+' highlight';else if(mod==0)el.className=el.className.replace(/highlight/g,'');}}</script>
	<div id="mmoContent" class="mmosmallbar">
		<!-- logo -->
		<a id="mmoLogo" href="/forum"></a>
		<input id="mmoFocus" type="text" size="5" />
	</div>
</div>

<script type="text/javascript">mmoInitSelect();</script></body>
</html>