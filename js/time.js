function time(){
if (!document.all&&!document.getElementById) return
thelement=document.getElementById? document.getElementById("tick_tack"): document.all.tick_tack /* переменная thelement получает свойства элемента с итендификатором "tick_tack" */
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="PM"
if (minutes<=9) minutes="0"+minutes
if (seconds<=9) seconds="0"+seconds
var ctime=hours+":"+minutes+":"+seconds

thelement.innerHTML="<b style='font-size:14;color:black;'>"+ctime+"</b>" /* браузер с помощью свойства элемента innerHTML отображает получаемое текстовое значение на месте этого элемента*/

setTimeout("time()",1000)} /* запускает на выполнение функции time каждые 1000 мс (1 секунда) */

window.onload=time /* запускает выполнение функции time при загрузке web-страницы */ 