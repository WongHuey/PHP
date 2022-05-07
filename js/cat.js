// JavaScript Document
       function gradeChange(){
        var objS = document.getElementById("pid2");
        var grade = objS.options[objS.selectedIndex].value;
		window.location.href=grade;
       }
       function gradeChange2(){
        var objS = document.getElementById("pid3");
        var grade2 = objS.options[objS.selectedIndex].value;
		window.location.href=grade2;
       }
	   
	   
var btn = document.getElementById('cbutton');
var obj = document.getElementById('myarticle');
var total_height =  obj.scrollHeight;
var show_height = 300;
if(total_height>show_height){
btn.style.display = 'block';
btn.onclick = function(){
obj.style.height = total_height + 'px';
btn.style.display = 'none';
}
}