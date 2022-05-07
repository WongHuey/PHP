// JavaScript Document
function addCookie()
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

function setHomepage()
{
 if (document.all)
    {
        document.body.style.behavior='url(#default#homepage)';
  document.body.setHomePage('http://www.kabeilu.com');
 
    }
    else if (window.sidebar)
    {
    if(window.netscape)
    {
         try
   {  
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
         }  
         catch (e)  
         {  
    alert( "Error" );  
         }
    } 
    var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
    prefs.setCharPref('browser.startup.homepage','http://www.kabeilu.com');
 }
}

function change_div(id){
  if (id == 'gsywly' )
  {
     document.getElementById("gsgs").style.display = 'none' ;
     document.getElementById("gsywly").style.display = 'block' ; 
	 
	 document.getElementById("qhdt").style.color = '#CC0000' ; 
	 
	 
	 
	 document.getElementById("qhxin").style.color = '#01537b' ; 
	 
  }
  else 
  {
     document.getElementById("gsywly").style.display = 'none' ; 
     document.getElementById("gsgs").style.display = 'block' ;
	 
	 	 document.getElementById("qhxin").style.color = '#CC0000' ; 
	 document.getElementById("qhdt").style.color = '#01537b' ; 
  } 
}
