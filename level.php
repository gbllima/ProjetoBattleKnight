<?php include "include/antet.php"; include "include/func.php";

?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php $lang['userLevel']; ?></title>
</head>

<body class="q_body">

<div align="center">
	  <td class="td_content">
          <form name="form1" method="post" action="level_.php">
	    <label>
	    <?php echo $lang['username'] ?>: 
	    <input class='textbox' type="text" name="name">
	    </label>
	    <label>
	    <?php echo $lang['level'] ?>: 
	    <input class='textbox' type="text" name="level">
	    </label>
            <label>
            <br>
            <?php echo $lang['yourPass'] ?>:
            <input class='textbox' type="password" name="pass">
            <br>
            <input class='button' type="submit" value="Ban">
            </label>
	  </form>
	  </td>
	</div>

</body>

</html>