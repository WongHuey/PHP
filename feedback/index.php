<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
body
{
font-size:12px;
line-height:20px;
}
table
{
padding:10px;
margin:10px;
}
</style>
</head>

<body>
<?php   
$rootdir="./";   
$spacenum=0;   
$filenum=0;   
$allfilesize=0;   
echo "<h1 style='text-align:center'>网站询盘列表</h1>";    
readLogDir($rootdir);   
echo "<hr>";   
echo "Total files count: $filenum.<br>";   
echo "Total disk space used: $allfilesize<br>";   
$freespace=diskfreespace("/");   
echo "residue disk space: $freespace<br>";   
  
function readLogDir($subdir){   
global $rootdir,$spacenum,$filenum,$allfilesize;   
  
@chdir($subdir) or die ("error:could not change to this directory!");   
$dirobject=dir($subdir);   
echo "<table width=99% border=0 align='center' id='clearStart'><tr id='ignore' ><td width=60% onclick='JM_PowerList(0)'><b><font style='font-size:16px'>文件名</font></b></a></td><td width=20% onclick='JM_PowerList(1)'><b><font style='font-size:16px'>文件大小</font></b> (点击排序)</td><td width=40% onclick='JM_PowerList(2)'><b><font style='font-size:16px'>创建时间</font></b>(点击排序)</td></tr>";   
$i=0;   
while ($file=$dirobject->read()){   
$pathinfo = pathinfo($file); 

if($file=="." || $file==".." || $file =="index.php" || $file =="upfile.php"){   
continue;   
}   
$i=$i+1;   
echo "<tr bgcolor='#e0e0e0'><td>".$i." <a href='upfile.php?filename=".$file."' target=_blank>";   
echo $file."</a></td><td>". number_format((filesize($file)/1024),2,'.','')."KB</td><td>". date("Y-m-d H:i:s", filemtime($file)). "</td></tr>";   
$allfilesize+=filesize($file);   
$filenum++;   
}   
echo "</table>";   
return;   
}   
?>   
<script language="javascript">
/** 
* table排序 
* anthor liueh 
*/  
function JM_PowerList(colNum)   
{   
headEventObject=event.srcElement;//取得引发事件的对象   
while(headEventObject.tagName!="TR") //不是tr行,则从底下的td冒泡上来寻找到相应行   
{   
headEventObject=headEventObject.parentElement;   
}   
  
for (i=0;i<headEventObject.children.length;i++)   
{   
if (headEventObject.children[i]!=event.srcElement)//找到事件发生的td单元格   
{   
headEventObject.children[i].className='listTableHead';//把点击的列的className属性设为listTableHead   
}   
}   
  
var tableRows=0;   
trObject=clearStart.children[0].children; //取得表格中行对象, 原来这里叫DataTable, 可能是你写错了吧??   
for (i=0;i<trObject.length;i++)   
{   
Object=clearStart.children[0].children[i];//取得每行的对象   
tableRows=(trObject[i].id=='ignore')?tableRows:tableRows+1;//如果不是忽略行,则行数加一   
}   
  
var trinnerHTML=new Array(tableRows);   
var tdinnerHTML=new Array(tableRows);   
var tdNumber=new Array(tableRows)   
var i0=0   
var i1=0   
for (i=0;i<trObject.length;i++)   
{   
if (trObject[i].id!='ignore')   
{   
trinnerHTML[i0]=trObject[i].innerHTML;//把行放在数组里   
tdinnerHTML[i0]=trObject[i].children[colNum].innerHTML;//把要排序的行中td的内容放数组里   
tdNumber[i0]=i;//行号   
i0++;//加一,下个循环用   
}   
}   
sourceHTML=clearStart.children[0].outerHTML;//取得表格中所有tr的html代码   
  
//对所有td中的字符串进行排序, 算不算冒泡排序???   
for (bi=0;bi<tableRows;bi++)   
{   
for (i=0;i<tableRows;i++)   
{   
if(tdinnerHTML[i]>tdinnerHTML[i+1])   
{   
t_s=tdNumber[i+1];   
t_b=tdNumber[i];   
tdNumber[i+1]=t_b;   
tdNumber[i]=t_s;   
temp_small=tdinnerHTML[i+1];   
temp_big=tdinnerHTML[i];   
tdinnerHTML[i+1]=temp_big;   
tdinnerHTML[i]=temp_small;   
}   
}   
}   
  
  
  
var showshow='';   
var numshow='';   
for (i=0;i<tableRows;i++)   
{   
showshow=showshow+tdinnerHTML[i]+'\n';//把排序好的td的内容存在showshow字串里   
numshow=numshow+tdNumber[i]+'|'; //把排序好的相应的行号也存在numshow中   
}   
  
sourceHTML_head=sourceHTML.split("<TBODY>");//从<TBODY>截断,我试了,前头串为空   
  
numshow=numshow.split("|");   
var trRebuildHTML='';   
if (event.srcElement.className=='listHeadClicked')   
{//已点击的列, 则逆排   
for (i=0;i<tableRows;i++)   
{   
trRebuildHTML=trRebuildHTML+trObject[numshow[tableRows-1-i]].outerHTML;//取出排序好的tr的内容连接起来   
  
}   
event.srcElement.className='listHeadClicked0';   
}   
else   
{//默认顺排,新点击顺排   
for (i=0;i<tableRows;i++)   
{   
trRebuildHTML=trRebuildHTML+trObject[numshow[i]].outerHTML;   
}   
event.srcElement.className='listHeadClicked';   
}   
//取得排序后的tr集合结果字符串   
var DataRebuildTable='';   
//把旧的表格头和新的tr排序好的元素连接起来, (修改了一下)   
DataRebuildTable = "<table border=0 width=99% id='clearStart' align='center'><TBODY>" + trObject[0].outerHTML + trRebuildHTML + "</TBODY>" +   
  
"</table>";   
clearStart.outerHTML=DataRebuildTable;//表格用新串重新写一次   
  
}   
</script>
</body>
</html>
