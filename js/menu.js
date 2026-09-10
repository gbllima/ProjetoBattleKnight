

//if (window.XMLHttpRequest) {
//} else {
//alert(' You are using Internet Explorer 6 or older browser.\n You need to update your browser to fully experience the game.\n You will be now redirected to Microsoft update page.');
//window.location="http://www.microsoft.com/windows/downloads/ie/getitnow.mspx";
//}
if (!XMLHttpRequest) {
  window.XMLHttpRequest = function() {
    return new ActiveXObject('Microsoft.XMLHTTP');
  }
}
	
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}


function LinkList(m,config,action) {
	var link=new Array(),variable=new Array(),last=new Array();
	var temp,temp2,add,add2;
	if(config==0){
	for (i=0; i<document.links.length; i++) {
		temp=String(document.links[i]);
		link=temp.split('m=');
		if(link[1]){
			variable=link[1].split('&');
			temp2=document.links[i].id.indexOf('link');
			if(temp2==-1){
				if(variable[1]){
					add='&'+variable[1];
				}else{
					add='';
				}
				document.links[i].href=link[0]+'m='+m+add;
			}else if(temp2!=-1 && config==1){
				if(variable[1]){
					add='&'+variable[1];
				}else{
					add='';
				}
				document.links[i].href=link[0]+'m='+m+add;
			}
		}
   }
   }else{
	for (i=0; i<document.links.length; i++) {
		temp=String(document.links[i]);
		link=temp.split('m=');
		if(link[1]){
			variable=link[1].split('&');
			last=variable[0].split('a');
			if(last[1] && action==0){
				add2=variable[0];
			}else if(!last[1] && action==0){
				add2='a'+last[0];
			}else if(last[1] && action==1){
				add2=last[1];
			}else if(!last[1] && action==1){
				add2=last[0];
			}
			temp2=document.links[i].id.indexOf('link');
				if(variable[1]){
					add='&'+variable[1];
				}else{
					add='';
				}
				document.links[i].href=link[0]+'m='+add2+add;
		}
	}
   }
   

}

menu_status = new Array();

function showHide(num,action,sec)
{

	var i,action;
	var link=new Array(),variable=new Array(),fin=new Array();
	var menus=new Array();
		menus[0]='sate';
		menus[1]='armata';
		menus[2]='diplomatie';
		menus[3]='altele';
	var cook=readCookie('CO_M');
if(action==null){
	LinkList(num,0);
	if(num>=0 && num<6){
		var cook_status=document.getElementById(menus[num]).className;
	}
	if(num==cook && cook_status=='show'){
		createCookie('CO_M',9,'365');
	}else{
		createCookie('CO_M',num,'365');
	}
		for(i=0;i<4;i++){
		if(i==num){
		if(menu_status[menus[i]]!='show')

			{
				document.getElementById(menus[i]).className='show';
				menu_status[menus[i]]='show';
				document.getElementById('hide').value=num;
			}
		else
			{
				document.getElementById(menus[i]).className='hide';
				menu_status[menus[i]]='hide';
				document.getElementById('hide').value=9;
			}
		}
		else{
			document.getElementById(menus[i]).className='hide';
			menu_status[menus[i]]='hide';
		}
	}
}
}

function over(s)
{
var s=s,class_name=document.getElementById(s).className;
	if(class_name=='over'){
		document.getElementById(s).className='shown';
	}
	else{
		document.getElementById(s).className='over';
	}

}
var i=0,j=0;
while(document.links[i++]){
alert(document.links[j++]);
}
var tooltip = false;
	var tooltipShadow = false;
	var dhtmlgoodies_shadowSize = 0;
	var tooltipMaxWidth = 250;
	var tooltipMinWidth = 50;
	var dhtmlgoodies_iframe = false;
	var tooltip_is_msie = (navigator.userAgent.indexOf('MSIE')>=0 && navigator.userAgent.indexOf('opera')==-1 && document.all)?true:false;

	function showtooltip(e,tooltipTxt)
	{
		var browser=navigator.userAgent;
		var res=browser.search(/MSIE/i);
		if((res>0 && window.parent.document.readyState == 'complete') || (res<0)){
		
			var bodyWidth = Math.max(document.body.clientWidth,document.documentElement.clientWidth) - 20;
		
			if(!tooltip){
				tooltip = document.createElement('DIV');
				tooltip.id = 'tooltip';
				tooltipShadow = document.createElement('DIV');
				tooltipShadow.id = 'tooltipShadow';
				document.body.appendChild(tooltip);
				document.body.appendChild(tooltipShadow);
				if(tooltip_is_msie){
					dhtmlgoodies_iframe = document.createElement('IFRAME');
					dhtmlgoodies_iframe.frameborder='5';
					dhtmlgoodies_iframe.style.backgroundColor='#FFFFFF';
					dhtmlgoodies_iframe.src = '#'; 	
					dhtmlgoodies_iframe.style.zIndex = 100;
					dhtmlgoodies_iframe.style.position = 'absolute';
					document.body.appendChild(dhtmlgoodies_iframe);
				}
				
			}
			
			tooltip.style.display='block';
			tooltipShadow.style.display='none';
			if(tooltip_is_msie)dhtmlgoodies_iframe.style.display='block';
			
			var st = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
			if(navigator.userAgent.toLowerCase().indexOf('safari')>=0)st=0; 
			var leftPos = e.clientX + 10;
			
			tooltip.style.width = null;	// Reset style width if it's set 
			tooltip.innerHTML = tooltipTxt;
			tooltip.style.left = leftPos + 'px';
			tooltip.style.top = e.clientY + 10 + st + 'px';

			
			tooltipShadow.style.left =  leftPos + dhtmlgoodies_shadowSize + 'px';
			tooltipShadow.style.top = e.clientY + 10 + st + dhtmlgoodies_shadowSize + 'px';
			
			if(tooltip.offsetWidth>tooltipMaxWidth){	/* Exceeding max width of tooltip ? */
				tooltip.style.width = tooltipMaxWidth + 'px';
			}
			
			var tooltipWidth = tooltip.offsetWidth;		
			if(tooltipWidth<tooltipMinWidth)tooltipWidth = tooltipMinWidth;
			
			
			tooltip.style.width = tooltipWidth + 'px';
			tooltipShadow.style.width = tooltip.offsetWidth + 'px';
			tooltipShadow.style.height = tooltip.offsetHeight + 'px';		
			
			if((leftPos + tooltipWidth)>bodyWidth){
				tooltip.style.left = (tooltipShadow.style.left.replace('px','') - ((leftPos + tooltipWidth)-bodyWidth)) + 'px';
				tooltipShadow.style.left = (tooltipShadow.style.left.replace('px','') - ((leftPos + tooltipWidth)-bodyWidth) + dhtmlgoodies_shadowSize) + 'px';
			}
			
			if(tooltip_is_msie){
				dhtmlgoodies_iframe.style.left = tooltip.style.left;
				dhtmlgoodies_iframe.style.top = tooltip.style.top;
				dhtmlgoodies_iframe.style.width = tooltip.offsetWidth + 'px';
				dhtmlgoodies_iframe.style.height = tooltip.offsetHeight + 'px';
			
			}
		}		
	};
	function hide()
	{
		tooltip.style.display='none';
		tooltipShadow.style.display='none';		
		if(tooltip_is_msie)dhtmlgoodies_iframe.style.display='none';		
	}
