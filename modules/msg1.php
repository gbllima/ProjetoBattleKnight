<?php include "include/antet.php"; include "include/func.php";
$gen_stats=gen_stats(48);
 $town=town($_GET["town"]);
 if (isset($_POST["col"])) $col=$_POST["col"]; else if (isset($_GET["col"])) $col=$_GET["col"]; else $col="population";
 if (isset($col))
 {
$user_stats=user_stats($col);
  $town_stats=town_stats($col);
  if (isset($_POST["id"])) {if ($_POST["id"]<count($town_stats)) $id=$_POST["id"]; else msg("No such index.");}
  else if (isset($_GET["id"])) {if (($_GET["id"]<count($town_stats))&&($_GET["id"]>=0)) $id=$_GET["id"]; else if ($_GET["id"]>=count($town_stats)) $id=count($town_stats)-10; else if ($_GET["id"]<0) $id=0;}
  else if (isset($_POST["value"]))
  {
   $id=0;
   for ($i=0; (($i<count($town_stats))&&(!$id)); $i++) if ($town_stats[$i][2]==$_POST["value"]) $id=$i;
  }
  else
  {
   $id=0;
   for ($i=0; (($i<count($town_stats))&&(!$id)); $i++) if ($town_stats[$i][0]==$town[0]) $id=$i;
  }
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title><?=$title?></title>
	
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<meta http-equiv="Description" content="South Online Mmo< " />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	
	<link rel="stylesheet" type="text/css" href="/template/css/index.css" media="all" />
</head>
<body>
	<div id="Container">
		<h1 id="Header"></h1>
		<ol id="Navigation">
<? include("include/menu.php");?>
		</ol>
		<div class="Clear"></div>
		<div id="Content">
			<div id="Left">
				<div class="LeftItem">
					<h4 class="ContentHead"><img src="./template/index/login.jpg" alt="Login form" /></h4>
<center>
          <form action="login_.php" method="post" name="form" target="_self">
          <label><?php echo $lang['username'] ?>
          <input class='textbox' type="text" name="name" id="name">
          </label>
          </font>
           <font class="main_menu">
           <label><?php echo $lang['password'] ?>
           <input class='textbox' type="password" name="pass">
           </label>
            <label>
<input  type="submit" class='button' name="login" value="<?php echo $lang['login'] ?>">
            </label>
            </form>
</center>
				</div>
				<div class="LeftItem">
					<h4 class="ContentHead"><img src="./template/index/online.jpg" alt="Online now" /></h4>
<center>
<?php echo $lang['nrplayers'] ?> <?php echo"".$gen_stats[0][0]."" ?>
</center>
				</div>
				<div class="LeftItem">
					<h4 class="ContentHead"><img src="./template/index/reclame.jpg" alt="Reclame" /></h4>
<center>
<? include("include/reclame.php");?>
</center>
			</div>
                                                        </div>
			<div id="Center">
				<div class="NewsItem">
					<h2 class="NewsTitle">Msg</h2>
					<p class="NewsPost"><?php if (isset($_GET["msg"])) echo strip_tags($_GET["msg"]); ?></p>
				</div>
			</div>
			<div class="Clear"></div>
		</div>
		<div id="Footer">
			<? include("include/corp.php");?>
		</div>
	</div>
</body>
</html>