<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["type"], $_GET["id"]))
{
 $_GET["type"]=clean($_GET["type"]); $_GET["id"]=clean($_GET["id"]);
 if ($_GET["type"]) $msg=message($_GET["id"]);
 else $msg=report($_GET["id"]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>

<head>
<script type="text/javascript">
/** This is high-level function.
 * It must react to delta being more/less than zero.
 */
function handle(delta) {
var d=delta*-60;
window.scrollBy(0,d);
}

/** Event handler for mouse wheel event.
 */
function wheel(event){
        var delta = 0;
        if (!event) /* For IE. */
                event = window.event;
        if (event.wheelDelta) { /* IE/Opera. */
                delta = event.wheelDelta/120;
                /** In Opera 9, delta differs in sign as compared to IE.
                 */
                if (window.opera)
                        delta = -delta;
        } else if (event.detail) { /** Mozilla case. */
                /** In Mozilla, sign of delta is different than in IE.
                 * Also, delta is multiple of 3.
                 */
                delta = -event.detail/3;
        }
        /** If delta is nonzero, handle it.
         * Basically, delta is now positive if wheel was scrolled up,
         * and negative, if wheel was scrolled down.
         */
        if (delta)
                handle(delta);
        /** Prevent default actions caused by mouse wheel.
         * That might be ugly, but we handle scrolls somehow
         * anyway, so don't bother here..
         */
        if (event.preventDefault)
                event.preventDefault();
	event.returnValue = false;
}

/** Initialization code. 
 * If you use your own event management code, change it as required.
 */
if (window.addEventListener)
        /** DOMMouseScroll is for mozilla. */
        window.addEventListener('DOMMouseScroll', wheel, false);
/** IE/Opera. */
window.onmousewheel = document.onmousewheel = wheel;
</script>
<title><?php echo $title; ?> - <?php echo $lang['messages'] ?></title>
</head>

<body class="q_body">

<div align="center">
		<td class="td_content">
		 <p align="center">
<?php
 label($msg[2+$_GET["type"]]);
 echo "</br></br>".str_replace("\n", "</br>", $msg[3+$_GET["type"]]);
 if (strtotime($msg[4+$_GET["type"]])>strtotime($_SESSION["user"][6])) $_SESSION["user"][6]=$msg[4+$_GET["type"]];
?>
   </p>
  </td>
</div>

</body>

</html>