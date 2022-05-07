<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 

$myfile = fopen("demo.txt", "r") or die("Unable to open file!");
$myfile2 = fopen("demo2.txt", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("demo.txt"));
$abc=fread($myfile,filesize("demo.txt"));
$abc2=fread($myfile2,filesize("demo2.txt"));
fclose($myfile);


//echo $abc;
//echo $abc2;

$welcomefile=file('demo.txt');
foreach($welcomefile as $v){

       echo $v.'<br>';

	$abc2= str_replace($v,"",$abc2);
	   

}
echo $abc2;

//$temp1=string($abc);

//$temp1=$abc;
//echo $temp1;
//$temp1="html { font-family: sans-serif; \-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100% }xx body {margin: 0}";
//preg_match('/html.*}xx/',$temp1,$m);
//echo $m[0];
?>





<form id="form1" name="form1" method="post" action="">
<textarea name="textarea" id="textarea" cols="45" rows="5"></textarea>
<input type="submit" name="button" id="button" value="提交" />
</form>
</body>

</html>
