<?php include "include/antet.php"; include "include/func.php";
$gen_stats=gen_stats(48);
$town=town($_GET["town"]);
$config=config();
if (!$config[3][1]) msg1($lang['regClosed']);
$factions=factions();
$_SESSION["code"]=rand(1000, 9999);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<? include("include/meta.php");?>
<link rel="stylesheet" type="text/css" href="template/css/main.css" />
<script src="js/func.js" type="text/javascript"></script>
<title><?php echo $title; ?> - <?php echo $lang['home'] ?></title>

</head>

<body>
<div id="megabg_container">
<div id="bg_container">
<div id="container">
	<div id="header">
		<!-- <img src="img/top_img.jpg" alt="" style="margin:0 auto 0 auto;"/> -->
		<span id="header_text"><?php echo $lang['sname'] ?></span>
	</div>
	<div id="menu_sword">
		<div id="tabs" class="noprint">
		<h3 class="noscreen">Navigation</h3>
            <ul>
                <? include("include/indexmenu.php");?> 
                                                             
            </ul>
        <hr class="noscreen" />
        </div>
	</div>
			<img src="template/index/menu_sword_right.jpg" alt="" style="float:right;"/>
	<div id="body">
		<div id="body-leftside">
			<div id="scroll_top"><span id="scroll_header"><?php echo $lang['mlog'] ?>&nbsp;</span></div>
			<div id="scroll_middle">
            <div style=" position:relative; left:3px; top:-10px;">
            <table width="250" height="280">
            <tr>
            <td>
		  <div style=" position:relative; left:-15px;">
          <font class="main_menu">
          <form action="login_.php" method="post" name="form" target="_self">
          <label><?php echo $lang['username'] ?>
          <input class='textbox' type="text" name="name" id="name">
          </label>
          </font></div>
		   <div style=" position:relative; left:-15px;">
           <font class="main_menu">
           <label><?php echo $lang['password'] ?>
           <input class='textbox' type="password" name="pass">
           </label>
           </font>
		   <div style=" position:relative; left:45px;">
           <font class="main_menu">
            <label>
            <input class='button' type="submit" name="login" value="<?php echo $lang['login'] ?>">
            </label>
            </form>
                </font>
                </font>
                <font  color="#000000">
                <div  style=" position:relative; left:30px;">
                <span id="scroll_header1"><?php echo $lang['serv'] ?></span>
                </div>
                   <div style=" position:relative; left:20px;"><?php echo $lang['nrplayers'] ?></div>
                  <div style=" position:relative; left:67px;"><?php echo"".$gen_stats[0][0]."" ?></div>
                   <div style=" position:relative; left:17px;">
                   <? include("include/index/lang.php");?>
                  </div>
                  
                  </font>
                </td>
              </tr>
              </table>
              </div>
			</div>
			<div id="scroll_bottom"></div>
		</div>
		<div id="body-rightside">
		<p class="justify">
		  <div class="center" style="position:relative; top:-20px; left:-15px;">
          <table width="435px" height="200px">
              <tr>
      <td height="24" align="center" class='head_table'>
	  <div style='position:relative;color:#4c2f24;float:left;width:600px;top:-40px;left:-115px;'>
      <font color="#FFFFFF">
<table width='350'><tr><td>
<br />
<br />
<?
echo $lang['cinfo'];
?></td></tr></table></font></div></td></tr></table>
		  </div>
          
			</ul>
		</div>
	<div id="footer">
		<div class="hr"><hr/></div>
			<div class="designedby">
			<?php echo $lang['copyright'] ?><br />
			Designed by <a href="http://www.graformix.com" target="_blank" class="graformix">Graformix </a>
		</div>
	</div>
</div>
</div>
</div>
</body>

</html>
