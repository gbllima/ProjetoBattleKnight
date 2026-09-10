<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["page"]))
{
 $_GET["page"]=clean($_GET["page"]);
 $reports=reports($_SESSION["user"][0]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php echo $lang['reports'] ?></title>
</head>

<body class="q_body">

<div align="center">
        <td class="td_content">
        <table class="q_table" style="border-collapse: collapse" width="650" border="1">
            <tr>
              <td><?php echo $lang['subject'] ?></td>
              <td><?php echo $lang['sentAt'] ?></td>
            </tr>
<?php for ($i=$_GET["page"]*10; $i<$_GET["page"]*10+10; $i++)
			{
			 if (isset($reports[$i]))
				{
					echo "<tr>
              <td>";
					if ($reports[$i][5]) echo "[new] ";
					echo "<a class='q_link' href='msg_view.php?type=0&id=".$reports[$i][0]."'>".$reports[$i][2]."</a></td>
              <td>".$reports[$i][4]."</td>
            </tr>";
				}
			}
?>
          </table>
          <?php for ($i=$_GET["page"]-5; $i<=$_GET["page"]-1; $i++) if ($i>=0) echo "<a class='q_link' href='reports.php?page=".$i."'>".$i."</a> | ";
		  echo $_GET["page"]." | ";
		  for ($i=$_GET["page"]+1; $i<$_GET["page"]+5; $i++) if ($i<ceil(count($reports)/10)) echo "<a class='q_link' href='reports.php?page=".$i."'>".$i."</a> | ";
		  echo "<a class='q_link' href='delallrep.php'>".$lang['deleteAll']."</a>"; ?>
        </td>
</div>

</body>

</html>