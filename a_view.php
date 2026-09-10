<?php include "include/antet.php"; include "include/func.php";

if (isset($_GET["id"]))
{
 $_GET["id"]=clean($_GET["id"]);
 $alliance=alliance_all($_GET["id"]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title." - ".$lang['allyView']; ?></title>
</head>

<body class="q_body">

<div align="center">
		<td class="td_content">
<?php
	 echo "<fieldset>
         <legend> ".$alliance[0][1]."</legend>
             <table border='0'>
            <tr>
            ".$lang['allyDesc']."
            
            <p><textarea class='textbox' name='desc' cols='90' rows='10' readonly='true'>".$alliance[0][3]."</textarea></p>";
	 echo $lang['members'].": <br />";
	 for ($i=0; $i<count($alliance[1])-1; $i++) echo "<a class='q_link' href='profile_view.php?id=".$alliance[1][$i][0]."'>".$alliance[1][$i][1]."</a> - ".$alliance[1][$i][14]."<br>";
                    echo "<hr>";
	 echo "".$lang['peacePacts'].": ";
	 for ($i=0; $i<count($alliance[2])-1; $i++)
	 {
	  $a1=alliance($alliance[2][$i][1]);
	  $a2=alliance($alliance[2][$i][2]);
	  echo $a1[1]."-".$a2[1]."<br>";
	 }
	 echo "<br />".$lang['warDeclar'].": ";
	 for ($i=0; $i<count($alliance[3])-1; $i++)
	 {
	  $a1=alliance($alliance[3][$i][1]);
	  $a2=alliance($alliance[3][$i][2]);
	  echo $a1[1]."-".$a2[1]."<br />";
	 }

                   echo "</fieldset>"
?>
        </td>
</div>

</body>

</html>