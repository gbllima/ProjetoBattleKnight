<?php 
include "include/antet.php"; 
include "include/func.php";
include "include/town/check_time.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 $_GET["town"]=clean($_GET["town"]);
 check_a($_GET["town"]);
 check_t($_GET["town"]);
 check_w($_GET["town"]);
 check_u($_GET["town"]);
 check_uup($_GET["town"]);
 check_c($_GET["town"], $_SESSION["user"][10]);
 check_r($_GET["town"]);
 $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
 $faction=faction($_SESSION["user"][10]);$c_status=get_con($_GET["town"]);
 $buildings=buildings($_SESSION["user"][10]);
 $cq=get_c($_GET["town"]);
 $iaq=get_ia($_GET["town"]);
 $b_names=array(); for ($i=0; $i<22; $i++) $b_names[$i]=$buildings[$i][2];
 $data=explode("-", $town[8]); $land=explode("/", $town[13]); $land[0]=explode("-", $land[0]); $land[1]=explode("-", $land[1]); $land[2]=explode("-", $land[2]); $land[3]=explode("-", $land[3]);
 $res=explode("-", $town[10]); $lim=explode("-", $town[11]); $prod=explode("-", $town[9]);
 if ($prod[0]-$town[3]-$town[12]<5) $prod[0]=$town[3]+$town[12]+5;//noob protection against negative crop production values
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<script type="text/javascript">
	var rememberPositionedInCookie = false;
	var rememberPosition_cookieName = 'demo';
	</script>	
	<script type="text/javascript" src="js/dragable-content.js"></script>
	<script src="js/time.js" type="text/javascript"></script>
<head>
<title><?php echo $title; ?> - <?php echo $lang['town'] ?></title>
</head>

<body class="q_body">
<?
 $query="select count(*) from reports where recipient=".$_SESSION["user"][0]." and timediff((select lastVisit from users where id=".$_SESSION["user"][0]."), sent)<'00:00:01'";
 $result=mysql_query($query, $db_id);
 $row[0]=mysql_fetch_row($result);
 $row[0]=$row[0][0];
 
 $query="select count(*) from messages where recipient=".$_SESSION["user"][0]." and timediff((select lastVisit from users where id=".$_SESSION["user"][0]."), sent)<'00:00:01'";
 $result=mysql_query($query, $db_id);
 $row[1]=mysql_fetch_row($result); 
 $row[1]=$row[1][0];
  echo "
<div id='text1' style='position:absolute; overflow:hidden; left:65px; top:20px; width:176px; height:35px; z-index:19'>
<div>
<div><font><b>Текущее время:</b> <span id='tick_tack'></span></font></div>

</div></div>";

?>
<div align="center">
		<td class="td_content">
