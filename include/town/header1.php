<?php
 $town=town($_GET["town"]);
 $data=explode("-", $town[8]); $res=explode("-", $town[10]); $prod=explode("-", $town[9]); $lim=explode("-", $town[11]); $out=explode("-", $buildings[15][5]); $u_upgrades=explode("-", $town[17]); $w_upgrades=explode("-", $town[18]); $a_upgrades=explode("-", $town[19]); $army=explode("-", $town[7]); $weaps=explode("-", $town[6]);
?>
<div id="ie7menu" class="skin0" onMouseOver="highlightie5(event)" onMouseOut="lowlightie5(event);" onClick="jumptoie5(event)">
</div>
<div id="indexwrapper">
<div id="indexcontentwrap">
<div class="inner_head">
<div class="shield_reg">
<div style="position:relative;top:30px;left:20px;font-size:12px;font-weight:bold;width:400px;">
			<? echo"<a class='main_link' href='/forum/index.php?showforum=6' target='_blank'>".$lang['about'].""?></a>&nbsp;&nbsp;
			<? echo"<a class='main_link' href='town_stats.php?town=".$_GET["town"]."' target='main'>".$lang['statistics'].""?></a>&nbsp;&nbsp;
			<? echo "<a class='main_link' href='logout.php'>".$lang['logout']."" ?></a>&nbsp;&nbsp;
		   <?
		   if ($_SESSION["user"][4]<3) echo"";
		   else if ($_SESSION["user"][4]==4)
		   echo"<a href='/owner/' target='_blank'>Admin panel</a>";
		   else if ($_SESSION["user"][4]==5)
		   echo"<a href='/owner/' target='_blank'>Admin panel</a>";
		   ?>
</div>

<div id="resource_container" style="position:relative;width:355px;height:105px;left:32px;top:135px;">
<div class="inner_display" style="position:relative;top:-65px;" onMouseOver="showtooltip(event,'<table width=100% cellspacing=0px cellpadding=0px><tr><td class=head><?php echo $lang['pop'] ?></td></tr><tr><td class=content align=left colspan=2 style=border-bottom:0px><?php echo $lang['popinfo'] ?></td></tr></table>');return false" onMouseOut="hide();">
<img src="../../template/town/popu.png" alt="Population" width="28" height="28" class="small_pic"/>
<font class="text">
<b><?php echo $lang['pop'] ?></b><br />
<font class="amount"><? echo"".($town[3]+$town[12]).""?> [<? echo"".$lim[3]."" ?>]</font>
</font>
</div>

<div class="inner_display" style="position:relative;left:120px;top:-99px;" onMouseOver="showtooltip(event,'<table width=100% cellspacing=0px cellpadding=0px><tr><td class=head><?php echo $lang['wood'] ?></td></tr><tr><td class=content align=left colspan=2 style=border-bottom:0px><?php echo $lang['woodinfo'] ?><br \><br \><font class=description><?php echo $lang['maxstorage'] ?> <b class=description> <? echo"".$lim[1].""?></b></font> <br \><font class=description><?php echo $lang['prod'] ?> <b class=description><? echo"<b>".$prod[1]."</b>";  ?></b></font></td></tr></table>');return false" onMouseOut="hide();">
<img src="../../template/town/wood.png" alt="<?php echo $lang['wood'] ?>" class="small_pic"/>
<font class="text">
<b><?php echo $lang['wood'] ?></b><br />
<font class="amount"><? echo"".floor($res[1])."" ?></b></font>
</font>
</div>

<div class="inner_display" style="position:relative;left:240px;top:-133px;" onMouseOver="showtooltip(event,'<table width=100% cellspacing=0px cellpadding=0px><tr><td class=head><?php echo $lang['food'] ?></td></tr><tr><td class=content align=left colspan=2 style=border-bottom:0px><?php echo $lang['foodinfo'] ?><br \><br \><font class=description><?php echo $lang['maxstorage'] ?> <b class=description><? echo"".$lim[0].""?></b></font> <br \><font class=description><?php echo $lang['prod'] ?> <b class=description>  <? echo"<b> ".($prod[0]-$town[3]-$town[12])."</b>";  ?></b></font></td></tr></table>');return false" onMouseOut="hide();">
<img src="../../template/town/food.png" alt="<?php echo $lang['food'] ?>" class="small_pic"/>
<font class="text">
<b><?php echo $lang['food'] ?></b><br />
<font class="amount"><? echo"".floor($res[0])."" ?></b></font>
</font>
</div>

