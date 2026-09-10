<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][1])) delallmsg($_SESSION["user"][0]);
else msg($lang['insufData']);
?>