<?php include "include/antet.php"; include "include/func.php"; ?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php echo $lang['changeCap'] ?></title>
</head>

<body class="q_body">

<div align="center">
		<?php
	  echo"	<img src='".$imgs.$fimgs."b12.gif' width='85' height='100'><br />";
 echo $lang['buildings'][0][12][2]."<br />";?>
	  <td class="td_content">
    <form name="form1" method="post" action="ch_capital_.php">
	    <label>
	    <?php echo $lang['becomeCap'] ?>: <br />
	    <input class='textbox' type="text" name="name">
	    </label>
					<label>
					<br>
					<?php echo $lang['yourPass'] ?><br />
					<input type="password" name="pass" class="textbox">
					<br>
					<input type="submit" class="button" name="del" value="<?php echo $lang['change'] ?>">
					</label>
	   </form>
	  </td>
</div>

</body>

</html>
