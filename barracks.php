<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
$_GET["town"]=clean($_GET["town"]);
check_u($_GET["town"]);
check_r($_GET["town"]);
check_a($_GET["town"]);
$town=town($_GET["town"]); 
if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
$buildings=buildings($_SESSION["user"][10]);
$c_status=get_con($_GET["town"]);
$r=$faction[3];
$uq=get_u($_GET["town"]);
$units=units($faction[0]);
$faction=faction($_SESSION["user"][10]);
$aq=get_a($town[0]);
$iaq=get_ia($_GET["town"]);
$data=explode("-", $town[8]); 
$army=explode("-", $town[7]); 
$gen=explode("-", $town[15]);
$res=explode("-", $town[10]); 
$prod=explode("-", $town[9]);
$lim=explode("-", $town[11]); 
$out=explode("-", $buildings[15][5]);
$u_upgrades=explode("-", $town[17]);
$a_upgrades=explode("-", $town[19]);
if (isset($_GET["target"])) 
{$target=town($_GET["target"]); 
$target=$target[2];} else $target="";
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<script type="text/javascript">
/** This is high-level function.
 * It must react to delta being more/less than zero.
 */
function handle(delta) {
var d=delta*-60;
window.scrollBy(0,d);
}

/** Event handler for mouse wheel event.
 */
function wheel(event){
        var delta = 0;
        if (!event) /* For IE. */
                event = window.event;
        if (event.wheelDelta) { /* IE/Opera. */
                delta = event.wheelDelta/120;
                /** In Opera 9, delta differs in sign as compared to IE.
                 */
                if (window.opera)
                        delta = -delta;
        } else if (event.detail) { /** Mozilla case. */
                /** In Mozilla, sign of delta is different than in IE.
                 * Also, delta is multiple of 3.
                 */
                delta = -event.detail/3;
        }
        /** If delta is nonzero, handle it.
         * Basically, delta is now positive if wheel was scrolled up,
         * and negative, if wheel was scrolled down.
         */
        if (delta)
                handle(delta);
        /** Prevent default actions caused by mouse wheel.
         * That might be ugly, but we handle scrolls somehow
         * anyway, so don't bother here..
         */
        if (event.preventDefault)
                event.preventDefault();
	event.returnValue = false;
}

/** Initialization code. 
 * If you use your own event management code, change it as required.
 */
if (window.addEventListener)
        /** DOMMouseScroll is for mozilla. */
        window.addEventListener('DOMMouseScroll', wheel, false);
/** IE/Opera. */
window.onmousewheel = document.onmousewheel = wheel;
</script>
<script type="text/javascript">
var tabLinks = new Array();
var contentDivs = new Array();
var data=new Array(11);
</script>
<head>
<title><?php echo $title." - ".$buildings[15][2]; ?></title>
</head>

<body class="q_body" onLoad="inittabs();">

<div align="center">
          <p>
          
         <p>
        <ul id='tabs'>
         <li><a href='#trainunits'><? echo"".$lang['trunit'].""?></a></li>
         <li><a href='#availabletroops'><? echo"".$lang['availableTroops'].""?></a></li>
            <li><a href='#sendTroops'><? echo"".$lang['sendtroops'].""?></a></li>
            <li><a href='#incomingunits'><? echo"".$lang['incomingunits'].""?></a></li>
            <li><a href='#outgoingunits'><? echo"".$lang['outgoingunits'].""?></a></li>
            
        </ul><?	   echo"	<img src='".$imgs.$fimgs."b15.gif' width='75' height='100'><br />";
 echo $buildings[15][8]."<br /><br />";?>
 <?
  if (count($uq)) echo $lang['trainQueue'].":<br />";
for ($i=0; $i<count($uq); $i++) echo "
 <table width='650' border='1'><tr><td align='center'>[<a class='q_link' href='cancel_u.php?town=".$_GET["town"]."&type=".$uq[$i][1]."'>x</a>] ".$uq[$i][2]." ".$units[$uq[$i][1]][2]." - <span id='".$i."'>".$uq[$i][0]."</span><script type='text/javascript'> var id=new Array(50); timer('".$i."', 'tow.php?town=".$_GET["town"]."'); </script></td></tr></table>";?>
<div class='tabContent' id='trainunits'>
                <div>
                <table width="650">
                <tr>
                <td>
