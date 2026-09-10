<?php 
include "include/antet.php"; 
include "include/func.php";

if (isset($_POST["x"], $_POST["y"])) {$x=$_POST["x"]; $y=$_POST["y"];}
else {$x=rand(0, $m); $y=rand(0, $n);}
$data=map($x, $y);
$i=0;
?>
     <div align="center">
        <label>
       <font color='#000000'><?php echo $lang['jumpTo'] ?>:</font>
          <input class='textbox' type="text" id="x" size="2" value="<?php echo $x; ?>">
        </label>
        <input class='textbox' type="text" id="y" size="2" value="<?php echo $y; ?>">
        <label>
        <input class='button' type="button" onClick="map()" value="GO">
        </label>
     <div style="position:relative; top:27; left:17;">
     <table><tr><td style="background-image:url(default/map/map.png);background-repeat:no-repeat;width:600px;height:454px;">
	    <div style="position:relative; top:-178px; left:18px;">
        <img style='position:absolute;left:240px;top:0px;width:80px;height:80px;' <?php map_img($data, $x-3, $y+3, $i, $imgs); ?>>
        <img style='position:absolute;left:280px;top:20px;width:80px;height:80px;' <?php map_img($data, $x-2, $y+3, $i, $imgs); ?>>
        <img style='position:absolute;left:320px;top:40px;width:80px;height:80px;' <?php map_img($data, $x-1, $y+3, $i, $imgs); ?>>
        <img style='position:absolute;left:360px;top:60px;width:80px;height:80px;' <?php map_img($data, $x, $y+3, $i, $imgs); ?>>
        <img style='position:absolute;left:400px;top:80px;width:80px;height:80px;' <?php map_img($data, $x+1, $y+3, $i, $imgs); ?>>
        <img style='position:absolute;left:440px;top:100px;width:80px;height:80px;' <?php map_img($data, $x+2, $y+3, $i, $imgs); ?>>
        <img style='position:absolute;left:480px;top:120px;width:80px;height:80px;' <?php map_img($data, $x+3, $y+3, $i, $imgs); ?>>
        <img style='position:absolute;left:200px;top:20px;width:80px;height:80px;' <?php map_img($data, $x-3, $y+2, $i, $imgs); ?>>
        <img style='position:absolute;left:240px;top:40px;width:80px;height:80px;' <?php map_img($data, $x-2, $y+2, $i, $imgs); ?>>
        <img style='position:absolute;left:280px;top:60px;width:80px;height:80px;' <?php map_img($data, $x-1, $y+2, $i, $imgs); ?>>
        <img style='position:absolute;left:320px;top:80px;width:80px;height:80px;' <?php map_img($data, $x, $y+2, $i, $imgs); ?>>
        <img style='position:absolute;left:360px;top:100px;width:80px;height:80px;' <?php map_img($data, $x+1, $y+2, $i, $imgs); ?>>
        <img style='position:absolute;left:400px;top:120px;width:80px;height:80px;' <?php map_img($data, $x+2, $y+2, $i, $imgs); ?>>
        <img style='position:absolute;left:440px;top:140px;width:80px;height:80px;' <?php map_img($data, $x+3, $y+2, $i, $imgs); ?>>
        <img style='position:absolute;left:160px;top:40px;width:80px;height:80px;' <?php map_img($data, $x-3, $y+1, $i, $imgs); ?>>
        <img style='position:absolute;left:200px;top:60px;width:80px;height:80px;' <?php map_img($data, $x-2, $y+1, $i, $imgs); ?>>
        <img style='position:absolute;left:240px;top:80px;width:80px;height:80px;' <?php map_img($data, $x-1, $y+1, $i, $imgs); ?>>
        <img style='position:absolute;left:280px;top:100px;width:80px;height:80px;' <?php map_img($data, $x, $y+1, $i, $imgs); ?>>
        <img style='position:absolute;left:320px;top:120px;width:80px;height:80px;' <?php map_img($data, $x+1, $y+1, $i, $imgs); ?>>
        <img style='position:absolute;left:360px;top:140px;width:80px;height:80px;' <?php map_img($data, $x+2, $y+1, $i, $imgs); ?>>
        <img style='position:absolute;left:400px;top:160px;width:80px;height:80px;' <?php map_img($data, $x+3, $y+1, $i, $imgs); ?>>
        <img style='position:absolute;left:120px;top:60px;width:80px;height:80px;' <?php map_img($data, $x-3, $y, $i, $imgs); ?>>
        <img style='position:absolute;left:160px;top:80px;width:80px;height:80px;' <?php map_img($data, $x-2, $y, $i, $imgs); ?>>
        <img style='position:absolute;left:200px;top:100px;width:80px;height:80px;' <?php map_img($data, $x-1, $y, $i, $imgs); ?>>
        <img style='position:absolute;left:240px;top:120px;width:80px;height:80px;' <?php map_img($data, $x, $y, $i, $imgs); ?>>
        <img style='position:absolute;left:280px;top:140px;width:80px;height:80px;' <?php map_img($data, $x+1, $y, $i, $imgs); ?>>
        <img style='position:absolute;left:320px;top:160px;width:80px;height:80px;' <?php map_img($data, $x+2, $y, $i, $imgs); ?>>
        <img style='position:absolute;left:360px;top:180px;width:80px;height:80px;' <?php map_img($data, $x+3, $y, $i, $imgs); ?>>
        <img style='position:absolute;left:80px;top:80px;width:80px;height:80px;' <?php map_img($data, $x-3, $y-1, $i, $imgs); ?>>
        <img style='position:absolute;left:120px;top:100px;width:80px;height:80px;' <?php map_img($data, $x-2, $y-1, $i, $imgs); ?>>
        <img style='position:absolute;left:160px;top:120px;width:80px;height:80px;' <?php map_img($data, $x-1, $y-1, $i, $imgs); ?>>
        <img style='position:absolute;left:200px;top:140px;width:80px;height:80px;' <?php map_img($data, $x, $y-1, $i, $imgs); ?>>
        <img style='position:absolute;left:240px;top:160px;width:80px;height:80px;' <?php map_img($data, $x+1, $y-1, $i, $imgs); ?>>
        <img style='position:absolute;left:280px;top:180px;width:80px;height:80px;' <?php map_img($data, $x+2, $y-1, $i, $imgs); ?>>
        <img style='position:absolute;left:320px;top:200px;width:80px;height:80px;' <?php map_img($data, $x+3, $y-1, $i, $imgs); ?>>
        <img style='position:absolute;left:40px;top:100px;width:80px;height:80px;' <?php map_img($data, $x-3, $y-2, $i, $imgs); ?>>
        <img style='position:absolute;left:80px;top:120px;width:80px;height:80px;' <?php map_img($data, $x-2, $y-2, $i, $imgs); ?>>
        <img style='position:absolute;left:120px;top:140px;width:80px;height:80px;' <?php map_img($data, $x-1, $y-2, $i, $imgs); ?>>
        <img style='position:absolute;left:160px;top:160px;width:80px;height:80px;' <?php map_img($data, $x, $y-2, $i, $imgs); ?>>
        <img style='position:absolute;left:200px;top:180px;width:80px;height:80px;' <?php map_img($data, $x+1, $y-2, $i, $imgs); ?>>
        <img style='position:absolute;left:240px;top:200px;width:80px;height:80px;' <?php map_img($data, $x+2, $y-2, $i, $imgs); ?>>
        <img style='position:absolute;left:280px;top:220px;width:80px;height:80px;' <?php map_img($data, $x+3, $y-2, $i, $imgs); ?>>
        <img style='position:absolute;left:0px;top:120px;width:80px;height:80px;' <?php map_img($data, $x-3, $y-3, $i, $imgs); ?>>
        <img style='position:absolute;left:40px;top:140px;width:80px;height:80px;' <?php map_img($data, $x-2, $y-3, $i, $imgs); ?>>
        <img style='position:absolute;left:80px;top:160px;width:80px;height:80px;' <?php map_img($data, $x-1, $y-3, $i, $imgs); ?>>
        <img style='position:absolute;left:120px;top:180px;width:80px;height:80px;' <?php map_img($data, $x, $y-3, $i, $imgs); ?>>
        <img style='position:absolute;left:160px;top:200px;width:80px;height:80px;' <?php map_img($data, $x+1, $y-3, $i, $imgs); ?>>
        <img style='position:absolute;left:200px;top:220px;width:80px;height:80px;' <?php map_img($data, $x+2, $y-3, $i, $imgs); ?>>
        <img style='position:absolute;left:240px;top:240px;width:80px;height:80px;' <?php map_img($data, $x+3, $y-3, $i, $imgs); $i=0; ?>>
        <img src="<?php echo $imgs ?>map/map_back.gif" border="0" usemap="#Map" style='position:absolute;left:0px;top:41px;width:560px;height:280px;'>
        <map name="Map" id="Map">
          <area shape="poly" coords='280,0,320,20,280,40,240,20' <?php map_lnk($data, $x-3, $y+3, $i); ?>>
          <area shape="poly" coords='320,20,360,40,320,60,280,40' <?php map_lnk($data, $x-2, $y+3, $i); ?>>
          <area shape="poly" coords='360,40,400,60,360,80,320,60' <?php map_lnk($data, $x-1, $y+3, $i); ?>>
          <area shape="poly" coords='400,60,440,80,400,100,360,80' <?php map_lnk($data, $x, $y+3, $i); ?>>
          <area shape="poly" coords='440,80,480,100,440,120,400,100' <?php map_lnk($data, $x+1, $y+3, $i); ?>>
          <area shape="poly" coords='480,100,520,120,480,140,440,120' <?php map_lnk($data, $x+2, $y+3, $i); ?>>
          <area shape="poly" coords='520,120,560,140,520,160,480,140' <?php map_lnk($data, $x+3, $y+3, $i); ?>>
          <area shape="poly" coords='240,20,280,40,240,60,200,40' <?php map_lnk($data, $x-3, $y+2, $i); ?>>
          <area shape="poly" coords='280,40,320,60,280,80,240,60' <?php map_lnk($data, $x-2, $y+2, $i); ?>>
          <area shape="poly" coords='320,60,360,80,320,100,280,80' <?php map_lnk($data, $x-1, $y+2, $i); ?>>
          <area shape="poly" coords='360,80,400,100,360,120,320,100' <?php map_lnk($data, $x, $y+2, $i); ?>>
          <area shape="poly" coords='400,100,440,120,400,140,360,120' <?php map_lnk($data, $x+1, $y+2, $i); ?>>
          <area shape="poly" coords='440,120,480,140,440,160,400,140' <?php map_lnk($data, $x+2, $y+2, $i); ?>>
          <area shape="poly" coords='480,140,520,160,480,180,440,160' <?php map_lnk($data, $x+3, $y+2, $i); ?>>
          <area shape="poly" coords='200,40,240,60,200,80,160,60' <?php map_lnk($data, $x-3, $y+1, $i); ?>>
          <area shape="poly" coords='240,60,280,80,240,100,200,80' <?php map_lnk($data, $x-2, $y+1, $i); ?>>
          <area shape="poly" coords='280,80,320,100,280,120,240,100' <?php map_lnk($data, $x-1, $y+1, $i); ?>>
          <area shape="poly" coords='320,100,360,120,320,140,280,120' <?php map_lnk($data, $x, $y+1, $i); ?>>
          <area shape="poly" coords='360,120,400,140,360,160,320,140' <?php map_lnk($data, $x+1, $y+1, $i); ?>>
          <area shape="poly" coords='400,140,440,160,400,180,360,160' <?php map_lnk($data, $x+2, $y+1, $i); ?>>
          <area shape="poly" coords='440,160,480,180,440,200,400,180' <?php map_lnk($data, $x+3, $y+1, $i); ?>>
          <area shape="poly" coords='160,60,200,80,160,100,120,80' <?php map_lnk($data, $x-3, $y, $i); ?>>
          <area shape="poly" coords='200,80,240,100,200,120,160,100' <?php map_lnk($data, $x-2, $y, $i); ?>>
          <area shape="poly" coords='240,100,280,120,240,140,200,120' <?php map_lnk($data, $x-1, $y, $i); ?>>
          <area shape="poly" coords='280,120,320,140,280,160,240,140' <?php map_lnk($data, $x, $y, $i); ?>>
          <area shape="poly" coords='320,140,360,160,320,180,280,160' <?php map_lnk($data, $x+1, $y, $i); ?>>
          <area shape="poly" coords='360,160,400,180,360,200,320,180' <?php map_lnk($data, $x+2, $y, $i); ?>>
          <area shape="poly" coords='400,180,440,200,400,220,360,200' <?php map_lnk($data, $x+3, $y, $i); ?>>
          <area shape="poly" coords='120,80,160,100,120,120,80,100' <?php map_lnk($data, $x-3, $y-1, $i); ?>>
          <area shape="poly" coords='160,100,200,120,160,140,120,120' <?php map_lnk($data, $x-2, $y-1, $i); ?>>
          <area shape="poly" coords='200,120,240,140,200,160,160,140' <?php map_lnk($data, $x-1, $y-1, $i); ?>>
          <area shape="poly" coords='240,140,280,160,240,180,200,160' <?php map_lnk($data, $x, $y-1, $i); ?>>
          <area shape="poly" coords='280,160,320,180,280,200,240,180' <?php map_lnk($data, $x+1, $y-1, $i); ?>>
          <area shape="poly" coords='320,180,360,200,320,220,280,200' <?php map_lnk($data, $x+2, $y-1, $i); ?>>
          <area shape="poly" coords='360,200,400,220,360,240,320,220' <?php map_lnk($data, $x+3, $y-1, $i); ?>>
          <area shape="poly" coords='80,100,120,120,80,140,40,120' <?php map_lnk($data, $x-3, $y-2, $i); ?>>
          <area shape="poly" coords='120,120,160,140,120,160,80,140' <?php map_lnk($data, $x-2, $y-2, $i); ?>>
          <area shape="poly" coords='160,140,200,160,160,180,120,160' <?php map_lnk($data, $x-1, $y-2, $i); ?>>
          <area shape="poly" coords='200,160,240,180,200,200,160,180' <?php map_lnk($data, $x, $y-2, $i); ?>>
          <area shape="poly" coords='240,180,280,200,240,220,200,200' <?php map_lnk($data, $x+1, $y-2, $i); ?>>
          <area shape="poly" coords='280,200,320,220,280,240,240,220' <?php map_lnk($data, $x+2, $y-2, $i); ?>>
          <area shape="poly" coords='320,220,360,240,320,260,280,240' <?php map_lnk($data, $x+3, $y-2, $i); ?>>
          <area shape="poly" coords='40,120,80,140,40,160,0,140' <?php map_lnk($data, $x-3, $y-3, $i); ?>>
          <area shape="poly" coords='80,140,120,160,80,180,40,160' <?php map_lnk($data, $x-2, $y-3, $i); ?>>
          <area shape="poly" coords='120,160,160,180,120,200,80,180' <?php map_lnk($data, $x-1, $y-3, $i); ?>>
          <area shape="poly" coords='160,180,200,200,160,220,120,200' <?php map_lnk($data, $x, $y-3, $i); ?>>
          <area shape="poly" coords='200,200,240,220,200,240,160,220' <?php map_lnk($data, $x+1, $y-3, $i); ?>>
          <area shape="poly" coords='240,220,280,240,240,260,200,240' <?php map_lnk($data, $x+2, $y-3, $i); ?>>
          <area shape="poly" coords='280,240,320,260,280,280,240,260' <?php map_lnk($data, $x+3, $y-3, $i); ?>>
          
        <area shape="circle" coords='452,38,30' href="javascript: template('map_.php', '<?php echo "x=".$x."&y=".($y+1); ?>')" title="North">
        <area shape="circle" coords='117,241,30' href="javascript: template('map_.php', '<?php echo "x=".$x."&y=".($y-1); ?>')" title="South">
        <area shape="circle" coords='455,267,45' href="javascript: template('map_.php', '<?php echo "x=".($x+1)."&y=".$y; ?>')" title="East">
        <area shape="circle" coords='107,25,30' href="javascript: template('map_.php', '<?php echo "x=".($x-1)."&y=".$y; ?>')" title="West">
        </map>
        </div>
        </tr></td></table>
		<div id="descriptor" style="position:relative; top:-430px; left:-135px;">
        </div>
