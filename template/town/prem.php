<?php include "include/antet.php"; include "include/func.php";
$usr=user($_SESSION["user"][0]);
$town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) header('Location: login.php');
$data=split("-", $town[8]); $res=split("-", $town[10]); $prod=split("-", $town[9]); $lim=split("-", $town[11]);
//gestione bonus
if($_GET['bonus']=='1k'){

    if($usr[7]>=2){

  $query="update users set points=points-2 where id=".$_SESSION["user"][0];
            mysql_query($query, $db_id);
   
	  $query1="select resources,limits,production from towns where id=".$_GET["town"];
      $result1=mysql_query($query1, $db_id);
      $row=mysql_fetch_row($result1);
      $pro=split("-", $row[2]);
      $res=split("-", $row[0]);
      $lim=split("-", $row[1]);
      $lim_r=$lim[1];
      $lim_oro=$lim[2];
 $res[0]+=$pro[0]+1000;
  $res[1]+=$pro[1]+1000;
   $res[2]+=$pro[2]+1000;
    $res[3]+=$pro[3]+1000;
	 $res[4]+=$pro[4]+1000;


      $resources=$res[0].'-'.$res[1].'-'.$res[2].'-'.$res[3].'-'.$res[4];
         $query="update towns set resources='$resources' where id=".$_GET["town"];

        mysql_query($query, $db_id);

        $msx='Resources purchased';

    }else{

        $msx='You don\'t have enough points to buy this bonus!!';

   } 
   $usr=user($_SESSION["user"][0]);

    $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) header('Location: login.php');

    $data=split("-", $town[8]); $res=split("-", $town[10]); $prod=split("-", $town[9]); $lim=split("-", $town[11]);}  
   //5k
  if($_GET['bonus']=='5k'){

    if($usr[7]>=9){

  $query="update users set points=points-9 where id=".$_SESSION["user"][0];
            mysql_query($query, $db_id);
   
	  $query1="select resources,limits,production from towns where id=".$_GET["town"];
      $result1=mysql_query($query1, $db_id);
      $row=mysql_fetch_row($result1);
      $pro=split("-", $row[2]);
      $res=split("-", $row[0]);
      $lim=split("-", $row[1]);
      $lim_r=$lim[1];
      $lim_oro=$lim[2];
 $res[0]+=$pro[0]+5000;
  $res[1]+=$pro[1]+5000;
   $res[2]+=$pro[2]+5000;
    $res[3]+=$pro[3]+5000;
	 $res[4]+=$pro[4]+5000;


      $resources=$res[0].'-'.$res[1].'-'.$res[2].'-'.$res[3].'-'.$res[4];
         $query="update towns set resources='$resources' where id=".$_GET["town"];

        mysql_query($query, $db_id);

        $msx='Resources purchased';

    }else{

        $msx='You don\'t have enough points to buy this bonus!!';

   } 
   $usr=user($_SESSION["user"][0]);

    $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) header('Location: login.php');

    $data=split("-", $town[8]); $res=split("-", $town[10]); $prod=split("-", $town[9]); $lim=split("-", $town[11]);}  
   //10k
 if($_GET['bonus']=='10k'){

    if($usr[7]>=17){

  $query="update users set points=points-17 where id=".$_SESSION["user"][0];
            mysql_query($query, $db_id);
   
	  $query1="select resources,limits,production from towns where id=".$_GET["town"];
      $result1=mysql_query($query1, $db_id);
      $row=mysql_fetch_row($result1);
      $pro=split("-", $row[2]);
      $res=split("-", $row[0]);
      $lim=split("-", $row[1]);
      $lim_r=$lim[1];
      $lim_oro=$lim[2];
 $res[0]+=$pro[0]+10000;
  $res[1]+=$pro[1]+10000;
   $res[2]+=$pro[2]+10000;
    $res[3]+=$pro[3]+10000;
	 $res[4]+=$pro[4]+10000;


      $resources=$res[0].'-'.$res[1].'-'.$res[2].'-'.$res[3].'-'.$res[4];
         $query="update towns set resources='$resources' where id=".$_GET["town"];

        mysql_query($query, $db_id);

        $msx='Resources purchased';

    }else{

        $msx='You don\'t have enough points to buy this bonus!!';

   } 
   $usr=user($_SESSION["user"][0]);

    $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) header('Location: login.php');

    $data=split("-", $town[8]); $res=split("-", $town[10]); $prod=split("-", $town[9]); $lim=split("-", $town[11]);}  
   //50k
 if($_GET['bonus']=='50k'){

    if($usr[7]>=60){

  $query="update users set points=points-60 where id=".$_SESSION["user"][0];
            mysql_query($query, $db_id);
   
	  $query1="select resources,limits,production from towns where id=".$_GET["town"];
      $result1=mysql_query($query1, $db_id);
      $row=mysql_fetch_row($result1);
      $pro=split("-", $row[2]);
      $res=split("-", $row[0]);
      $lim=split("-", $row[1]);
      $lim_r=$lim[1];
      $lim_oro=$lim[2];
 $res[0]+=$pro[0]+50000;
  $res[1]+=$pro[1]+50000;
   $res[2]+=$pro[2]+50000;
    $res[3]+=$pro[3]+50000;
	 $res[4]+=$pro[4]+50000;


      $resources=$res[0].'-'.$res[1].'-'.$res[2].'-'.$res[3].'-'.$res[4];
         $query="update towns set resources='$resources' where id=".$_GET["town"];

        mysql_query($query, $db_id);

        $msx='Resources purchased';

    }else{

        $msx='You don\'t have enough points to buy this bonus!!';

   } 
   $usr=user($_SESSION["user"][0]);

    $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) header('Location: login.php');

    $data=split("-", $town[8]); $res=split("-", $town[10]); $prod=split("-", $town[9]); $lim=split("-", $town[11]);}  
   //
