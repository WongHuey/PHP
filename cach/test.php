<?php  
/* 
* @Date 2011-2-24 
* @Author hudeyong926 
*/  
function getCode($length = 32, $mode = 0) {  
    switch ($mode) {  
        case '1' :  
            $str = '123456789';  
            break;  
        case '2' :  
            $str = 'abcdefghijklmnopqrstuvwxyz';  
            break;  
        case '3' :  
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
            break;  
        case '4' :  
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
            break;  
        case '5' :  
            $str = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';  
            break;  
        case '6' :  
            $str = 'abcdefghijklmnopqrstuvwxyz1234567890';  
            break;  
        case '7' ://中文验证码  
            break;  
        default :  
            $str = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';  
            break;  
    }  
    $result = '';  
  
    for($i = 0; $i < $length; $i ++) {  
        if ($mode == 7) {  
            $str [$i] = chr ( mt_rand ( 176, 215 ) ) . chr ( mt_rand ( 161, 249 ) );  
            $str [$i] = iconv ( "GB2312", "UTF-8", $str [$i] ); //imagettftext是utf-8的,所以先转换下  
            $result .= $str [$i];  
        } else {  
            $l = strlen ( $str ) - 1;  
            $num = mt_rand ( 0, $l );  
            $result .= $str [$num];  
        }  
    }  
    return $result;  
}  
  
//建立验证图片  
function createAuthNumImg($randStr, $fontName, $imgW = 100, $imgH = 40) {  
    header ( "content-type: image/png" );  
    $image = imagecreate ( $imgW, $imgH );  
    $fontSize = 20;//字号  
    //$green = imagecolorallocate($image,0x6b,0xc1,0x46);  
    $gray = imagecolorallocate ( $image, 228, 228, 228 ); //灰色  
    $red  = imagecolorallocate ( $image, 255, 102, 204 );//粉色   
    $blue = imagecolorallocate($image,0x53,0x68,0xbd);  
    $colors = array($red, $gray, $blue);  
      
    $color_b = imagecolorallocate ( $image, 0, 0, 0 ); //黑色  
    for($i = 0; $i < 1000; $i ++) { //绘背景干扰点  
        imagesetpixel ( $image, mt_rand ( 0, $imgW ), mt_rand ( 0, $imgH ), $colors[rand(0,count($colors)-1)]);  
    }  
    imagerectangle ( $image, 0, 0, $imgW - 1, $imgH - 1, $color_b );//绘制边框  
    imagettftext ( $image, $fontSize, 5, 3, 25, $color_b, $fontName, $randStr);///将验证字符绘入图片 字符旋转      
    for($i=0; $i<2; $i++){ //绘背景干扰线  
        imageline($image, mt_rand(0,5), mt_rand(6,18), mt_rand(65,$imgW), mt_rand(6,$imgH), $color_b);//一条干扰线  
    }     
    imagepng ( $image );  
    imagedestroy ( $image );  
}  
  
session_start ();  
$verifyCode = GetCode ( 4 );  
$_SESSION ['VERIFY_CODE'] = $verifyCode ;  
createAuthNumImg ( $verifyCode, "ariali.ttf", 75, 30); //字体存放路径,如果你没有文件就去C:\WINDOWS\Fonts文件中找一个吧。  
  
/** 问答模式 
$a=GetCode(2,1);   
$b=GetCode(1,1);   
$passPort = $a."+".$b."=?";   
$verifyCode = $a+$b;   
 
$_SESSION ['VERIFY_CODE'] = $verifyCode ;   
createAuthNumImg ( $passPort, "font.ttf", 75, 30); 
*/  
?> 