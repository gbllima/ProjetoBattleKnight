<?php 

if (isset($_SESSION["user"][0]))
{
 $towns=towns($_SESSION["user"][0]);
 $twnCount=count($towns);
}
else {header('Location: login.php'); die();}
?>
 <?php for ($i=0; $i<$twnCount; $i++)
			{
			 $town=town_xy($towns[$i][0]); 
			 echo "
			 <div id='k".$i."' class='shown' onmouseover='over('k".$i."');' onmouseout='over('k".$i."');'>
              <a id='link".$i."' href='town.php?town=".$towns[$i][0]."'>".$towns[$i][2]."</a>
			  </div>
            ";
			} ?>