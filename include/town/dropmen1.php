<div class="main_display" onClick="showHide(0)">
<img src="../../template/town/village.gif" alt="Kingdom1" class="menu_pic"/>
<font class="text2">
<b><?php echo $lang['villages'] ?></b>
</font>
<font class="amount2">
<?php echo $lang['villinfo'] ?></font>
</div>
<div class="hide" id="sate1">
<? include("include/town/villages.php");?>
</div>
<div class="main_display" onClick="showHide(1)">
<img src="../../template/town/army.gif" alt="<?php echo $lang['military'] ?>" class="menu_pic"/>
<font class="text2">
<b><?php echo $lang['military'] ?></b>
</font>
<font class="amount2">
<?php echo $lang['militaryinfo'] ?>
</font>
</div>
<div class="hide" id="armata1">
<div id="m1" class="shown" onMouseOver="over('m1');" onMouseOut="over('m1');">
<? echo"<a id='link3' href='barracks.php?town=".$_GET["town"].""?>'><?php echo $lang['buildings'][0][15][0] ?></a>
</div>
<div id="m2" class="shown" onMouseOver="over('m2');" onMouseOut="over('m2');">
<? echo"<a id='link4' href='reports.php?page=0&&town=".$_GET["town"].""?>'><?php echo $lang['reports'] ?></a>
</div>
<div id="m3" class="shown" onMouseOver="over('m3');" onMouseOut="over('m3');">
<a id="link5" href="wwarehouse.php?town=<? echo"".$_GET["town"].""?>"><?php echo $lang['buildings'][0][21][0] ?></a>
</div>
<div id="m4" class="shown" onMouseOver="over('m4');" onMouseOut="over('m4');">
<a id="link6" href="embassy.php?town=<? echo"".$_GET["town"].""?>"><?php echo $lang['buildings'][0][9][0] ?></a>
</div>
<div id="m5" class="shown" onMouseOver="over('m5');" onMouseOut="over('m5');">
<a id="link7" href="dispatch.php?town=<? echo"".$_GET["town"].""?>"><?php echo $lang['dispatch'] ?></a>
</div>
</div>
<div class="main_display" onClick="showHide(2)">
<img src="../../template/town/pergam.gif" alt="<?php echo $lang['diplomacy'] ?>" class="menu_pic"/>
<font class="text2">
<b><?php echo $lang['diplomacy'] ?></b>
</font>
<font class="amount2">
<?php echo $lang['diplomacyinfo'] ?></font>
</div>
<div class="hide" id="diplomatie1">
<div id="d1" class="shown" onMouseOver="over('d1');" onMouseOut="over('d1');">
<? echo"<a id='link13' href='map.php?town=".$_GET["town"]."'>"?><?php echo $lang['showmap'] ?></a>
</div>
<div id="d2" class="shown" onMouseOver="over('d2');" onMouseOut="over('d2');">
<?	echo "<a id='link13' href='messages.php?page=0&&town=".$_GET["town"]."'>".$lang['messages'].""?></a>
</div>
<div id="d3" class="shown" onMouseOver="over('d3');" onMouseOut="over('d3');">
<a id="link15" href="marketplace.php?town=<? echo"".$_GET["town"].""?>"><?php echo $lang['buildings'][0][10][0] ?></a>
</div>
</div>
<div class="main_display" onClick="showHide(3)">
<img src="../../template/town/ol.gif" alt="Other Links" class="menu_pic"/>
<font class="text2">
<b><?php echo $lang['othlin'] ?></b>
</font>
<font class="amount2">
<?php echo $lang['othlininfo'] ?></font>
</div>
<div class="hide" id="altele1">
<div id="o1" class="shown" onMouseOver="over('o1');" onMouseOut="over('o1');">
<a id="link15" href="/premium.php?town=<? echo"".$_GET["town"].""?>"><?php echo $lang['upgr'] ?></a>
</div>
<div id="o2" class="shown" onMouseOver="over('o2');" onMouseOut="over('o2');">
<a id="link15" href="vote.php?town=<? echo"".$_GET["town"].""?>"><?php echo $lang['vote'] ?></a>
</div>
<div id="o3" class="shown" onMouseOver="over('o3');" onMouseOut="over('o3');">
<a id="link21" href="/forum" target="_blank"><?php echo $lang['forum'] ?></a>
</div>
<div id="o4" class="shown" onMouseOver="over('o4');" onMouseOut="over('o4');">
<a id='link22' href='profile_view.php?id=<? echo "".$_SESSION["user"][0]."&&town=".$_GET["town"].""?>'><? echo "".$lang['profile'].""?></a>
</div>
<div id="o5" class="shown" onMouseOver="over('o5');" onMouseOut="over('o5');">
<a id="link15" href="game_cred.php?town=<? echo"".$_GET["town"].""?>"><?php echo $lang['credits'] ?></a>
</div>