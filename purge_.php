<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 $town=town($_GET["town"]);
 if ($town[0])
  if ($town[1]==$_SESSION["user"][0])
   if (!$town[4])
   {
    purge($_GET["town"]);
	   $query="select id from towns where isCapital=1 and owner=".$_SESSION["user"][0];
   $result=mysql_query($query, $db_id); 
   $row1=mysql_fetch_row($result);
    header("Location: town.php?town=".$row1[0]);
   }
   else msg($lang['cantPurgeCap']);
  else {header('Location: login.php'); die();}
 else msg($lang['noTown']);
}
else msg($lang['incorData']);
?>
