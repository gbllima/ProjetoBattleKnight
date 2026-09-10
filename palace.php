<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0]))
{
	 $buildings=buildings($_SESSION["user"][10]);
 $towns=towns($_SESSION["user"][0]);
 $twnCount=count($towns);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="func.js" type="text/javascript"></script>

<head>
<title><?php echo $title." - ".$buildings[12][2]; ?></title>
</head>

<body class="q_body"">

<div align="center">
		<td class="td_content">
          <p>
<?php
	  echo"	<img src='".$imgs.$fimgs."b12.gif' width='85' height='100'><br />";
 echo $buildings[12][8]."<br />";?>
 <?php if (!$twnCount) echo "[<a class='q_link' href='create.php'>".$lang['createTown']."</a>]"; else echo "[<a class='q_link' href='create.php'>".$lang['createTown']."</a>]<br />"; ?>
          <table class="q_table" style="border-collapse: collapse" width="650" border="1">
            <tr>
              <td class='head_table'><?php echo $lang['townName'] ?></td>
              <td class='head_table'><?php echo $lang['population'] ?></td>
              <td class='head_table'><?php echo $lang['coords'] ?></td>
              <td class='head_table'><?php echo $lang['abandon'] ?></td>
              <td class='head_table'><?php echo $lang['purge'] ?></td>
            </tr>
            <?php for ($i=0; $i<$twnCount; $i++)
			{
			 $town=town_xy($towns[$i][0]); 
			 echo "<tr>
              <td><b>".$towns[$i][2]."</b></td>
              <td>".$towns[$i][3]."</td>
              <td><a class='q_link' href='map.php?x=".$town[0]."&y=".$town[1]."'>(".$town[0].", ".$town[1].")</a></td>
              <td>[<a class='q_link' href='abandon.php?town=".$towns[$i][0]."'>".$lang['abandon']."</a>]</td>
              <td>[<a class='q_link' href='purge.php?town=".$towns[$i][0]."'>".$lang['purge']."</a>]</td>
            </tr>";
			} ?>
          </table>
	  [<a class='q_link' href='ch_capital.php'><?php echo $lang['changeCap'] ?></a>]

          </p>
    </td>
</div>

</body>

</html>