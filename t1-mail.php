<?php

define('IN_ECS', true);
/* 代码 */
require(dirname(__FILE__) . '/includes/init.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send To Mail</title>
<link href="themes/jumei/images/css.css" rel="stylesheet" type="text/css" />
<link href="themes/jumei/images/webfonts/ostrich-sans.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.txtbtn {
	background-color: #FFFFFF;
	margin: 0px;
	height: 30px;
	width: 300px;
	font-size: 12px;
	color: #666666;
	padding-top: 3px;
	padding-right: 5px;
	padding-bottom: 0px;
	padding-left: 5px;
}

#mbody {
	background-color: #FFFFFF;
	margin: 0px;
	height: 200px;
	width: 500px;
	font-size: 12px;
	color: #666666;
	padding-top: 3px;
	padding-right: 5px;
	padding-bottom: 0px;
	padding-left: 5px;
}
.btnsub {
	margin: 0px;
	padding: 0px;
	height: 50px;
	width: 150px;
	position: relative;
}

.font19
{
font-family: Prociono;
font-size:22px;
line-height:36px;

}


-->
</style>
</head>

<body>
<table width="749" border="0" align="center" cellpadding="0" cellspacing="0" height="10">
  <tr>
    <td width="749"></td>
  </tr>
</table>
<?php
if (isset($_REQUEST['mname']) && isset($_REQUEST['memail']) && isset($_REQUEST['mbody']))
{
?>

<?php

send_mail('', '981979568@qq.com', 'KBL Mail', 'Email:<a href=mailto:'.$_REQUEST['memail'].'>'.$_REQUEST['memail'].'</a><br>Content:'.$_REQUEST['mbody'], 1);

//send_mail('', '185287473@qq.com', 'KBL Mail', 'Email:<a href=mailto:'.$_REQUEST['memail'].'>'.$_REQUEST['memail'].'</a><br>Content:'.$_REQUEST['mbody'], 1);

?>


<table width="750" border="0" align="center" cellpadding="20" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="769" height="500" align="center"><p class="font19">Your message has been received, We will reply to you as soon as possible, Please pay attention to your email!<br />
    Thank you!</p></td>
  </tr>
</table>


<?php
}
else
{
?>

<form action="s-mail.php" method="post" name="xpsy">

<table width="750" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td height="70" colspan="2" bgcolor="#58185b"><img src="http://www.t1hair.com/images/logo3.jpg" width="180" height="50" /></td>
  </tr>
  <tr>
    <td height="46" colspan="2" bgcolor="#FFFFFF"><p class="font19">Please leave us a message, and we will reply to you as soon as possible</p></td>
  </tr>
  <tr>
    <td width="130" height="40" align="right" bgcolor="#FFFFFF">Name:</td>
    <td width="600" height="40" bgcolor="#FFFFFF"><input type="text" name="mname" id="mname" class="txtbtn" /> 
      *</td>
  </tr>
  <tr>
    <td height="40" align="right" bgcolor="#FFFFFF">Email:</td>
    <td height="40" bgcolor="#FFFFFF"><input type="text" name="memail" id="memail"  class="txtbtn" />
      *</td>
  </tr>
  <tr>
    <td height="122" align="right" bgcolor="#FFFFFF">Content:</td>
    <td height="122" bgcolor="#FFFFFF"><textarea name="mbody" id="mbody" cols="45" rows="5"></textarea>
    *</td>
  </tr>
  <tr>
    <td height="80" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="80" bgcolor="#FFFFFF"><input type="button" name="button" id="button" value="Submit" class="btnsub" onclick="CheckForm()" />
      <input type="reset" name="button2" id="button2" value="Reset" class="btnsub" /></td>
  </tr>
</table>
</form>

<script  language="javascript">
function CheckForm()
{  




	if  (document.xpsy.mname.value.length  ==  0)  {  
	alert("Please put in Name!");

	document.xpsy.mname.focus();
	return  false;
	}
	
    if  (document.xpsy.memail.value.length  ==  0)  {  
	alert("Please put in Email!");

	document.xpsy.memail.focus();
	return  false;
	}
	
	if  (document.xpsy.mbody.value.length  ==  0)  {  
	alert("Please put in Content!");

	document.xpsy.mbody.focus();
	return  false;
	}
	
	xpsy.submit();
	document.xpsy.button.disabled="true";
	
	
}
</script>

<?php
}
?>

</body>
</html>
