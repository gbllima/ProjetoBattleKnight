<?php include "include/antet.php"; include "include/func.php";

if (isset($_GET["id"]))
{
 $_GET["id"]=clean($_GET["id"]);
 $_GET["id"]=clean($_GET["id"]);
 check_d($_GET["id"]);
 $del=get_d($_GET["id"]);
 $usr=user($_GET["id"]);
 if (isset($usr[10])) $faction=faction($usr[10]); else $faction=array(0, 0, 0, 0);
 $towns=towns($_GET["id"]);
 if ($usr[11]) $alliance=alliance($usr[11]);
 $twnCount=count($towns); $population=0; $capital=array();
 for ($i=0; $i<$twnCount; $i++)
 {
  if ($towns[$i][4]) $capital=town_xy($towns[$i][0]);
  $population+=$towns[$i][3];
 }
}
?>
<html>
<head>
</head>

<body class="q_body">

			<p id="chatwindow"></p>		
			<input id="chatnick" type="text" size="9" border="1" value="<?php echo $_SESSION["user"][1]; ?>" maxlength="9" disabled>&nbsp;
			<input id="chatmsg" type="text" size="60" maxlength="80" value="<?php echo $lang['messages']?>.."onkeyup="keyup(event.keyCode);"> &nbsp;
			<input type="button" value="<?php echo $lang['send']?>" onclick="submit_msg();" style="cursor:pointer;border:1px solid gray;"><br><br>
			<br>
		</div>
	</body>
</html>

<script type="text/javascript">
 
/* Settings you might want to define */
	var waittime=800;		

/* Internal Variables & Stuff */
	chatmsg.focus()
	document.getElementById("chatwindow").innerHTML = "Загрузка...";

	var xmlhttp = false;
	var xmlhttp2 = false;


/* Request for Reading the Chat Content */
function ajax_read(url) {
	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
		if(xmlhttp.overrideMimeType){
			xmlhttp.overrideMimeType('text/xml');
		}
	} else if(window.ActiveXObject){
		try{
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e){
			}
		}
	}

	if(!xmlhttp) {
		alert('Giving up :( Cannot create an XMLHTTP instance');
		return false;
	}

	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState==4) {
		document.getElementById("chatwindow").innerHTML = xmlhttp.responseText;

		zeit = new Date(); 
		ms = (zeit.getHours() * 24 * 60 * 1000) + (zeit.getMinutes() * 60 * 1000) + (zeit.getSeconds() * 1000) + zeit.getMilliseconds(); 
		intUpdate = setTimeout("ajax_read('modules/chat.txt?x=" + ms + "')", waittime)
		}
	}

	xmlhttp.open('GET',url,true);
	xmlhttp.send(null);
}

/* Request for Writing the Message */
function ajax_write(url){
	if(window.XMLHttpRequest){
		xmlhttp2=new XMLHttpRequest();
		if(xmlhttp2.overrideMimeType){
			xmlhttp2.overrideMimeType('text/xml');
		}
	} else if(window.ActiveXObject){
		try{
			xmlhttp2=new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try{
				xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e){
			}
		}
	}

	if(!xmlhttp2) {
		alert('Giving up :( Cannot create an XMLHTTP instance');
		return false;
	}

	xmlhttp2.open('GET',url,true);
	xmlhttp2.send(null);
}

/* Submit the Message */
function submit_msg(){
	nick = document.getElementById("chatnick").value;
	msg = document.getElementById("chatmsg").value;

	if (nick == "") { 
		check = prompt("please enter username:"); 
		if (check === null) return 0; 
		if (check == "") check = "anonymous"; 
		document.getElementById("chatnick").value = check;
		nick = check;
	} 

	document.getElementById("chatmsg").value = "";
	ajax_write("w.php?m=" + msg + "&n=" + nick);
}

/* Check if Enter is pressed */
function keyup(arg1) { 
	if (arg1 == 13) submit_msg(); 
}

/* Start the Requests! ;) */
var intUpdate = setTimeout("ajax_read('modules/chat.txt')", waittime);

</script>
