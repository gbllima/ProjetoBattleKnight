<?php include "include/antet.php"; include "include/func.php"; ?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php echo $lang['cleanIdle'] ?></title>
</head>

<body class="q_body">

<div align="center">
	  <td class="td_content">
    <form name="form1" method="post" action="clean_u_.php">
	    <label>
	    <?php echo $lang['maxIdleTime']; ?>
	    <input class="textbox" type="text" name="d">
	    </label>
            <label>
            <br>
            <?php echo $lang['yourPass'] ?>
            <input class="textbox" type="password" name="pass">
            <br>
            <input class="button" type="submit" name="del" value="Clean">
            </label>
    </form>
	  </td>
</div>

</body>

</html>
