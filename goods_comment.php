<?php

/**
 * 提交用户评论
*/


/** 
 * 检测访问的ip是否为规定的允许的ip 
 * Enter description here ... 
 */  

if (getenv("HTTP_CLIENT_IP"))
  $ip = getenv("HTTP_CLIENT_IP"); 
else if(getenv("HTTP_X_FORWARDED_FOR"))
  $ip = getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("REMOTE_ADDR"))
  $ip = getenv("REMOTE_ADDR");
else $ip = "Unknow";
$ALLOWED_IP=array('121.33.75.18','112.94.23.10','59.41.184.142');
//允许访问的ip
$check_ip_arr= explode('.',$ip);
//ip参数拆分成数组
if(!in_array($ip,$ALLOWED_IP)) {
  $bl=false;
  foreach ($ALLOWED_IP as $val){
    if(strpos($val,'*')!==false){
      //发现有*号替代符
      $arr=array();
      $arr=explode('.', $val);
      $bl=true;
      //用于记录循环检测中是否有匹配成功的
      for ($i=0;$i<4;$i++){
        if($arr[$i]!='*'){
          //不等于* 就要进来检测，如果为*符号替代符就不检查
          if($arr[$i]!=$check_ip_arr[$i]){
            $bl=false;
            break;
            //终止检查本个ip 继续检查下一个ip
          }
        }
      }
      //end for
      if($bl){
        //如果是true则终止匹配
        break;
      }
    }
  }
  //end foreach
  if(!$bl){
    $return=array(
       'status'=>2,
       'msg'=>'该IP无权限访问',
       'data'=>$ip
       );
    echo json_encode($return);
    exit();
  }
}


define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require(dirname(__FILE__) . '/includes/cls_image.php');


if (empty($_CFG['message_board']))
{
    show_message($_LANG['message_board_close']);
}


$image = new cls_image($_CFG['bgcolor']);

$user_id = empty($_SESSION['user_id']) ? 0 : $_SESSION['user_id'];
$email = empty($_POST['email']) ? $_SESSION['email'] : trim($_POST['email']);
//$user_name = empty($_SESSION['user_name']) ? '' : trim($_SESSION['user_name']);
//$user_name = empty($_POST['user_name']) ? 0: intval($_POST['user_name']);
$user_name =$_POST['user_name88'];
$email = htmlspecialchars($email);
//$user_name = htmlspecialchars($user_name);
$content = empty($_POST['content']) ? '' : htmlspecialchars(trim($_POST['content']));
$type = empty($_POST['cmt_type']) ? 0: intval($_POST['cmt_type']);
$id = empty($_POST['id']) ? 0 : intval($_POST['id']);
$rank = empty($_POST['comment_rank']) ? 5 : intval($_POST['comment_rank']);
$msg_type = empty($_POST['msg_type']) ? 0 : intval($_POST['msg_type']);
$status = 1 - $GLOBALS['_CFG']['comment_check'];
$captcha = empty($_POST['captcha']) ? '' : trim($_POST['captcha']);



if (!is_email($email))
{
	show_message($_LANG['error_email']);
}
$cur_time = gmtime();
if ((intval($_CFG['captcha']) & CAPTCHA_COMMENT) && gd_version() > 0)
{
	/* 检查验证码 */
	include_once('includes/cls_captcha.php');
	$validator = new captcha();
	//if (!$validator->check_word($captcha))
	//{
	//	show_message($_LANG['invalid_captcha']);
	//}
}
else
{
	 /* 没有验证码时，用时间来限制机器人发帖或恶意发评论 */
	if (!isset($_SESSION['send_time']))
	{
		$_SESSION['send_time'] = 0;
	}
	if (($cur_time - $_SESSION['send_time']) < 30) // 小于30秒禁止发评论
	{
		$result['error']   = 1;
		show_message($cmt_spam_warning);
	}
}


