/* om oude IE's zijn ding te laten doen met de nieuwe tags */
var e = ("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');

for (var i = 0; i < e.length; i++)
{
	document.createElement(e[i]);
}