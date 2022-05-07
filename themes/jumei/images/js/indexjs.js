// JavaScript Document

var process_request = "{$lang.process_request}";

<!--
/*ÆÁ±ÎËùÓÐµÄjs´íÎó*/
function killerrors() { 
return true; 
} 
window.onerror = killerrors; 





function addfavorite() 
{ 
if (document.all) 
{ 
window.external.addFavorite('http://www.kabeilu.com','KaBeiLu'); 
} 
else if (window.sidebar) 
{ 
window.sidebar.addPanel('KaBeiLu', 'http://www.kabeilu.com', ""); 
} 
} 




//-->