if($_GET['bonus']=='100k'){

    if($usr[7]>=100){

  $query="update users set points=points-100 where id=".$_SESSION["user"][0];
            mysql_query($query, $db_id);
   
	  $query1="select resources,limits,production from towns where id=".$_GET["town"];
      $result1=mysql_query($query1, $db_id);
      $row=mysql_fetch_row($result1);
      $pro=split("-", $row[2]);
      $res=split("-", $row[0]);
      $lim=split("-", $row[1]);
      $lim_r=$lim[1];
      $lim_oro=$lim[2];
 $res[0]+=$pro[0]+100000;
  $res[1]+=$pro[1]+100000;
   $res[2]+=$pro[2]+100000;
    $res[3]+=$pro[3]+100000;
	 $res[4]+=$pro[4]+100000;


      $resources=$res[0].'-'.$res[1].'-'.$res[2].'-'.$res[3].'-'.$res[4];
         $query="update towns set resources='$resources' where id=".$_GET["town"];

        mysql_query($query, $db_id);

        $msx='Resources purchased';

    }else{

        $msx='You don\'t have enough points to buy this bonus!!';

   } 
   $usr=user($_SESSION["user"][0]);

    $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) header('Location: login.php');

    $data=split("-", $town[8]); $res=split("-", $town[10]); $prod=split("-", $town[9]); $lim=split("-", $town[11]);}  
   //

?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<script type="text/javascript">
var tabLinks = new Array();
var contentDivs = new Array();
var data=new Array(11);
</script>
<head>
</head>
<title>Premium zone</title>
<body class="q_body" onLoad="inittabs();">
<table width="650"><tr><td>
        <ul id='tabs'>
            <li><a href='#buyres'>Buy Resources</a></li>
            <li><a href='#buyarmy'>Buy Troops</a></li>
            <li><a href='#buycoins'>Get coins</a></li>
        </ul>
        </td></tr></table>
        <div class='tabContent' id='buyres'>
                <div>
               <font  color="#FF0000"> <? echo $msx;?></font><br />
