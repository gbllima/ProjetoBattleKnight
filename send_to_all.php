<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0]));
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<title><?php echo $title; ?> - send report to all</title>
</head>

<body class="q_body">

<div align="center">
        <td class="td_content">
        <form name="form1" method="post" action="send_to_all_.php">
          <p>Subject: 
            <input class='textbox' name="subject" type="text" size="45">
          </p>
          <p>
            <textarea class='textbox' name="contents" cols="60" rows="20"></textarea>
          </p>
          <p>Your pass:
            <input class='textbox' name="pass" type="password" size="20">
          </p>
          <p>
              <input class='button' type="submit" name="button" value="Send">
          </p>
        </form>
        </td>
 </div>

</body>

</html>
