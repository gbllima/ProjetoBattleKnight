<?php include "include/antet.php"; include "include/func.php"; ?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php echo $lang['deleteUser'] ?></title>
</head>

<body class="q_body">

<div align="center">
	  <td class="td_content">
    <form name="form1" method="post" action="del_u_.php">
	    <label>
	    <?php echo $lang['userToDelete'] ?>
	    <input class="textbox" type="text" name="name">
	    </label>
            <label>
            <br>
            <?php echo $lang['yourPass'] ?>
            <input class="textbox" type="password" name="pass">
            <br>
            <input class="button" type="submit" name="del" value="Delete">
            </label>
	  </form>
	  </td>
</div>

</body>

</html>