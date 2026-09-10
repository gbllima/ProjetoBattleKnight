<?php include "include/antet.php"; include "include/func1.php";
if (isset($_POST["x"], $_POST["y"])) {$x=$_POST["x"]; $y=$_POST["y"];}
else {$x=rand(0, $m); $y=rand(0, $n);}
$data=map($x, $y);
$i=0;


if (isset($_SESSION["user"][0]))
{
 $land=get_land();
 $xy=$land[rand(0, count($land)-1)];
 $towns=towns($_SESSION["user"][0]);
 if (count($towns))
 {
  $is_cap=0; $data=explode("-", $towns[0][8]); $army=explode("-", $towns[0][7]);
  if ($data[7]<10) msg($lang['needCastle']);
  if ($army[11]<10) msg($lang['needColonists']);
 }
 else $is_cap=1;
}
else {header('Location: index.php'); die();}
?>
<? include("include/town/java.php");?>

<head>
<title>South Online Mmo</title>
</head>

<body class="q_body">

<? include("include/town/header2.php");?>
Here is the place where you can construct you village.This screen will only apear if you dont have a village.In this time you cant acces any menu of the game(except logout).After building your village you will have access to all menus.Our team wish you a happy playing and hope to stay with us.
<form name="form1" method="post" action="create_.php?is_cap=<?php echo $is_cap; ?>">
	    <p><?php echo $lang['desCoord'] ?>:
            <input class="textbox" name="x" id="x" type="text" size="5" value="<?php echo $xy[0]; ?>">
            <input class="textbox" name="y" id="y" type="text" size="5" value="<?php echo $xy[1]; ?>">
            [<a class='q_link' href="javascript: go('createf.php');"><?php echo $lang['random'] ?></a>]
	  </p>
	    <p><?php echo $lang['desCapName'] ?>: 
	      <input class="textbox" name="name" type="text" size="25" value="Название деревни">
	    </p>
	    <p>
	      <input class="button" type="submit" name="go" value="<?php echo $lang['create'] ?>">
	    </p>
	  </form>
      <br />
	<? include("include/town/footer.php");?>