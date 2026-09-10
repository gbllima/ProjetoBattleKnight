<?php include "include/antet.php"; include "include/func.php";

?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - <?php echo $lang['editRanks'] ?></title>
</head>

<body class="q_body">

<div align="center">
        <td class="td_content">
        <p align="center">
          <form name='form1' method='post' action='rank_edit_.php'>
            <p><?php echo $lang['playerName']; ?>: 
            <input class='textbox' type='text' name='name'></p>
            <p><?php echo $lang['rank']; ?>: 
            <input class='textbox' type='text' name='rank'></p>
            <p><input class='button' type='submit' name='button1' value='Edit rank'></p>
          </form>
        </p>
        </td>
</div>

</body>

</html>