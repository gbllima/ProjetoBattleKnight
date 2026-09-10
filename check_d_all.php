<?php include "include/antet.php"; include "include/func.php"; ?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php echo $lang['checkDelQueue'] ?></title>
</head>

<body class="q_body">

<div align="center">
	  <td class="td_content">
    <form name="form1" method="post" action="check_d_all_.php?value=1">
            <label>
            <br>
            <?php echo $lang['yourPass'] ?>
            <input class="textbox" type="password" name="pass">
            <br><br>
            <input class="button" type="submit" name="check" value="<?php echo $lang['checkDelQueue'] ?>">
            </label>
	  </form>
    </td>
</div>

</body>

</html>