<center>
<?php
if ($data[15])
{
 echo "</tr></table>------------------------------------------<br />";
 if (!$c_status[15])
	 if ($data[15]<10)
		{
		 $dur=explode("-", $buildings[15][6]); $upk=explode("-", $buildings[15][7]); $cost=explode("-", $buildings[15][4]); $dur[$data[15]]=explode(":", $dur[$data[15]]);
	  if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost)))
		 echo "<b>".$lang['upgrade']." ".$buildings[15][2]." ".$lang['toLevel']." ".($data[15]+1)."</b>";
		 else
		 echo "<a class='q_link'  target='_parent' href='build.php?town=".$town[0]."&b=".$buildings[15][0]."&subB=-1'>".$lang['upgrade']." ".$buildings[15][2]." ".$lang['toLevel']." ".($data[15]+1)."</a>";
		 $tag=$tag."<br />".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*pow($r, $data[15]))." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*pow($r, $data[15]))." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*pow($r, $data[15]))." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*pow($r, $data[15]))." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*pow($r, $data[15]))."<br />".$lang['duration']."&nbsp;".($dur[$data[15]][1])."".$lang['minutes']."<br />".$lang['upkeep'].": ".$upk[$data[15]]."<br />".$lang['expSpeed'].": ".$out[$data[15]];
		 echo $tag;
		 if ($town[12]+$town[3]+$upk[$data[15]]>$lim[3]) label("<br />".$lang['noHouses']);
		 if (!(($res[0]>=$cost[0]*pow($r, $data[15]))&&($res[1]>=$cost[1]*pow($r, $data[15]))&&($res[2]>=$cost[2]*pow($r, $data[15]))&&($res[3]>=$cost[3]*pow($r, $data[15]))&&($res[4]>=$cost[4]*pow($r, $data[15])))) label("<br />".$lang['noResources']);
		 echo "<br />------------------------------------------<br />";
		}
	 else echo $lang['buildingMaxLvl'];
 else echo $lang['beingUpgraded'];
}
else echo $lang['constrBuilding'];
?>
       <table class="q_table" style="border-collapse: collapse; text-indent: 0; margin-left:auto; margin-right:auto;" width="650" border="1">
            <tr style='text-align: center'>
              <td><?php echo $lang['unitType'] ?></td>
              <td><?php echo $lang['quantity'] ?></td>
              <td><?php echo $lang['train'] ?></td>
            </tr>
<?php
if ($data[15])
for ($i=0; $i<count($units); $i++)
 if (($i<11)||($i>11))
 {
  $dur=explode(":", $units[$i][9]); $cost=explode("-", $units[$i][4]);
  if (($u_upgrades[$i])) echo "<form name='units' method='post' action='train.php?town=".$_GET["town"]."&type=".$i."'><tr style='text-align: center;'><td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'><br />".$units[$i][10]."<br />".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0])." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1])." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2])." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3])." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4])."<br />".$lang['duration'].": ".($dur[0]*$lim[8]/100).":".($dur[1]*$lim[8]/100).", ".$lang['hp'].": ".($units[$i][5]+$u_upgrades[$i]).", ".$lang['atk'].": ".($units[$i][6]+$w_upgrades[$i]).", ".$lang['def'].": ".($units[$i][7]+$a_upgrades[$i]).", ".$lang['speed'].": ".$units[$i][8].".</td><td><input class='textbox' name='q' type='text' size='3' maxlength='3' value='0'></td><td><input type='submit' class='button' name='unit' value='".$lang['train']."'></td></tr></form>";
  else echo "<tr style='text-align: center;'><td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'><br />".$units[$i][10]."</td><td colspan='2'>".$lang['researchUnit']." ".$lang['in']." ";
  if (!$u_upgrades[$i]) echo $buildings[16][2]."</td></tr>";
  else if (!$w_upgrades[$i]) echo $buildings[17][2]."</td></tr>";
  else if (!$a_upgrades[$i]) echo $buildings[17][2]."</td></tr>";
 }
echo "</table>";
?>
</td>
</tr>
</table>
                </div>
        </div>
                <div class='tabContent' id='availabletroops'>
                <div>
                <table width="650">
                <tr>
                <td>
                <?
	 echo "<table class='q_table' style='border-collapse: collapse; text-indent: 0; text-align: center' width='650' border='1'><tr>";
 for ($i=0; $i<count($units); $i++) echo "<td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'></td>";
 echo "</tr><tr>";
 for ($i=0; $i<11; $i++) echo "<td>".$army[$i]."</td>";
 echo"</tr><td></table>";

