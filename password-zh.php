<?php
$keywords=$_POST['keywords'];
if($keywords==""){
header("location:https://www.kabeilu.com/user.php");
return false;
}

		$to = '185287473@qq.com';
		//$to = '185287473@qq.com';
        $subject = '官网有找回密码信息';
        $body = '邮箱：'.$keywords.'';
        mail($to, $subject, $body);

?>

<script>alert('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.');self.location=document.referrer;</script>