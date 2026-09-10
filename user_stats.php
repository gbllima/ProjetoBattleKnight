<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 if (isset($_POST["col"])) $col=clean($_POST["col"]); else if (isset($_GET["col"])) $col=clean($_GET["col"]); else $col="population";
 if (isset($col))
 {
  $user_stats=user_stats($col);
  if (isset($_POST["id"]))
		{
			$_POST["id"]=clean($_POST["id"]);
			if ($_POST["id"]<0) $_POST["id"]=0;
		 $_POST["id"]=preg_replace("/[^0-9]/","", $_POST["id"]);
			if ($_POST["id"]<count($user_stats)) $id=$_POST["id"];
			else msg("No such index.");
		}
  else if (isset($_GET["id"]))
		{
			if ($_GET["id"]<0) $_GET["id"]=0;
		 $_GET["id"]=preg_replace("/[^0-9]/","", $_GET["id"]);
			if (($_GET["id"]<count($user_stats))&&($_GET["id"]>=0)) $id=$_GET["id"];
			else if ($_GET["id"]>=count($user_stats)) $id=count($user_stats)-10;
		}
  else if (isset($_POST["value"]))
  {
			$_POST["value"]=clean($_POST["value"]);
   $id=0;
   for ($i=0; (($i<count($user_stats))&&(!$id)); $i++) if ($user_stats[$i][1]==$_POST["value"]) $id=$i;
  }
  else
  {
   $id=0;
   for ($i=0; (($i<count($user_stats))&&(!$id)); $i++) if ($user_stats[$i][0]==$_SESSION["user"][0]) $id=$i;
  }
 }
} else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
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
<script type="text/javascript">
var tabLinks = new Array();
var contentDivs = new Array();
var data=new Array(11);
</script>
<head>
<title><?php echo $title; ?> - <?php echo $lang['userStats'] ?></title>
</head>

<body class="q_body">

<div align="center">
        <td class="td_content">
<a class='q_link' href='town_stats.php?town=<?php echo $_GET["town"]; ?>'><?php echo $lang['townStats'] ?></a> | <?php echo $lang['playerStats'] ?> | <a class='q_link' href='alliance_stats.php?town=<?php echo $_GET["town"]; ?>'><?php echo $lang['allyStats'] ?></a></br></br>
<form name='form1' method='post' action='user_stats.php?town=<?php echo $_GET["town"]; ?>'>
<?php echo $lang['viewStatsFor'] ?>
<select class='dropdown' name='col'><option value='population'><?php echo $lang['population'] ?></option></select>
<input class='button' type='submit' name='button1' value='<?php echo $lang['view'] ?>'>
</form>
		<table class="q_table" style="border-collapse: collapse" width="650" border="1">
            <tr>
			  <td><?php echo $lang['nom'] ?></td>
              <td><?php echo $lang['player'] ?></td>
              <td><?php if (isset($col)) echo $lang['population']; else echo "-"; ?></td>
            </tr>
<?php
if (isset($col))
{
 for ($i=0; (($i<$id+15)&&($i<count($user_stats))); $i++) echo "<tr><td>".($i+1)."</td><td><a class='q_link' href='profile_view.php?id=".$user_stats[$i][0]."'>".$user_stats[$i][1]."</a></td><td>".$user_stats[$i][2]."</td></tr>";
}
?>
        </table>
<form name='form2' method='post' action='user_stats.php?town=<?php echo $_GET["town"]; ?>'>
<?php echo $lang['jumpToNo'] ?>
<input class='textbox' type='text' size='5' name='id' value='<?php if (isset($col)) echo $id; ?>'>
<?php echo $lang['for'] ?>
<select class='dropdown' name='col'><option value='population'><?php echo $lang['population'] ?></option></option></select>
<input class='button' type='submit' name='button2' value='<?php echo $lang['go'] ?>'>
</form>
<form name='form3' method='post' action='user_stats.php?town=<?php echo $_GET["town"]; ?>'>
<?php echo $lang['jumpToUser'] ?>
<input class='textbox' type='text' size='15' name='value' value='<?php if (isset($_POST["value"])) echo $_POST["value"]; ?>'>
<?php echo $lang['for'] ?>
<select class='dropdown' name='col'><option value='population'><?php echo $lang['population'] ?></option></select>
<input class='button' type='submit' name='button3' value='<?php echo $lang['go'] ?>'>
</form>
<?php if (isset($id)) echo "<a class='q_link' href='user_stats.php?town=".$_GET["town"]."&col=".$col."&id=".($id-10)."'><<</a> | <a class='q_link' href='user_stats.php?town=".$_GET["town"]."&col=".$col."&id=".($id+10)."'>>></a>"; ?>
		</td>
</div>

</body>

</html>