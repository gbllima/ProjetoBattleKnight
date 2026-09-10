<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
check_r($_GET["town"]);
$town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
$faction=faction($_SESSION["user"][10]); $r=$faction[3];
$buildings=buildings($_SESSION["user"][10]);
$c_status=get_con($_GET["town"]);

$data=explode("-", $town[8]); $res=explode("-", $town[10]); $prod=explode("-", $town[9]); $lim=explode("-", $town[11]);
$land=explode("/", $town[13]); $land[0]=explode("-", $land[0]); $land[1]=explode("-", $land[1]); $land[2]=explode("-", $land[2]); $land[3]=explode("-", $land[3]);
$name=explode("-", $buildings[7][2]); if ($data[7]==10) $name=$name[1]; else $name=$name[0];
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<script type="text/javascript">
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
<title><?php echo $title." - ".$name; ?></title>
</head>                                         

<body class="q_body" onLoad="inittabs();">

<div align="center">
  <ul id='tabs'>
         <li><a href='#upgth'><? echo"Upgrade Town hall"?></a></li>
         <li><a href='#cb'><? echo"Construct buildings"?></a></li>
            <li><a href='#st'><? echo"Set taxes"?></a></li>
            <li><a href='#rv'><? echo"Rename village"?></a></li>

            
        </ul>
       
          <div class='tabContent' id='upgth'>
                <div>
                <table width="650">
                <tr>
                <td>
                <center>
          <p>
          	<? echo"<img src='".$imgs.$fimgs."b7.gif' width='75' height='100'>";
 echo"<table width='650'><tr><td> ".$buildings[7][8]."</td></tr></table>";?>
                     <?php
                        if (($data[7]<10)&&(!$c_status[7]))                                                                                 
                        {
                         $dur=explode("-", $buildings[7][6]); $upk=explode("-", $buildings[7][7]); $cost=explode("-", $buildings[7][4]); $dur[$data[7]]=explode(":", $dur[$data[7]]);
						  if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost)))
						  echo "<b>".$lang['upgrade']." ".$name." ".$lang['toLevel']." ".($data[7]+1)."</b>";
						  else
						  echo "<a class='q_link' target='_parent' href='build.php?town=".$town[0]."&b=".$buildings[7][0]."&subB=-1'>".$lang['upgrade']." ".$name." ".$lang['toLevel']." ".($data[7]+1)."</a>";
						  
                         $tag=$tag."<br />".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*$mcost)." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*$mcost)." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*$mcost)." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*$mcost)." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*$mcost)."<br />".$lang['duration'].":&nbsp;".($dur[$data[7]][1])."".$lang['minutes']."<br />".$lang['upkeep'].": ".$upk[$data[7]];
                         echo $tag;
                         if ($town[12]+$town[3]+$upk[$data[7]]>$lim[3]) label("<br />".$lang['noHouses']);
                         if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost))) label("<br />".$lang['noResources']);
                         echo "<br />------------------------------------------<br />";
                        }
                     ?>
                    
										</p>
                                        </td></tr></table></div></div>
         
          <div class='tabContent' id='cb'>
                <div>
                <table width="650">
                <tr>
                <td> <center>
          <p><?php echo $lang['buildDesc'] ?><br />
            <br />
<?php for ($i=0; $i<count($buildings); $i++)
                   if ((!$c_status[$i])&&(!$data[$i]))
                   {
                     if (($town[16]!=1)||($i!=12)) echo "<img src=".$imgs.$fimgs."b".$i.".gif title='".$buildings[$i][2]."' width=75 heigh=100><br />";
                     $okreq=1; $ok=1;
                     $name=explode("-", $buildings[$i][2]); $req=explode("/", $buildings[$i][3]); $dur=explode("-", $buildings[$i][6]); $upk=explode("-", $buildings[$i][7]); $cost=explode("-", $buildings[$i][4]); $dur[$data[$i]]=explode(":", $dur[$data[$i]]);
                         for ($j=0; $j<count($req); $j++)
						 if (!(($res[0]>=$cost[0])&&($res[1]>=$cost[1])&&($res[2]>=$cost[2])&&($res[3]>=$cost[3])&&($res[4]>=$cost[4])))
                         $tag="<b>".$lang['build']." ".$name[0]."<br /></b>".$buildings[$i][8]."";
                       else
					    $tag="<a class='q_link' target='_parent' href='build.php?town=".$town[0]."&b=".$buildings[$i][0]."&subB=-1'>".$lang['build']." ".$name[0]."</a><br />".$buildings[$i][8]."";
					   
                         $tag=$tag."<br />".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".$cost[0]*$mcost." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".$cost[1]*$mcost." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".$cost[2]*$mcost."<img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".$cost[3]*$mcost." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".$cost[4]*$mcost."<br />".$lang['duration'].":&nbsp;".($dur[$data[$i]][1])."minutes<br />".$lang['upkeep'].": ".$upk[0];
                         if (($town[16]==1)&&($i==12)) $ok=0;
                         if ($ok)
                         {
                          echo $tag;
                          if ($town[12]+$town[3]+$upk[$data[$i]]>$lim[3]) label("<br />".$lang['noHouses']);
                          if (!$okreq) label("<br />".$lang['reqNotMet']);
                          if (!(($res[0]>=$cost[0])&&($res[1]>=$cost[1])&&($res[2]>=$cost[2])&&($res[3]>=$cost[3])&&($res[4]>=$cost[4]))) label("<br />".$lang['noResources']);
                          echo "<br />------------------------------------------<br />";
                         }
                        } ?>
              </p></td></tr></table></div></div>
              
                <div class='tabContent' id='st'>
                <div>
                <table width="650">
                <tr>
                <td> <center>
                 <p><?php echo $lang['taxesDesc'] ?></p>
          <form name="form1" method="post" action="taxes.php?town=<?php echo $_GET["town"]; ?>">
            <input class='textbox' name="taxes" type="text" size="5" value="<?php echo $prod[4]; ?>">
            <input class='button' type="submit" value="<?php echo $lang['setTaxes'] ?>">
          </form>
          </td></tr></table></div></div>
          
           <div class='tabContent' id='rv'>
                <div>
                <table width="650">
                <tr>
                <td> <center>
                	<form name="form1" method="post" action="town_edit_.php?town=<?php echo $_GET["town"]; ?>">
		  <p><?php echo $lang['townName'] ?>: <br />
		    <input class='textbox' type="text" name="name" value="<?php echo $town[2]; ?>">
          </p>
		  <p><?php echo $lang['description'] ?>:  <br />
		    <textarea class='textbox' name="desc" cols="45" rows="5"><?php echo $town[14]; ?></textarea>
		  </p>
		  <p>
		    <input class='button' type="submit" name="button" value="<?php echo $lang['save'] ?>">
		  </p>
		</form>
                </center></td></tr></table></div></div>
              
              
              </div>

</body>

</html>