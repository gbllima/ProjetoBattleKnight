<?php 
include "include/antet.php"; 
include "include/func.php"; ?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type='text/javascript'></script>
<script type="text/javascript">var prev="";</script>
<head>
<title><?=$title?></title>
</head>

<body class="q_body">

<div align="center">
    <table>
 
      <tr>
        <td class="td_content" id="content" align="left" valign="top"></td>
      </tr>
    </table>
</div>

</body>

</html>
<?php
if (isset($_GET["x"], $_GET["y"])) {$x=clean($_GET["x"]); $y=clean($_GET["y"]);}
else if (isset($_POST["x"], $_POST["y"])) {$x=clean($_POST["x"]); $y=clean($_POST["y"]);}
else if (isset($_SESSION["user"][0]))
{
 $towns=towns($_SESSION["user"][0]); $loc=town_xy($towns[0][0]);
 $x=$loc[0]; $y=$loc[1];
}
else {$x=rand(0, $m); $y=rand(0, $n);}
echo "<script type='text/javascript'> template('map_.php', 'x=".$x."&y=".$y."'); </script>";
?>