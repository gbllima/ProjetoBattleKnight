<?php 
include "include/antet.php"; 
include "include/func.php";
if (isset($_POST["name"], $_POST["pass"]))
{
 $_SESSION["user"]=login($_POST["name"], md5($_POST["pass"]));
 $config=config();
 if ((!$config[2][1])&&($_SESSION["user"][4]<4))
 {
  $_SESSION = array();
  session_destroy();
  msg1($lang['loginClosed']);
 }
 else if ($_SESSION["user"][0])
  {
   if (check_d($_SESSION["user"][0]))
   {
   $row=update_lastVisit($_SESSION["user"][0]);
   $query="select id from towns where isCapital=1 and owner=".$_SESSION["user"][0];
   $result=mysql_query($query, $db_id); 
   $row1=mysql_fetch_row($result);
   if ((".$row1[0].")==0){
     header("Location: createf.php");}
	 else header("Location: town.php?town=".$row1[0]);
   }
   else header('Location: towns.php');
  }
 else msg1($lang['noUserWrong']);
}
else msg1($lang['noInput']);
?>