<?php
if (!isset($_GET["v"]))
{
	
      echo "
<div id='back' style='position:absolute;  left:0px; top:0px; width:635px; height:575px; z-index:0'><img src='".$imgs.$fimgs."".$status."/back.png' alt='' title='' border=0 width=635 height=575></div>"; 
//gmill(0)
if ($c_status[0])
echo "<div id='gmill' class='dragableElement' style='position:absolute; left:86px; top:452px; width:75px; height:100px; z-index:12'><a href='gmill.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b0_.gif' name='gmill' title='".$lang['buildings'][0][0][0]."' border=0 width=75 height=100 ></a></div>";
         if ($data[0]) 
		 if (!$c_status[0])
		 echo "<div id='gmill' class='dragableElement' style='position:absolute; left:86px; top:452px; width:75px; height:100px; z-index:12'><a href='gmill.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b0.gif' name='gmill' title='".$lang['buildings'][0][0][0]."' border=0 width=75 height=100 ></a></div>";
		 else
		 echo "<div id='gmill' class='dragableElement' style='position:absolute; left:86px; top:452px; width:75px; height:100px; z-index:12'><a href='gmill.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b0_.gif' name='gmill' title='".$lang['buildings'][0][0][0]."' border=0 width=75 height=100 ></a></div>";
		 
//lumbermill(1)
if ($c_status[1])
 echo "<div id='lumber mill' class='dragableElement' style='position:absolute;  left:27px; top:54px; width:75px; height:100px;z-index:14'><a href='lmill.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b1_.gif' title='".$lang['buildings'][0][1][0]."' border=0 width=75 height=100></a></div>";
         if ($data[1]) 
		  if (!$c_status[1])
		 echo "<div id='lumber mill' class='dragableElement' style='position:absolute;  left:27px; top:54px; width:75px; height:100px;z-index:14'><a href='lmill.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b1.gif' title='".$lang['buildings'][0][1][0]."' border=0 width=75 height=100></a></div>";
		 else
		  echo "<div id='lumber mill' class='dragableElement' style='position:absolute;  left:27px; top:54px; width:75px; height:100px;z-index:14'><a href='lmill.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b1_.gif' title='".$lang['buildings'][0][1][0]."' border=0 width=75 height=100></a></div>";
//stone mason(2)
if ($c_status[2])
 echo "<div id='stone mason' class='dragableElement' style='position:absolute;  left:429px; top:467px; width:75px; height:100px; z-index:10'><a href='smason.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b2_.gif' alt='' title='".$lang['buildings'][0][2][0]."' border=0 width=75 height=100></a></div>";
         if ($data[2]) 
		 if (!$c_status[2])
		 echo "<div id='stone mason' class='dragableElement' style='position:absolute;  left:429px; top:467px; width:75px; height:100px; z-index:10'><a href='smason.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b2.gif' alt='' title='".$lang['buildings'][0][2][0]."' border=0 width=75 height=100></a></div>";
		 else
		  echo "<div id='stone mason' class='dragableElement' style='position:absolute;  left:429px; top:467px; width:75px; height:100px; z-index:10'><a href='smason.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b2_.gif' alt='' title='".$lang['buildings'][0][2][0]."' border=0 width=75 height=100></a></div>";
//ifoundry(3)
if ($c_status[3])
echo "<div id='ifoundry' class='dragableElement' style='position:absolute;  left:88px; top:196px; width:80px; height:100px; z-index:13'><a href='ifoundry.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b18_.gif' alt='' title='".$lang['buildings'][0][3][0]."' border=0 width=80 height=100></a></div>";
         if ($data[3]) 
		  if (!$c_status[3])
		  echo "<div id='ifoundry' class='dragableElement' style='position:absolute;  left:88px; top:196px; width:80px; height:100px; z-index:13'><a href='ifoundry.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b18.gif' alt='' title='".$lang['buildings'][0][3][0]."' border=0 width=80 height=100></a></div>";
		  else
		  echo "<div id='ifoundry' class='dragableElement' style='position:absolute;  left:88px; top:196px; width:80px; height:100px; z-index:13'><a href='ifoundry.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b18_.gif' alt='' title='".$lang['buildings'][0][3][0]."' border=0 width=80 height=100></a></div>";
//granary(4)
 if ($c_status[4])
 echo "<div id='granary' class='dragableElement' style='position:absolute;  left:315px; top:52px; width:75px; height:100px; z-index:7'><a href='granary.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b4_.gif' alt='' title='".$lang['buildings'][0][4][0]."' border=0 width=75 height=100></a></div>";
         if ($data[4]) 
		 if (!$c_status[4])
		 echo "<div id='granary' class='dragableElement' style='position:absolute;  left:315px; top:52px; width:75px; height:100px; z-index:7'><a href='granary.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b4.gif' alt='' title='".$lang['buildings'][0][4][0]."' border=0 width=75 height=100></a></div>";
		 else
		  echo "<div id='granary' class='dragableElement' style='position:absolute;  left:315px; top:52px; width:75px; height:100px; z-index:7'><a href='granary.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b4_.gif' alt='' title='".$lang['buildings'][0][4][0]."' border=0 width=75 height=100></a></div>";
//warehouse(5)
if ($c_status[5])
 echo "<div id='warehouse' class='dragableElement' style='position:absolute;  left:89px; top:270px; width:75px; height:100px; z-index:11'><a href='warehouse.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b5_.gif' alt='' title='".$lang['buildings'][0][5][0]."' border=0 width=75 height=100></a></div>";
         if ($data[5])
		 if (!$c_status[5])
		 echo "<div id='warehouse' class='dragableElement' style='position:absolute;  left:89px; top:270px; width:75px; height:100px; z-index:11'><a href='warehouse.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b5.gif' alt='' title='".$lang['buildings'][0][5][0]."' border=0 width=75 height=100></a></div>";
		 else
		 echo "<div id='warehouse' class='dragableElement' style='position:absolute;  left:89px; top:270px; width:75px; height:100px; z-index:11'><a href='warehouse.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b5_.gif' alt='' title='".$lang['buildings'][0][5][0]."' border=0 width=75 height=100></a></div>";
//cache(6)
if ($c_status[6])
echo "<div id='granary' class='dragableElement' style='position:absolute; overflow:hidden; left:240px; top:108px; width:75px; height:100px; z-index:7'><a href='cache.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b6_.gif' alt='' title='".$lang['buildings'][0][6][0]."' border=0 width=75 height=100></a></div>";
         if ($data[6]) 
		 if (!$c_status[6])
		 echo "<div id='granary' class='dragableElement' style='position:absolute; overflow:hidden; left:240px; top:108px; width:75px; height:100px; z-index:7'><a href='cache.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b6.gif' alt='' title='".$lang['buildings'][0][6][0]."' border=0 width=75 height=100></a></div>
";
else
 echo "<div id='granary' class='dragableElement' style='position:absolute; overflow:hidden; left:240px; top:108px; width:75px; height:100px; z-index:7'><a href='cache.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b6_.gif' alt='' title='".$lang['buildings'][0][6][0]."' border=0 width=75 height=100></a></div>";
//Town hall(7)
         if ($data[7]) 
		 if (!$c_status[7])
		 echo "<div id='hall' class='dragableElement' style='position:absolute;  left:313px; top:199px; width:81px; height:100px; z-index:4'><a href='hall.php?town=".$town[0]."' title='".$lang['buildings'][0][7][0]."'><img src='".$imgs.$fimgs."b7.gif' name='hall' border=0 width=81 height=100></a></div>";
		 else
		  echo "<div id='hall' class='dragableElement' style='position:absolute;  left:313px; top:199px; width:81px; height:100px; z-index:4'><a href='hall.php?town=".$town[0]."' title='".$lang['buildings'][0][7][0]."'><img src='".$imgs.$fimgs."b7_.gif' name='hall' border=0 width=81 height=100></a></div>";
//House(8)
if ($c_status[8])
echo "<div id='house' class='dragableElement' style='position:absolute;  left:262px; top:277px; width:75px; height:100px; z-index:8'><a href='house.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b8_.gif' alt='' title='".$lang['buildings'][0][8][0]."' border=0 width=75 height=100></a></div>";
         if ($data[8]) 
		  if (!$c_status[8])
		 echo "<div id='house' class='dragableElement' style='position:absolute;  left:262px; top:277px; width:75px; height:100px; z-index:8'><a href='house.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b8.gif' alt='' title='".$lang['buildings'][0][8][0]."' border=0 width=75 height=100></a></div>";
		 else
		  echo "<div id='house' class='dragableElement' style='position:absolute;  left:262px; top:277px; width:75px; height:100px; z-index:8'><a href='house.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b8_.gif' alt='' title='".$lang['buildings'][0][8][0]."' border=0 width=75 height=100></a></div>";
//embassy(9)
if ($c_status[9])
echo "<div id='embassy' class='dragableElement' style='position:absolute;  left:190px; top:218px; width:75px; height:100px; z-index:17'><a href='embassy.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b9_.gif' alt='' title='".$lang['buildings'][0][9][0]."' border=0 width=75 height=100></a></div>";
         if ($data[9]) 
		 if (!$c_status[9])
		 echo "<div id='embassy' class='dragableElement' style='position:absolute;  left:190px; top:218px; width:75px; height:100px; z-index:17'><a href='embassy.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b9.gif' alt='' title='".$lang['buildings'][0][9][0]."' border=0 width=75 height=100></a></div>";
		 else
		  echo "<div id='embassy' class='dragableElement' style='position:absolute;  left:190px; top:218px; width:75px; height:100px; z-index:17'><a href='embassy.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b9_.gif' alt='' title='".$lang['buildings'][0][9][0]."' border=0 width=75 height=100></a></div>";
//marketplace(10)
if ($c_status[10])
echo "<div id='marketplace' class='dragableElement' style='position:absolute;  left:468px; top:211px; width:79px; height:100px; z-index:16'><a href='marketplace.php?town=".$town[0]."' title='marketplace'><img src='".$imgs.$fimgs."b10_.gif' alt='' title='".$lang['buildings'][0][10][0]."' border=0 width=79 height=100></a></div>";
         if ($data[10]) 
		  if (!$c_status[10])
		 echo "<div id='marketplace' class='dragableElement' style='position:absolute;  left:468px; top:211px; width:79px; height:100px; z-index:16'><a href='marketplace.php?town=".$town[0]."' title='marketplace'><img src='".$imgs.$fimgs."b10.gif' alt='' title='".$lang['buildings'][0][10][0]."' border=0 width=79 height=100></a></div>";
		 else
		  echo "<div id='marketplace' class='dragableElement' style='position:absolute;  left:468px; top:211px; width:79px; height:100px; z-index:16'><a href='marketplace.php?town=".$town[0]."' title='marketplace'><img src='".$imgs.$fimgs."b10_.gif' alt='' title='".$lang['buildings'][0][10][0]."' border=0 width=79 height=100></a></div>";
//cathedral(11)
if ($c_status[11])
echo "<div id='cathedral' class='dragableElement' style='position:absolute;  left:433px; top:299px; width:75px; height:100px; z-index:6'><a href='cathedral.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b11_.gif' alt='' title='".$lang['buildings'][0][11][0]."' border=0 width=75 height=100></a></div>";
         if ($data[11]) 
		 if (!$c_status[11])
		 echo "<div id='cathedral' class='dragableElement' style='position:absolute;  left:433px; top:299px; width:75px; height:100px; z-index:6'><a href='cathedral.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b11.gif' alt='' title='".$lang['buildings'][0][11][0]."' border=0 width=75 height=100></a></div>";
		 else
		  echo "<div id='cathedral' class='dragableElement' style='position:absolute;  left:433px; top:299px; width:75px; height:100px; z-index:6'><a href='cathedral.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b11_.gif' alt='' title='".$lang['buildings'][0][11][0]."' border=0 width=75 height=100></a></div>";
//palace(12)
         if ($data[12]) 
		 echo "<div id='palace' class='dragableElement' style='position:absolute;  left:137px; top:108px; width:85px; height:100px; z-index:18'><a href='palace.php?town=".$town[0]."' title='Palace'><img src='".$imgs.$fimgs."b12.gif' alt='' title='".$lang['buildings'][0][12][0]."' border=0 width=75 height=100></a></div>";
		 
//wall(13)
         if ($data[13]) 
		 echo "<div id='wall' style='position:absolute;  left:68px; top:39px; width:522px; height:477px;'><a href='wall.php?town=".$town[0]."' title='wall'><img src='".$imgs.$fimgs."b13.png' alt='' title='".$lang['buildings'][0][13][0]."' border=0 width=522 height=477></a></div>";
//tower(14)
 if ($c_status[14])
 echo "<div id='tower' class='dragableElement' style='position:absolute;  left:531px; top:384px; width:75px; height:100px; z-index:3'><a href='tower.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b14_.gif' alt='' title='".$lang['buildings'][0][14][0]."' border=0 width=75 height=100></a></div>";
         if ($data[14]) 
		  if (!$c_status[14])
		 echo "<div id='tower' class='dragableElement' style='position:absolute;  left:531px; top:384px; width:75px; height:100px; z-index:3'><a href='tower.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b14.gif' alt='' title='".$lang['buildings'][0][14][0]."' border=0 width=75 height=100></a></div>";
		 else
		 echo "<div id='tower' class='dragableElement' style='position:absolute;  left:531px; top:384px; width:75px; height:100px; z-index:3'><a href='tower.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b14_.gif' alt='' title='".$lang['buildings'][0][14][0]."' border=0 width=75 height=100></a></div>";
//barracks(15)
if ($c_status[15])
 echo "<div id='barracks' class='dragableElement' style='position:absolute;  left:402px; top:69px; width:75px; height:100px; z-index:15'><a href='barracks.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b15_.gif' alt='' title='".$lang['buildings'][0][15][0]."' border=0 width=75 height=100></a></div>";
         if ($data[15]) 
		   if (!$c_status[15])
		 echo "<div id='barracks' class='dragableElement' style='position:absolute;  left:402px; top:69px; width:75px; height:100px; z-index:15'><a href='barracks.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b15.gif' alt='' title='".$lang['buildings'][0][15][0]."' border=0 width=75 height=100></a></div>";
		 else
		 echo "<div id='barracks' class='dragableElement' style='position:absolute;  left:402px; top:69px; width:75px; height:100px; z-index:15'><a href='barracks.php?town=".$town[0]."'><img src='".$imgs.$fimgs."b15_.gif' alt='' title='".$lang['buildings'][0][15][0]."' border=0 width=75 height=100></a></div>";
//academy(16)
 if ($c_status[16])
 echo "<div id='academy' class='dragableElement' style='position:absolute;  left:171px; top:340px; width:78px; height:100px; z-index:9'><a href='academy.php?town=".$town[0]."' title='Academy'><img src='".$imgs.$fimgs."b16_.gif' alt='' title='".$lang['buildings'][0][16][0]."' border=0 width=78 height=100></a></div>";
if ($data[16]) 
 if (!$c_status[16])
 echo "<div id='academy' class='dragableElement' style='position:absolute;  left:171px; top:340px; width:78px; height:100px; z-index:9'><a href='academy.php?town=".$town[0]."' title='Academy'><img src='".$imgs.$fimgs."b16.gif' alt='' title='".$lang['buildings'][0][16][0]."' border=0 width=78 height=100></a></div>";
 else
  echo "<div id='academy' class='dragableElement' style='position:absolute;  left:171px; top:340px; width:78px; height:100px; z-index:9'><a href='academy.php?town=".$town[0]."' title='Academy'><img src='".$imgs.$fimgs."b16_.gif' alt='' title='".$lang['buildings'][0][16][0]."' border=0 width=78 height=100></a></div>";
      
//Building end      
echo "<br /><br /><br /><br /><br />";
} else echo $fl_data;

?>
      </td>
</div>


</body>

</html>