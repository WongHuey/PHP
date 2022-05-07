<?php
        include_once('includes/cls_captcha3.php');
        $validator = new captcha();
        if (!$validator->check_word($_GET['captcha']))
        {
		echo "0";
            
        }
		else
		{
		echo "1";
		}
?>