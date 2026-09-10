<?php
$res=explode("-", $town[10]); $lim=explode("-", $town[11]); $prod=explode("-", $town[9]);
?>
<table width="150" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td colspan="4" align="center" valign="middle" class="style1">
                                                    <? echo "".$lang['resurse']."" ?>
        </td>
        </tr>
        <tr>
        <td colspan="4" height="13">
        <img src="graphic/bara_separare.gif" width="150" height="13" />
        </td>
        </tr>
        <tr>
        <td width="20" height="20">
        <td height="15" align="right" class="style2">
                                                    <? echo "".$lang['disponibil']."" ?>
        </td>
        <td width="11" align="center" class="style1">|</td>
        <td align="left" class="style2">
                                                    <? echo "".$lang['total']."" ?>
        </td>
        </tr>
        <tr>
        <td width="20" height="20">
        <? echo"<img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>" ?>
        </td>
        <td align="right" class="style2">
          <? echo"".floor($res[0])."" ?>
        </td>
        <td align="center" class="style5">
                                                    |
        </td>
        <td align="left" class="style2">
         <? echo"".$lim[0]."" ?>
        </td>
        </tr>
        <tr>
        <td width="20" height="20">
        <? echo"<img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>" ?>
        </td>
        <td align="right" class="style2">
                                        <? echo"".floor($res[1])."" ?>
        </td>
        <td align="center" class="style5">
                                                    |
        </td>
        <td align="left" class="style2">
                                        <? echo"".$lim[1].""?>
        
        </td>
        </tr>
        <tr>
        <td width="20" height="20">
       <? echo"<img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>" ?>
        <td align="right" class="style2">
                                       <? echo"".floor($res[2]).""?>
        </td>
        <td align="center" class="style5">
                                                    |
        </td>
        <td align="left" class="style2">
                                        <? echo"".$lim[1]."" ?>
        </td>
        </tr>
         <tr>
        <td width="20" height="20">
       <? echo"<img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>" ?>
        <td align="right" class="style2">
                                       <? echo"".floor($res[3]).""?>
        </td>
        <td align="center" class="style5">
                                                    |
        </td>
        <td align="left" class="style2">
                                        <? echo"".$lim[1]."" ?>
        </td>
        </tr>
                <tr>
        <td width="20" height="20">
       <? echo"<img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>" ?>
        <td align="right" class="style2">
                                       <? echo"".floor($res[4]).""?>
        </td>
        <td align="center" class="style5">
                                                    |
        </td>
        <td align="left" class="style2">
                                        <? echo"".$lim[2]."" ?>
        </td>
        </tr>
                        <tr>
        <td width="20" height="20">
       <? echo"<img src='".$imgs.$fimgs."house_.gif' title='Upkeep'>" ?>
        <td align="right" class="style2">
                                       <? echo"".($town[3]+$town[12]).""?>
        </td>
        <td align="center" class="style5">
                                                    |
        </td>
        <td align="left" class="style2">
                                        <? echo"".$lim[3]."" ?>
        </td>
        </tr>
                                <tr>
        <td width="20" height="20">
       <? echo"<img src='".$imgs.$fimgs."morale.png' title='Morale'>" ?>
        <td align="right" class="style2">
                                       <? echo"".$town[5].""?>%
        </td>
        </tr>
        <tr>
        <td colspan="4" align="center" valign="middle" class="style1">
                                               <? echo "".$lang['production']."" ?>
        </td>
        </tr>
        <tr>
        <td colspan="4" align="left" valign="top" height="13">
        <img src="graphic/bara_separare.gif" width="150" height="13" />
        </td>
        </tr>
        <tr>
        <td height="20">
        <? echo"<img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>" ?>
        </td>
        <td align="right" class="style9">
                                <? echo"<b> ".($prod[0]-$town[3]-$town[12])."</b>";  ?>
        </td>
        <td class="style2">&nbsp;
        </td>
        <td align="left" class="style2">
                                <? echo"".$lang['crop']."" ?>
        </td>
        </tr>
        <tr>
        <td height="20">
        <? echo"<img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>" ?>
        </td>
        <td align="right" class="style9">
                                <? echo"<b>".$prod[1]."</b>";  ?>
        </td>
        <td class="style2">&nbsp;
        </td>
        <td align="left" class="style2">
                                <? echo"".$lang['lumber']."" ?>
        </td>
        </tr>
               <tr>
        <td height="20">
        <? echo"<img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>" ?>
        </td>
        <td align="right" class="style9">
                                <? echo"<b>".$prod[2]."</b>";  ?>
        </td>
        <td class="style2">&nbsp;
        </td>
        <td align="left" class="style2">
                                <? echo"".$lang['stone']."" ?>
        </td>
        </tr>
                       <tr>
        <td height="20">
        <? echo"<img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>" ?>
        </td>
        <td align="right" class="style9">
                                <? echo"<b>".$prod[3]."</b>";  ?>
        </td>
        <td class="style2">&nbsp;
        </td>
        <td align="left" class="style2">
                                <? echo"".$lang['iron']."" ?>
        </td>
        </tr>
            
                       <tr>
        <td height="20">
        <? echo"<img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>" ?>
        </td>
        <td align="right" class="style9">
                                <? echo"<b>".$prod[4]."</b>";  ?>
        </td>
        <td class="style2">&nbsp;
        </td>
        <td align="left" class="style2">
                                <? echo"".$lang['gold']."" ?>
        </td>
        </tr>                             
        </table>   