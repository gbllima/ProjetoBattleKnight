<?php
$gen_stats=gen_stats(48);
$town=town($_GET["town"]);
$config=config();
if (!$config[3][1]) msg1($lang['regClosed']);
$factions=factions();
$_SESSION["code"]=rand(1000, 9999);
?>
<form name="form1" method="post" action="register_.php">
      <table>
      <tr>
         <td><?php echo $lang['username'] ?></td>
         <td><input class='textbox' type="text" name="name"></td>
      </tr>
      <tr>
         <td><?php echo $lang['password'] ?></td>
         <td><input class='textbox' type="password" name="pass"></td>
      </tr>
      <tr>
         <td><?php echo $lang['retypePass'] ?></td>
         <td><input class='textbox' type="password" name="pass_"></td>
      </tr>
      <tr>
         <td><?php echo $lang['validEmail'] ?></td>
         <td><input class='textbox' type="text" name="email"></td>
      </tr>
      <tr>
         <td><?php echo $lang['faction'] ?></td>
         <td><select class='dropdown' name="faction">
         <?php for ($i=0; $i<count($factions); $i++) echo "<option value='".$i."'>".$factions[$i][1]."</option>"; ?>
         </select>
         </td>
      </tr>

      <tr>
         <td>
         <?php echo $lang['typeCode'] ?>: <?php echo $_SESSION["code"];?>
         </td>
         <td><input class='textbox' type="text" name="code">
      </td>
      </tr>

      <tr>
         <td></td>
         <td><input class='button' type="submit" name="reg" value="<?php echo $lang['submit'] ?>"></td>
      </tr>


      </table>

      </form>
</p>