<div class="inner_display" style="position:relative;top:-130px;" onMouseOver="showtooltip(event,'<table width=100% cellspacing=0px cellpadding=0px><tr><td class=head><?php echo $lang['gold'] ?></td></tr><tr><td class=content align=left colspan=2 style=border-bottom:0px><?php echo $lang['goldinfo'] ?><br \><br \><font class=description><?php echo $lang['goldmax'] ?><b class=description><? echo"".$lim[2]."" ?></b></font><br \><font class=description><?php echo $lang['tax'] ?><b class=description><? echo"<b>".$prod[4]."</b>";  ?></b></font></td></tr></table>');return false" onMouseOut="hide();">
<img src="../../template/town/gold.png" alt="<?php echo $lang['gold'] ?>" class="small_pic"/>
<font class="text">
<b><?php echo $lang['gold'] ?></b><br />
<font class="amount"><? echo"".floor($res[4]).""?></font>
</font>
</div>

<div class="inner_display" style="position:relative;left:120px;top:-164px;" onMouseOver="showtooltip(event,'<table width=100% cellspacing=0px cellpadding=0px><tr><td class=head><?php echo $lang['stone'] ?></td></tr><tr><td class=content align=left colspan=2 style=border-bottom:0px><?php echo $lang['stoneinfo'] ?><br \><br \><font class=description><?php echo $lang['maxstorage'] ?> <b class=description><? echo"".$lim[1]."" ?></b></font> <br \><font class=description><?php echo $lang['prod'] ?> <b class=description><? echo"<b>".$prod[2]."</b>";  ?></b></font></td></tr></table>');return false" onMouseOut="hide();">
<img src="../../template/town/stone.png" alt="<?php echo $lang['stone'] ?>" class="small_pic"/>
<font class="text">
<b><?php echo $lang['stone'] ?></b><br />
<font class="amount"><? echo"".floor($res[2]).""?></b></font>
</font>
</div>

<div class="inner_display" style="position:relative;left:240px;top:-198px;" onMouseOver="showtooltip(event,'<table width=100% cellspacing=0px cellpadding=0px><tr><td class=head><?php echo $lang['iron'] ?></td></tr><tr><td class=content align=left colspan=2 style=border-bottom:0px><?php echo $lang['ironinfo'] ?><br \><br \><font class=description><?php echo $lang['maxstorage'] ?> <b class=description><? echo"".$lim[1].""?></b></font> <br \><font class=description><?php echo $lang['prod'] ?> <b class=description><? echo"<b>".$prod[3]."</b>";  ?></b></font></td></tr></table>');return false" onMouseOut="hide();">
<img src="../../template/town/iron.png" alt="<?php echo $lang['iron'] ?>" class="small_pic"/>
<font class="text">
<b><?php echo $lang['iron'] ?></b><br />
<font class="amount"><? echo"".floor($res[3]).""?></b></font>
</font>
</div>
</div>
<div class="back_flag" style="position:relative;left:565px;top:-70px;font-size:11px;color:#AD7734;">
<div style="position:absolute;top:40px;left:35px;" align="center">
<? echo"<a class='q_link' href='map.php?town=".$_GET["town"]."' target='main'>"?>
<img src="../../template/town/up-1.png" alt="world link" border="0"/><br />
</div>
<div style="position:absolute;top:40px;left:160px;" align="center">
<?	echo "<a class='q_link' href='messages.php?page=0&&town=".$_GET["town"]."' target='main'>"?>
<img src="../../template/town/up-2.png" alt="msg link" border="0"/><br />
</div>
<div style="position:absolute;top:40px;left:295px;" align="center">
<? echo "<a class='q_link' href='tow.php?town=".$_GET["town"]."' target='main'>"?>
<img src="../../template/town/up-3.png" alt="town link" border="0"/><br />				</a>
</div>
</div>
</div>
<div align="center" style="width:100px;position:absolute;top:0;left:46.4%;height:150px;cursor:pointer;">
</div>
</div>
</div>
<div class="inner_main" style="clear:both;position:relative;">
<table width="100%" cellpadding="0px" cellspacing="0px">
<tr>
<td valign="top">
<div style="height:auto; position:relative; left:40px;">
<?
 include("construct.php");?></div>
<div class="left_flag">
<font style="position:relative;top:6px;left:120px;font-weight:bold;font-size:13px;"><?php echo $lang['navigation'] ?></font>
</div>
<br />
<? include("dropmen.php");?>
</div>
</td>
<td width="655px" valign="top" class="right" align="center" style="position:relative;top:0px;left:0px;"><div id="tutorial" style="position:absolute;top:0px;z-index:5000;background:black;width:658px;height:100%;display:none;opacity: 0.95;filter: alpha(opacity=95);text-align:left;#left:0px;">
<table width="100%">
<td class="tut_header" align="center">
<div style="float:left;width:100px;text-align:left;"><img src="images/cross.png" alt="close" title="close" style="cursor:pointer;" onClick="tutorial('tutorial');"></div>
<div style="float:right;width:100px;text-align:right;"></div>
</td>
</table>
</div>
<table width="660" class="town_disp">
  <tr>
    <td>