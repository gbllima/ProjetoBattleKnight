<?php 
$buildings=buildings($_SESSION["user"][10]);
 check_c($_GET["town"], $_SESSION["user"][10]);
 $cq=get_c($_GET["town"]);
?>

<font color="#996633"  size="-1">
<b>
<?
if (count($cq)) ":<br \>";
for ($i=0; $i<count($cq); $i++)
{
 $name=explode("-", $buildings[$cq[$i][1]][2]);
 if ($cq[$i][2]>-1)
 {
  $s=1; $l=$land[$cq[$i][1]][$cq[$i][2]]+1;
 }
 else
 {
  $s=0; $l=$data[$cq[$i][1]]+1;
 }
 echo "[<a class='q_link' href='cancel_c.php?town=".$_GET["town"]."&b=".$cq[$i][1]."&subB=".$cq[$i][2]."'>x</a>] ".$name[$s].", ".$lang['level']." ".$l." - <span id='cq".$i."'>".$cq[$i][0]."</span><script type='text/javascript'> var id=new Array(50); timer('cq".$i."', 'town.php?town=".$_GET["town"]."'); </script><br \>";
}
 echo "";
?>
</b>
</font>