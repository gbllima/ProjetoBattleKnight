function template(lnk, vars)
{
var xmlHttp;
try
{
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
}
catch (e)
{
 // Internet Explorer
 try
 {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
 }
 catch (e)
 {
  try
  {
   xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  catch (e)
  {
   alert("Your browser does not support AJAX!");
   return false;
  }
 }
}
xmlHttp.onreadystatechange=function()
{
 if(xmlHttp.readyState==4)
 {
  con=document.getElementById('content'); con.innerHTML="";
  data=xmlHttp.responseText; c=0;
  if (data.indexOf("<script type='text/javascript'>")>-1)
   for (start=data.indexOf("<script type='text/javascript'>"); start>-1; start=data.indexOf("<script type='text/javascript'>"))
   {
    end=data.indexOf("</script>");
				scr=document.createElement("SCRIPT"); scr.type = "text/javascript"; scr.text=data.substring(start+31, end-1);
    con.innerHTML+=data.substring(0, start-1); con.appendChild(scr);
    if (data.length>end+9) data=data.substring(end+9); else data="";
   }
  con.innerHTML+=data;
 }
}
if (vars)
{
 xmlHttp.open("POST", lnk, true);
 xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
 xmlHttp.send(vars);
}
else
{
 xmlHttp.open("GET", lnk, true);
 xmlHttp.send(null);
}
}
function go(lnk)
{
	window.location.href=lnk;
}

function desc(town, player, population, alliance)
{
	document.getElementById("descriptor").innerHTML="<span class='descriptor'><strong>"+town+"</strong> Owner: <strong>"+player+"</strong><br /> Population: <strong>"+population+"</strong> Alliance:<strong> "+alliance+"</strong></span>";
}
function timer(data, lnk)
{
	dat=document.getElementById(data);
	var time=(dat.innerHTML).split(":"); var done=0;
	if (time[2]>0) time[2]--;
	else
	{
		time[2]=59;
		if (time[1]>0) time[1]--;
		else
		{
			time[1]=59;
			if (time[0]>0) time[0]--;
			else { clearTimeout(id[data]); window.location.href=lnk; done=1;}
		}
	}
	if (!done)
	{
		dat.innerHTML=time[0]+":"+time[1]+":"+time[2];
		id[data]=setTimeout("timer('"+data+"', '"+lnk+"')", 1000);
	}
}

function forgot()
{
	usr=document.getElementById("name");
	go("forgot.php?name="+usr.value);
}

function trade_options(type, subtype, data)
{
	t=document.getElementById(type);
	st=document.getElementById(subtype);
	if (t.value==0) st.innerHTML="<select name='"+subtype.substr(0, subtype.length-1)+"'><option value='0'>Crop</option><option value='1'>Lumber</option><option value='2'>Stone</option><option value='3'>Iron</option><option value='4'>Gold</option></select>";
	else st.innerHTML="<select name='"+subtype.substr(0, subtype.length-1)+"'><option value='0'>"+data[0]+"</option><option value='1'>"+data[1]+"</option><option value='2'>"+data[2]+"</option><option value='3'>"+data[3]+"</option><option value='4'>"+data[4]+"</option><option value='5'>"+data[5]+"</option><option value='6'>"+data[6]+"</option><option value='7'>"+data[7]+"</option><option value='8'>"+data[8]+"</option><option value='9'>"+data[9]+"</option><option value='10'>"+data[10]+"</option></select>";
}

function showtext(building)
{
	if (!document.getElementById)
	return;
        textcontainerobj=document.getElementById("label");
        document.getElementById("label").innerHTML=building;
}
function inittabs() {
	// Grab the tab links and content divs from the page
	var tabListItems = document.getElementById('tabs').childNodes;
	for ( var i = 0; i < tabListItems.length; i++ ) {
	    if ( tabListItems[i].nodeName == "LI" ) {
        	var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
        	var id = getHash( tabLink.getAttribute('href') );
        	tabLinks[id] = tabLink;
        	contentDivs[id] = document.getElementById( id );
	    }
	}

	// Assign onclick events to the tab links, and
	// highlight the first tab
	var i = 0;

	for ( var id in tabLinks ) {
	    tabLinks[id].onclick = showTab;
	    tabLinks[id].onfocus = function() { this.blur() };
	    if ( i == 0 ) tabLinks[id].className = 'selected';
	    i++;
	}

	// Hide all content divs except the first
	var i = 0;

	for ( var id in contentDivs ) {
	    if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
	    i++;
        }
}

function showTab() {
	var selectedId = getHash( this.getAttribute('href') );

	// Highlight the selected tab, and dim all others.
	// Also show the selected content div, and hide all others.
	for ( var id in contentDivs ) {
	    if ( id == selectedId ) {
        	tabLinks[id].className = 'selected';
        	contentDivs[id].className = 'tabContent';
	    } else {
        	tabLinks[id].className = '';
        	contentDivs[id].className = 'tabContent hide';
	    }
	}

	// Stop the browser following the link
	return false;
}

function getFirstChildWithTagName( element, tagName ) {
	for ( var i = 0; i < element.childNodes.length; i++ ) {
	    if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
	}
}

function getHash( url ) {
	var hashPos = url.lastIndexOf ( '#' );
	return url.substring( hashPos + 1 );
}

function map()
{
 var vars="x="+document.getElementById("x").value+"&y="+document.getElementById("y").value;
 template('map_.php', vars);
}
