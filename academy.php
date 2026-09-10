<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 check_r($_GET["town"]);
 check_uup($_GET["town"]);
 $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
 $faction=faction($_SESSION["user"][10]); $r=$faction[3];
 $buildings=buildings($_SESSION["user"][10]);
 $upq=get_up($_GET["town"]);
 $c_status=get_con($_GET["town"]);
 $units=units($faction[0]);
 $uup_status=get_uup($town[0]);
 
 $data=explode("-", $town[8]); $res=explode("-", $town[10]); $prod=explode("-", $town[9]); $lim=explode("-", $town[11]); $u_upgrades=explode("-", $town[17]); $w_upgrades=explode("-", $town[18]); $a_upgrades=explode("-", $town[19]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<script type="text/javascript">
var tabLinks = new Array();
var contentDivs = new Array();
var data=new Array(11);
</script>
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
<head>
<title><?php echo $title." - ".$buildings[16][2]; ?></title>
</head>

<body class="q_body" onLoad="inittabs();">

<div align="center">
		<td class="td_content">
          <p>
          <? 
		echo"  <img src='".$imgs.$fimgs."b15.gif' width='75' height='100'><br />
		  ".$buildings[16][8]."<br /><br />"; ?>
            <?  if (count($upq)) echo "<b>".$lang['unitUpgQueue']."</b>:<br />";
 for ($i=0; $i<count($upq); $i++) echo "
 <table width='650' border='1'><tr><td align='center'>[<a class='q_link' href='cancel_uup.php?town=".$_GET["town"]."&unit=".$upq[$i][1]."&tree=".$upq[$i][2]."'>x</a>] ".$units[$upq[$i][1]][2]." - <span id='".$i."'>".$upq[$i][0]."</span><script type='text/javascript'> var id=new Array(50); timer('".$i."', 'academy.php?town=".$_GET["town"]."'); </script></td></tr></table>";
 
 ?>   
		    <ul id='tabs'>
         <li><a href='#resunits'><? echo"Research units"?></a></li>
         <li><a href='#resdef&attack'><? echo"Research atack&defence"?></a></li>

        </ul>
      
        <div class='tabContent' id='resunits'>
                <div>
          <table class="q_table" style="border-collapse: collapse; text-indent: 0; margin-left:auto; margin-right:auto; text-align: center;" width="600" border="1">
            <tr>
              <td><?php echo $lang['unitType'] ?></td>
              <td><?php echo $lang['hitPoints'] ?></td>
            </tr>
<?php
if ($data[16])
{
 for ($i=0; $i<count($units); $i++)
 {
		$cost=explode("-", $units[$i][4]);
  if ($u_upgrades[$i]<10)
   if (!$uup_status[$i]) echo "<tr><td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'><br />".$units[$i][10]."</td><td style='white-space: nowrap'><a class='q_link' href='u_upgrade.php?unit=".$units[$i][0]."&tree=17&town=".$_GET["town"]."'>".$lang['upgrade']." ".$lang['toLevel']." ".($u_upgrades[$i]+1)."</a><br />".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*($u_upgrades[$i]+1))." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*($u_upgrades[$i]+1))." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*($u_upgrades[$i]+1))." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*($u_upgrades[$i]+1))." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*($u_upgrades[$i]+1))."<br />".$lang['duration'].": ".$units[$i][9].", ".$lang['hp'].": ".($units[$i][5]+$u_upgrades[$i]+1).", ".$lang['speed'].": ".$units[$i][8]."</td></tr>";
   else echo "<tr><td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'><br />".$units[$i][10]."</td><td>".$lang['upgrading']."</td></tr>";
  else echo "<tr><td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'><br />".$units[$i][10]."<br /></td><td>".$lang['hp'].": ".($units[$i][5]+$u_upgrades[$i]).", ".$lang['speed'].": ".$units[$i][8]."</td></tr>";
 }
 echo "</table>";

}
else echo $lang['constrBuilding'];
?>
		  </p>
 </div>
        </div>
       <div class='tabContent' id='resdef&attack'>
                <div>
                		  <table class="q_table" style="border-collapse: collapse; text-indent: 0; text-align: center; margin-left:auto; margin-right:auto;" width="600" border="1">
            <tr>
              <td><?php echo $lang['unitType'] ?></td>
              <td colspan='2'><?php echo $lang['weapon']." & ".$lang['armor'] ?></td>
            </tr>
<?php
{
 for ($i=0; $i<count($units); $i++)
 {
  $cost=explode("-", $units[$i][4]);
  if ($w_upgrades[$i]<10) $wl="<a class='q_link' href='u_upgrade.php?unit=".$units[$i][0]."&tree=18&town=".$_GET["town"]."'>".$lang['upgrade']." ".$lang['toLevel']." ".($w_upgrades[$i]+1)."</a></br>".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*($w_upgrades[$i]+1))." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*($w_upgrades[$i]+1))." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*($w_upgrades[$i]+1))." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*($w_upgrades[$i]+1))." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*($w_upgrades[$i]+1))."</br>".$lang['duration'].": ".$units[$i][9].", ".$lang['atk'].": ".($units[$i][6]+$w_upgrades[$i]+1); else $wl=$lang['atk'].": ".($units[$i][6]+$w_upgrades[$i]);
  if ($a_upgrades[$i]<10) $al="<a class='q_link' href='u_upgrade.php?unit=".$units[$i][0]."&tree=19&town=".$_GET["town"]."'>".$lang['upgrade']." ".$lang['toLevel']." ".($a_upgrades[$i]+1)."</a></br>".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*($a_upgrades[$i]+1))." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*($a_upgrades[$i]+1))." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*($a_upgrades[$i]+1))." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*($a_upgrades[$i]+1))." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*($a_upgrades[$i]+1))."</br>".$lang['duration'].": ".$units[$i][9].", ".$lang['def'].": ".($units[$i][7]+$a_upgrades[$i]+1); else $al=$lang['def'].": ".($units[$i][7]+$a_upgrades[$i]);
  if (!$uup_status[$i]) echo "<tr><td rowspan='2'><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'></br>".$units[$i][10]."</td><td>".$lang['weapon']."</td><td style='white-space: nowrap'>".$wl."</td></tr><tr><td>".$lang['armor']."</td><td style='white-space: nowrap'>".$al."</td></tr>";
		else echo "<tr><td rowspan='2'><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'></br>".$units[$i][10]."</td><td>".$lang['weapon']."</td><td rowspan='2'>".$lang['upgrading']."</td></tr><tr><td>".$lang['armor']."</td></tr>";
 }
 echo "</table>";
}
?>
                
                </div></div> 

</body>

</html>