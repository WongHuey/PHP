// JavaScript Document

var obj11 = document.getElementById("inner2");
var obj111 = document.getElementById("inner");

if(obj11)
{
obj11.style.display="none";
var top11 = getTop(obj11);
var top111 = getTop(obj111);
var isIE6 = /msie 6/i.test(navigator.userAgent);
}


	var oRTT=document.getElementById('Telescopic');
	var pH=document.documentElement.clientHeight;
	var timer=null;
	var bodyScrollTop;

window.onscroll = function(){



		if(bodyScrollTop>=pH){
			oRTT.style.display='block';
		}else{
			oRTT.style.display='none';
		}
		//return bodyScrollTop;


	bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;




	if (bodyScrollTop > top111){
	
obj11.style.display="";
		obj11.style.position = (isIE6) ? "absolute" : "fixed";
		obj11.style.top = (isIE6) ? bodyScrollTop + "px" : "0px";
		
		
	} else {
		obj11.style.position = "static";
		obj11.style.display="none";
			
	}
	
	

	
	
	
}
function getTop(e){
	var offset = e.offsetTop;
	if(e.offsetParent != null) offset += getTop(e.offsetParent);

	return offset;
}



	
	oRTT.onclick=function(){

		clearInterval(timer);
		timer=setInterval(function(){
			var now=bodyScrollTop;
			var speed=(0-now)/10;
			speed=speed>0?Math.ceil(speed):Math.floor(speed);
			if(bodyScrollTop==0){
				clearInterval(timer);
			}
			document.documentElement.bodyScrollTop=bodyScrollTop+speed;
			document.body.scrollTop=bodyScrollTop+speed;
		}, 30);
	}