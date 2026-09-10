<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 $town=town($_GET["town"]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php echo $lang['purgeTown'] ?></title>
</head>

<body class="q_body">

<div align="center">
        <td class="td_content"><br /><br />
<?php echo $lang['wishPurge'] ?> "<?php echo $town[2]; ?>"?<br /><br />
<a class='q_link' target='_parent' href='purge_.php?town=<?php echo $town[0]; ?>'><?php echo $lang['yes'] ?></a> | <a class='q_link' target='_parent' href='town.php?town=<?php echo $town[0]; ?>'><?php echo $lang['no'] ?></a>
        </td>
  </div>

</body>

</html>