$factor = intval($_CFG['comment_factor']);
if ($type == 0)
{
	
	/* 只有商品才检查评论条件 */
	switch ($factor)
	{
		case COMMENT_LOGIN :
		if ($_SESSION['user_id'] == 0)
		{
			show_message($_LANG['comment_login']);
		}
		break;
		case COMMENT_CUSTOM :
			if ($_SESSION['user_id'] > 0)
			{
				$sql = "SELECT o.order_id FROM " . $ecs->table('order_info') . " AS o ".
					   " WHERE user_id = '" . $_SESSION['user_id'] . "'".
					   " AND o.order_status = '" . OS_CONFIRMED . "' ".
					   " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
					   " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
					   " LIMIT 1";
				 $tmp = $db->getOne($sql);
				 if (empty($tmp))
				 {
					show_message($_LANG['comment_brought']);
				 }
			}
			else
			{
				show_message($_LANG['comment_custom']);
			}
			break;

		case COMMENT_BOUGHT :
			if ($_SESSION['user_id'] > 0)
			{
				$sql = "SELECT o.order_id".
					   " FROM " . $ecs->table('order_info'). " AS o, ".
					   $ecs->table('order_goods') . " AS og ".
					   " WHERE o.order_id = og.order_id".
					   " AND o.user_id = '" . $_SESSION['user_id'] . "'".
					   " AND og.goods_id = '" . $id . "'".
					   " AND o.order_status = '" . OS_CONFIRMED . "' ".
					   " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
					   " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
					   " LIMIT 1";
				 $tmp = $db->getOne($sql);
				 if (empty($tmp))
				 {
					 show_message($result['message']);
				 }
			}
			else
			{
				show_message($_LANG['comment_custom']);
			}
	  }
	  //switch

	  $upload_size_limit = $GLOBALS['_CFG']['upload_size_limit'] == '-1' ? ini_get('upload_max_filesize') : $GLOBALS['_CFG']['upload_size_limit'];
	  $last_char = strtolower($upload_size_limit{strlen($upload_size_limit)-1});
	  switch ($last_char)
	  {
		  case 'm':
			  $upload_size_limit *= 1024*1024;
			  break;
		  case 'k':
			  $upload_size_limit *= 1024;
			  break;
	  }
	  $allow_file_types = '|GIF|JPG|PNG|BMP|';
	  
	  
	  //检查第一张图片
	  if((isset($_FILES['comment_img1']['error']) && $_FILES['comment_img1']['error'] == 0) || (!isset($_FILES['comment_img1']['error']) && isset($_FILES['comment_img1']['tmp_name']) && $_FILES['comment_img1']['tmp_name'] != 'none'))
	  {
		  if($_FILES['comment_img1']['size'] / 1024 > $upload_size_limit)
		  {
			  //show_message(sprintf($GLOBALS['_LANG']['upload_file_limit'], $upload_size_limit));
			 // exit;
		  }
		  // 检查文件格式
		  if (!check_file_type($_FILES['comment_img1']['tmp_name'], $_FILES['comment_img1']['name'], $allow_file_types))
		  {
			  show_message("Only GIF,JPG,PNG,BMP");
		  }
	  }
	  
	  if((isset($_FILES['comment_img2']['error']) && $_FILES['comment_img2']['error'] == 0) || (!isset($_FILES['comment_img2']['error']) && isset($_FILES['comment_img2']['tmp_name']) && $_FILES['comment_img2']['tmp_name'] != 'none'))
	  {
		  if($_FILES['comment_img2']['size'] / 1024 > $upload_size_limit)
		  {
			 // show_message(sprintf($GLOBALS['_LANG']['upload_file_limit'], $upload_size_limit));
			  //exit;
		  }
		  // 检查文件格式
		  if (!check_file_type($_FILES['comment_img2']['tmp_name'], $_FILES['comment_img2']['name'], $allow_file_types))
		  {
			  show_message("Only GIF,JPG,PNG,BMP");
		  }
	  }
	  
	  if((isset($_FILES['comment_img3']['error']) && $_FILES['comment_img3']['error'] == 0) || (!isset($_FILES['comment_img3']['error']) && isset($_FILES['comment_img3']['tmp_name']) && $_FILES['comment_img3']['tmp_name'] != 'none'))
	  {
		  if($_FILES['comment_img3']['size'] / 1024 > $upload_size_limit)
		  {
			  //show_message(sprintf($GLOBALS['_LANG']['upload_file_limit'], $upload_size_limit));
			 // exit;
		  }
		  // 检查文件格式
		  if (!check_file_type($_FILES['comment_img3']['tmp_name'], $_FILES['comment_img3']['name'], $allow_file_types))
		  {
			  show_message("Only GIF,JPG,PNG,BMP");
		  }
	  }
	  
	  if((isset($_FILES['comment_img4']['error']) && $_FILES['comment_img4']['error'] == 0) || (!isset($_FILES['comment_img4']['error']) && isset($_FILES['comment_img4']['tmp_name']) && $_FILES['comment_img4']['tmp_name'] != 'none'))
	  {
		  if($_FILES['comment_img4']['size'] / 1024 > $upload_size_limit)
		  {
			 // show_message(sprintf($GLOBALS['_LANG']['upload_file_limit'], $upload_size_limit));
			  //exit;
		  }
		  // 检查文件格式
		  if (!check_file_type($_FILES['comment_img4']['tmp_name'], $_FILES['comment_img4']['name'], $allow_file_types))
		  {
			  show_message("Only GIF,JPG,PNG,BMP");
		  }
	  }
	  
	  if((isset($_FILES['comment_img5']['error']) && $_FILES['comment_img5']['error'] == 0) || (!isset($_FILES['comment_img5']['error']) && isset($_FILES['comment_img5']['tmp_name']) && $_FILES['comment_img5']['tmp_name'] != 'none'))
	  {
		  if($_FILES['comment_img5']['size'] / 1024 > $upload_size_limit)
		  {
			  //show_message(sprintf($GLOBALS['_LANG']['upload_file_limit'], $upload_size_limit));
			 // exit;
		  }
		  // 检查文件格式
		  if (!check_file_type($_FILES['comment_img5']['tmp_name'], $_FILES['comment_img5']['name'], $allow_file_types))
		  {
			  show_message("Only GIF,JPG,PNG,BMP");
		  }
	  }
	  
	  
	  $photo1 = upload_file($_FILES['comment_img1'], 'feedbackimg');
	  $photo2 = upload_file($_FILES['comment_img2'], 'feedbackimg');
	  $photo3 = upload_file($_FILES['comment_img3'], 'feedbackimg');
	  $photo4 = upload_file($_FILES['comment_img4'], 'feedbackimg');
	  $photo5 = upload_file($_FILES['comment_img5'], 'feedbackimg');
	  
	  
	  $photo1_thumb='';
	  $photo2_thumb='';
	  $photo3_thumb='';
	  $photo4_thumb='';
	  $photo5_thumb='';
	  
	  
	  /*增加晒图生成缩略功能 20141108*/
	  
	  for($i=1;$i<=5;$i++)
	  {
		  $img_name_temp = 'photo'.$i;
		  $img_name =$$img_name_temp;
		  if(!empty($img_name))
		  {
			  //$ext = end(explode('.', $img_name));
			  
			  
			   $tmp_ext = explode('.', $img_name);
        $ext = end($tmp_ext);
			  
			  
			  $filename = str_replace('.'.$ext,'',$img_name);
			  
			  $tmp=DATA_DIR . '/feedbackimg/'.$img_name;   
			  $image->make_thumb1($tmp, 600, 600,DATA_DIR.'/feedbackimg/',$filename,$ext);
		  }
	  }
	  
	  
	  for($i=1;$i<=5;$i++)
	  {
		  $img_name_temp = 'photo'.$i;
		  $img_name =$$img_name_temp;
		  if(!empty($img_name))
		  {
			 // $ext = end(explode('.', $img_name));
			  
			  
			  			  
			   $tmp_ext = explode('.', $img_name);
        $ext = end($tmp_ext);
			  
			  
			  $filename = str_replace('.'.$ext,'',$img_name).'_thumb';
			  
			  $tmp=DATA_DIR . '/feedbackimg/'.$img_name;   
			  
			  $name_pri = 'photo'.$i.'_thumb';
			  $res = $image->make_thumb1($tmp, 130, 130,DATA_DIR.'/feedbackimg/',$filename,$ext);
			  
			  if(!empty($res))
			  {
				  $$name_pri = $filename.'.'.$ext;
			  }
			  else
			  {
				  $$name_pri = $img_name;
			  }
		  }
	  }
	  /*增加晒图生成缩略功能 20141108end*/
	  
	  
	  /* 保存评论内容 */
	  
	  


	  
	  
	  $sql = "INSERT INTO " .$GLOBALS['ecs']->table('comment') .
			 "(comment_type, id_value, email, user_name, content, comment_rank, add_time, ip_address, status, parent_id, user_id,photo1,photo2,photo3,photo4,photo5,photo1_thumb,photo2_thumb,photo3_thumb,photo4_thumb,photo5_thumb) VALUES " .
			 "('" .$type. "', '" .$id. "', '$email', '$user_name', '" .$content."', '".$rank."', ".gmtime().", '".real_ip()."', '$status', '0', '$user_id','$photo1','$photo2','$photo3','$photo4','$photo5','$photo1_thumb','$photo2_thumb','$photo3_thumb','$photo4_thumb','$photo5_thumb')";
	  
	  
	  if($GLOBALS['db']->query($sql))
	  {
		  $message = $_CFG['comment_check'] ? $_LANG['cmt_submit_wait'] : $_LANG['cmt_submit_done'];
		  $url= build_uri('goods', array('gid' => $id));
		  show_message($message,"Return","$url", 'error');
	  }
	   $_SESSION['send_time'] = $cur_time;

	   
}


?>