<img src="/template/town/prem.png" > Remaining Points : <?php echo $usr[7]; ?><br>
         <table class="q_table" style="border-collapse: collapse" width="650" border="1">
            <tr>
              <td>Description</td>
              <td>Points needed</td>
              <td>Status</td>
            </tr>
            <tr>
             <td>1000<img src='<? echo"".$imgs.$fimgs."00.gif' title='".$lang['crop'].""?>'>1000<img src='<? echo"".$imgs.$fimgs."01.gif' title='".$lang['lumber'].""?>'>1000<img src='<? echo"".$imgs.$fimgs."02.gif' title='".$lang['stone'].""?>'>1000<img src='<? echo"".$imgs.$fimgs."03.gif' title='".$lang['iron'].""?>'>1000<img src='<? echo"".$imgs.$fimgs."04.gif' title='".$lang['gold'].""?>'></td>
             <td>2</td>
             <td><a class='q_link' href='prem.php?town=<?php echo $_GET['town']; ?>&bonus=1k'>activate</a></td>
            </tr>
            <tr>
             <td>5000<img src='<? echo"".$imgs.$fimgs."00.gif' title='".$lang['crop'].""?>'>5000<img src='<? echo"".$imgs.$fimgs."01.gif' title='".$lang['lumber'].""?>'>5000<img src='<? echo"".$imgs.$fimgs."02.gif' title='".$lang['stone'].""?>'>5000<img src='<? echo"".$imgs.$fimgs."03.gif' title='".$lang['iron'].""?>'>5000<img src='<? echo"".$imgs.$fimgs."04.gif' title='".$lang['gold'].""?>'></td>
             <td>9</td>
             <td><a class='q_link' href='prem.php?town=<?php echo $_GET['town'];?>&bonus=5k'>activate</a></td>
            </tr>
               <tr>
             <td>10000<img src='<? echo"".$imgs.$fimgs."00.gif' title='".$lang['crop'].""?>'>10000<img src='<? echo"".$imgs.$fimgs."01.gif' title='".$lang['lumber'].""?>'>10000<img src='<? echo"".$imgs.$fimgs."02.gif' title='".$lang['stone'].""?>'>10000<img src='<? echo"".$imgs.$fimgs."03.gif' title='".$lang['iron'].""?>'>10000<img src='<? echo"".$imgs.$fimgs."04.gif' title='".$lang['gold'].""?>'></td>
             <td>17</td>
             <td><a class='q_link' href='prem.php?town=<?php echo $_GET['town'];?>&bonus=10k'>activate</a></td>
            </tr>
               <tr>
             <td>50000<img src='<? echo"".$imgs.$fimgs."00.gif' title='".$lang['crop'].""?>'>50000<img src='<? echo"".$imgs.$fimgs."01.gif' title='".$lang['lumber'].""?>'>50000<img src='<? echo"".$imgs.$fimgs."02.gif' title='".$lang['stone'].""?>'>50000<img src='<? echo"".$imgs.$fimgs."03.gif' title='".$lang['iron'].""?>'>50000<img src='<? echo"".$imgs.$fimgs."04.gif' title='".$lang['gold'].""?>'></td>
             <td>60</td>
             <td><a class='q_link' href='prem.php?town=<?php echo $_GET['town'];?>&bonus=50k'>activate</a></td>
            </tr>
               <tr>
             <td>100000<img src='<? echo"".$imgs.$fimgs."00.gif' title='".$lang['crop'].""?>'>100000<img src='<? echo"".$imgs.$fimgs."01.gif' title='".$lang['lumber'].""?>'>100000<img src='<? echo"".$imgs.$fimgs."02.gif' title='".$lang['stone'].""?>'>100000<img src='<? echo"".$imgs.$fimgs."03.gif' title='".$lang['iron'].""?>'>100000<img src='<? echo"".$imgs.$fimgs."04.gif' title='".$lang['gold'].""?>'></td>
             <td>100</td>
             <td><a class='q_link' href='prem.php?town=<?php echo $_GET['town'];?>&bonus=100k'>activate</a></td>
            </tr>
            </table>
</div>
</div>
 <div class='tabContent' id='buyarmy'>
                <div>
            <dir>
                 <table width='650'>
                <tr>
soon
                <td>
                </td></tr></table>
            </dir>
</div>
</div>

 <div class='tabContent' id='buycoins'>
                <div>
            <dir>
<table width='650'>
                <tr> 
soon
                <td>
                </td></tr></table>
            </dir>
</div>
</div>
</body>
</html>