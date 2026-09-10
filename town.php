<?php
include "include/antet.php"; 
include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=strip_tags($_GET["town"]);
 $_GET["town"]=mysql_escape_string($_GET["town"]);
 check_a($_GET["town"]);
 check_t($_GET["town"]);
 check_w($_GET["town"]);
 check_u($_GET["town"]);
 check_uup($_GET["town"]);
 check_c($_GET["town"], $_SESSION["user"][10]);
 check_r($_GET["town"]);
 $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
 $faction=faction($_SESSION["user"][10]);
 $buildings=buildings($_SESSION["user"][10]);
 $population = getpopulation($_SESSION["user"][0]);
 $cq=get_c($_GET["town"]);
 $iaq=get_ia($_GET["town"]);
 $b_names=array(); for ($i=0; $i<22; $i++) $b_names[$i]=$buildings[$i][2];
 $fl_data="<object width='635' height='575'><embed src='".$imgs.$fimgs."town.swf' type='application/x-shockwave-flash' width='650' height='575' FlashVars='tid=".$town[0]."&tname=".str_replace("'", "`", $town[2])."&data=".$town[8]."&w=".$town[16]."&bnames=".implode("/", $b_names)."&res=".$town[10]."&lim=".$town[11]."&upkeep=".($town[3]+$town[12])."&morale=".$town[5]."&prod=".$town[9]."'></embed></object>";
 $data=explode("-", $town[8]); $land=explode("/", $town[13]); $land[0]=explode("-", $land[0]); $land[1]=explode("-", $land[1]); $land[2]=explode("-", $land[2]); $land[3]=explode("-", $land[3]);
 $res=explode("-", $town[10]); $lim=explode("-", $town[11]); $prod=explode("-", $town[9]);
 if ($prod[0]-$town[3]-$town[12]<5) $prod[0]=$town[3]+$town[12]+5;//noob protection against negative crop production values
}
else {header('Location: login.php'); die();}
?>
<? include("include/town/java.php");?>
<title><?=$title?></title>
<link href="template/index/favicon.ico" rel="shortcut icon">

<head>
<body class="q_body">
<? include("include/town/header1.php");?>
<iframe name="main" src="tow.php?town=<? 
echo "".$_GET["town"]."";
?>" width="650" height="575" frameborder="0" framespacing="0" marginwidth="0" marginheight="0" framepadding="0" scrolling="no" name="main"></iframe> 
 <? include("include/town/footer.php");?>