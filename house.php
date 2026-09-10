<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 check_r($_GET["town"]);
 $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
 $faction=faction($_SESSION["user"][10]); $r=$faction[3];
 $buildings=buildings($_SESSION["user"][10]);
 $c_status=get_con($_GET["town"]);
 $units=units($faction[0]);
 
 $data=explode("-", $town[8]); $res=explode("-", $town[10]); $prod=explode("-", $town[9]); $lim=explode("-", $town[11]); $out=explode("-", $buildings[8][5]); $army=explode("-", $town[7]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<head>
<title><?php echo $title." - ".$buildings[8][2]; ?></title>
</head>

<body class="q_body">

<div align="center">
<? 
 echo"<img src='".$imgs.$fimgs."b8.gif' width='75' height='100'><br />";
 echo"<table width='650'><tr><td> ".$buildings[8][8]."</td></tr></table>";
?>
		<td class="td_content" style='height: 200'>
<?php
if ($data[8])
{
 echo $lang['availTroops'].":<table class='q_table' style='border-collapse: collapse; text-indent: 0; text-align: center;' width='650' border='1'><tr>";
 for ($i=0; $i<11; $i++) echo "<td><img src='".$imgs.$fimgs."2".$i.".gif' title='".$units[$i][2]."'></td>";
 echo "</tr><tr>";
 for ($i=0; $i<11; $i++) echo "<td>".$army[$i]."</td>";
 echo "</tr></table>------------------------------------------</br>";
 if (!$c_status[8])
		if ($data[8]<25)
		{
			$dur=explode("-", $buildings[8][6]); $upk=explode("-", $buildings[8][7]); $cost=explode("-", $buildings[8][4]); $dur[$data[8]]=explode(":", $dur[$data[8]]);
		if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost)))
			echo "<b>".$lang['upgrade']." ".$buildings[8][2]." ".$lang['toLevel']." ".($data[8]+1)."</b>";
			else
			echo "<a class='q_link' target='_parent' href='build.php?town=".$town[0]."&b=".$buildings[8][0]."&subB=-1'>".$lang['upgrade']." ".$buildings[8][2]." ".$lang['toLevel']." ".($data[8]+1)."</a>";
			$tag=$tag."</br>".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*$mcost)." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*$mcost)." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*$mcost)." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*$mcost)." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*$mcost)."</br>".$lang['duration'].":&nbsp;".($dur[$data[8]][1])."".$lang['minutes']."<br />".$lang['upkeep'].": ".$upk[$data[8]]."</br>".$lang['expSpace'].": ".$out[$data[8]];
			echo $tag;
			if ($town[12]+$town[3]+$upk[$data[8]]>$lim[3]) label("</br>".$lang['noHouses']);
			if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost))) label("</br>".$lang['noResources']);
			echo "</br>------------------------------------------</br>";
		}
		else echo $lang['buildingMaxLvl']."</br></br></br></br></br></br>";
 else echo $lang['beingUpgraded']."</br></br></br></br></br></br>";
}
else echo $lang['constrBuilding']."</br></br></br></br></br></br>";
?>
          </td>
</div>

</body>

</html>