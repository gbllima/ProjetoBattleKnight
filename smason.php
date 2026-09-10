<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 check_r($_GET["town"]);
 $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
 $faction=faction($_SESSION["user"][10]); $r=$faction[3];
 $buildings=buildings($_SESSION["user"][10]);
 $c_status=get_con($_GET["town"]);
 
 $data=explode("-", $town[8]); $res=explode("-", $town[10]); $prod=explode("-", $town[9]); $lim=explode("-", $town[11]); $land=explode("/", $town[13]); $land=explode("-", $land[2]); $out=explode("-", $buildings[2][5]);
 $name=explode("-", $buildings[2][2]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<head>
<title><?php echo $title." - ".$name[0]; ?></title>
</head>

<body class="q_body" >

<div align="center">
<? 
 echo"<img src='".$imgs.$fimgs."b2.gif' width='75' height='100'><br />";
 echo"<table width='650'><tr><td> ".$buildings[2][8]."</td></tr></table>";
?>
		<td class="td_content" style='height: 200'>
<?php
if ($data[2])
{
 if (!$c_status[2])
 for ($i=0; $i<1; $i++)
		if ($land[$i]<40)
		{
			$name=explode("-", $buildings[2][2]); $dur=explode("-", $buildings[2][6]); $upk=explode("-", $buildings[2][7]); $cost=explode("-", $buildings[2][4]); $dur[$land[$i]]=explode(":", $dur[$land[$i]]);
			if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost)))
			echo "<b>".$lang['upgrade']." ".$name[1]."  ".$lang['toLevel']." ".($land[$i]+1)."</b>";
			else
			echo "<a class='q_link' target='_parent' href='build.php?town=".$town[0]."&b=".$buildings[2][0]."&subB=".$i."'>".$lang['upgrade']." ".$name[1]."  ".$lang['toLevel']." ".($land[$i]+1)."</a>";
			$tag=$tag."<br />".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*$mcost)." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*$mcost)." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*$mcost)." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*$mcost)." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*$mcost)."<br />".$lang['duration']."&nbsp;".($dur[$land[$i]][1])."".$lang['minutes']."<br />".$lang['upkeep'].": ".$upk[$land[$i]]."<br />".$lang['expProduction'].": ".$out[$land[$i]];
			echo $tag;
			if ($town[12]+$town[3]+$upk[$land[$i]]>$lim[3]) label("<br />".$lang['noHouses']);
			if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost))) label("<br />".$lang['noResources']);
			echo "<br />------------------------------------------<br />";
		}
		else echo $lang['buildingMaxLvl']."<br /><br />";
 else echo "<br /><br /><br /><br /><br /><br />".$lang['beingUpgraded']."<br /><br /><br /><br /><br /><br /><br /><br />";
}
else echo "<br /><br /><br /><br /><br /><br />".$lang['constrBuilding']."<br /><br /><br /><br /><br /><br /><br /><br />";
?>
          </td>
</div>

</body>

</html>