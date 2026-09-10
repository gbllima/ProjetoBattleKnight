<?php 
include "include/antet.php"; 
include "include/func.php";

$_SESSION = array();
session_destroy();
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>

<head>
<title><?=$title?></title>
</head>

<body class="q_body">

<div align="center">
<center>
<img src="/template/town/error.png" >
<br>
Session end , please re-login in the game.
</center>
</td>
  </div>

</body>

</html>