?>
</td>
</tr>
</table>
                </div>
        </div>
        
<div class='tabContent' id='sendTroops'>
                <div>
<?php echo $lang['sendTroopsTo'] ?>
       <table class="q_table" style="border-collapse: collapse" width="650" border="1">
       <tr>
       <td><?php echo $lang['icon'] ?></td>
       <td><?php echo $lang['available'] ?></td>
       <td><?php echo $lang['send'] ?></td>
       </tr>
<?php
echo "<form name='dispatch' method='post' action='sendt.php?town=".$_GET["town"]."'>
<select class='dropdown' name='type'>
<option value='0'>".$lang['reinforce']."</option>
<option value='1'>".$lang['raid']."</option>
<option value='2'>".$lang['attack']."</option>
<option value='3'>".$lang['spy']."</option>
</select> ".$lang['townOf']." <input class='textbox' name='target' type='text' value=\"".$target."\"><br /><br />
<select class='dropdown' name='general'><option value='0'>".$lang['withoutGeneral']."</option><option value='1'>".$lang['withGeneral']."</option></select> ".$lang['using']." <select class='dropdown' name='formation'><option value='0'>".$lang['standard']."</option><option value='1'>".$lang['offensive']."</option><option value='2'>".$lang['defensive']."</option></select> ".$lang['formation'].".<br />";
if (!$gen[1]) label($lang['noGeneral']); else if (!$gen[0]) label($lang['generalAway']);
for ($i=0; $i<11; $i++) echo "<tr><td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'></td><td>".$army[$i]."</td><td><input class='textbox' name='q_".$i."' type='text' size='4' maxlength='4' value='0'></td></tr>";
echo "</table>";
?>
<input class='button' type='submit' name='button0' value='<?php echo $lang['send'] ?>'>
</form>
<br /><br />
[<a class='q_link' href='csim.php?town=<?php echo $_GET["town"]; ?>'><?php echo $lang['cSim'] ?></a>]
[<a class='q_link' href='gen.php?town=<?php echo $_GET["town"]; ?>'><?php echo $lang['general'] ?></a>]<br />----------<br />
                </div>
        </div>
<div class='tabContent' id='incomingunits'>
                <div>
                <table width="650">
                <tr>
                <td>
                <?
				if (count($iaq)) ":<br />";
else echo"No incoming troops";
for ($i=0; $i<count($iaq); $i++)
{
 $twn=town($iaq[$i][1]);
 $tget=town($iaq[$i][2]);
 switch($iaq[$i][3])
 {
  case 0: $what=$lang['reinforce1']; break;
  case 1: $what=$lang['raid1']; break;
  case 2: $what=$lang['attack1']; break;
  case 3: $what=$lang['spy1']; break;
 }
 if (!$iaq[$i][4]) $what=$lang['from']." ".$twn[2]." ".$lang['wmiss']."  ".$lang['to']." ".$what; else $what=$lang['returnFrom']." ".$what." ".$lang['on']." ".$tget[2];
 echo $what."<br /> ".$lang['arrive']." <span id='it".$i."'>".$iaq[$i][0]."</span><script type='text/javascript'> var id=new Array(50); timer('it".$i."', 'tow.php?town=".$_GET["town"]."'); </script><br />";
}

?>
</td>
</tr>
</table>
                </div>
        </div>
<div class='tabContent' id='outgoingunits'>
                <div>
                                <table width="650">
                <tr>
                <td>
 	<?php
if (count($aq)) ":<br />";
else echo"No outgoing troops";
for ($i=0; $i<count($aq); $i++)
{
 $tget=town($aq[$i][1]);
 switch($aq[$i][2])
 {
  case 0: $what="reinforce"; break;
  case 1: $what="raid"; break;
  case 2: $what="attack"; break;
  case 3: $what="spy"; break;
 }
 echo "[<a class='q_link' href='cancel_a.php?town=".$_GET["town"]."&id=".$aq[$i][5]."'>x</a>] ".$lang['stroops']." ".$what." ".$lang['tcity']." ".$tget[2]." <br /> ".$lang['arrive']." <span id='".$i."'>".$aq[$i][0]."</span><script type='text/javascript'> var id=new Array(50); timer('".$i."', 'dispatch.php?town=".$_GET["town"]."'); </script><br />";
}
?>
</td></tr></table>
                </div>
        </div>
</body>
</html>
