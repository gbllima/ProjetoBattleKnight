<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["lang"]))
{
 $_GET["lang"]=clean($_GET["lang"]);
 if (ch_lang($_SESSION["user"][0], $_GET["lang"]))
 {
  $_SESSION["user"][16]=$_GET["lang"];
  msg1("Language changed.");
 }
 else msg1("Failure.".mysql_error());
}
else if (isset($_SESSION["lang"], $_GET["lang"]))
{
 $_GET["lang"]=clean($_GET["lang"]);
 $_SESSION["lang"]=$_GET["lang"];
 msg1("Language changed.");
}
else msg1($lang['insufData']);
?>
