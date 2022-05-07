<!DOCTYPE html>
<html lang="en">
<head>
<meta name="Generator" content="KaBeiLu v2" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/master.css" rel="stylesheet">
<link href="css/header.css" rel="stylesheet">

<link rel="stylesheet" id="switcher-css" type="text/css" href="plugins/switcher/css/switcher.css" media="all" />
<link rel="stylesheet" href="images/login/css/style.css" type="text/css" media="all" />
<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,good_transport.js')); ?>
<style>
table {
	font-size:13px;
}
</style>
</head><body class="animated-css" data-scrolling-animations="false">
<div class="sp-body">

<div id="loader">
<div class="loader"></div>
</div>

<?php echo $this->fetch('library/page_header.lbi'); ?>
<section id="pageTitleBox" class="paralax breadcrumb-container"  style="background-image: url('images/contact-heading-bg.jpg');">
<!-- <div class="overlay"></div> -->
<div class="container relative">
<h2 class="title color-main text-capitalize zoomIn" style="color:#333333">MY
ACCOUNT</h2>
</div>
</section>


<section id="contact-us" class="memb">
<div class="container">
<div class="row">
<div class="block block1">

<?php if ($this->_var['action'] == 'login'): ?>

<div class="sub-main-w3" >
<form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()" >
<h2 style="margin-bottom:30px; color:#333;">Login Now <i class="fa fa-level-down-alt"></i> </h2>
<div class="form-style-agile">
<input type="text" id="username"  name="username"  placeholder="Name" required>
</div>
<div class="form-style-agile">
<input type="password" id="password" name="password"  placeholder="PassWord" required >
</div>

<div class="wthree-text">
<ul>
<li style="color:#333"> <a href="mailto:webmaster@kabeilu.com" style="color:#333">Forgot Password?</a> | <a href="/user.php?act=register" style="color:#333">Sign
up</a> </li>
</ul>
</div>
<input type="hidden" value="1" name="remember" id="remember" />
<input type="hidden" name="act" value="act_login" />
<input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />

<input type="submit" value="Log In">
</form>
</div>

<?php endif; ?>


<?php if ($this->_var['action'] == 'register'): ?>
<?php if ($this->_var['shop_reg_closed'] == 1): ?>
<div class="usBox">
<div class="usBox_2 clearfix">
<div class="f1 f5" align="center"><?php echo $this->_var['lang']['shop_register_closed']; ?></div>
</div>
</div>
<?php else: ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>

<div class="sub-main-w3">
<form action="user.php" method="post" name="formUser" onsubmit="return register();">
<h2 style="margin-bottom:30px; color:#333">Create An Account <i class="fa fa-level-down-alt"></i> </h2>
<div class="form-style-agile">
<input name="username" type="text" style="" id="username" onblur="is_registered(this.value);" placeholder="Username" required />
</div>
<div class="form-style-agile">
<input name="email" type="text" size="25" id="email" onblur="checkEmail(this.value);" placeholder="Email" required />
</div>
<div class="form-style-agile">
<input name="mobile_phone" type="text" size="25" id="mobile_phone"  placeholder="Mobile" required />
</div>
<div class="form-style-agile">
<input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" placeholder="Password" required />
</div>
<div class="form-style-agile">
<table width="145" border="0" cellspacing="0" cellpadding="1" style="color:#333">
<tr align="center">
<td width="33%" id="pwd_lower"><?php echo $this->_var['lang']['pwd_lower']; ?></td>
<td width="33%" id="pwd_middle"><?php echo $this->_var['lang']['pwd_middle']; ?></td>
<td width="33%" id="pwd_high"><?php echo $this->_var['lang']['pwd_high']; ?></td>
</tr>
</table>
</div>
<div class="form-style-agile">
<input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);" placeholder="Re-password" required />
</div>
<div class="form-style-agile">
<input type="text" size="8" name="captcha" style="width:100px" placeholder="Verification" required />
　 <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer; height:30px" onClick="this.src='captcha.php?'+Math.random()" /> </div>
<input name="ipaddress" type="hidden" value="127.0.0.1" />
<input name="agreement" type="hidden" value="1" checked="checked" />
<input name="act" type="hidden" value="act_register" >
<input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />

<input type="submit" value="Regist">
</form>
</div>

<?php endif; ?>
<?php endif; ?>


<?php if ($this->_var['action'] == 'get_password'): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
<script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
<div class="usBox_2 clearfix">
<form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
<br />
<table width="70%" border="0" align="center" cellpadding="1" cellspacing="1">
<tr>
<td colspan="2" align="center"><strong><?php echo $this->_var['lang']['username_and_email']; ?></strong></td>
</tr>
<tr>
<td width="29%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
<td width="61%">
<input name="user_name" type="text" size="30" class="inputBg" />
</td>
</tr>
<tr>
<td align="right"><?php echo $this->_var['lang']['email']; ?></td>
<td>
<input name="email" type="text" size="30" class="inputBg" />
</td>
</tr>
<tr>
<td></td>
<td>
<input type="hidden" name="act" value="send_pwd_email" />
<input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
<input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
</td>
</tr>
</table>
<br />
</form>
</div>
</div>
<?php endif; ?>

<?php if ($this->_var['action'] == 'qpassword_name'): ?>
<div class="usBox">
<div class="usBox_2 clearfix">
<form action="user.php" method="post">
<br />
<table width="70%" border="0" align="center" cellpadding="1" cellspacing="1">
<tr>
<td colspan="2" align="center"><strong><?php echo $this->_var['lang']['get_question_username']; ?></strong></td>
</tr>
<tr>
<td width="29%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
<td width="61%">
<input name="user_name" type="text" size="30" class="inputBg" />
</td>
</tr>
<tr>
<td></td>
<td>
<input type="hidden" name="act" value="get_passwd_question" />
<input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
<input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
</td>
</tr>
</table>
<br />
</form>
</div>
</div>
<?php endif; ?>

<?php if ($this->_var['action'] == 'get_passwd_question'): ?>
<div class="usBox">
<div class="usBox_2 clearfix">
<form action="user.php" method="post">
<br />
<table width="70%" border="0" align="center" cellpadding="1" cellspacing="1">
<tr>
<td colspan="2" align="center"><strong><?php echo $this->_var['lang']['input_answer']; ?></strong></td>
</tr>
<tr>
<td width="29%" align="right"><?php echo $this->_var['lang']['passwd_question']; ?>：</td>
<td width="61%"><?php echo $this->_var['passwd_question']; ?></td>
</tr>
<tr>
<td align="right"><?php echo $this->_var['lang']['passwd_answer']; ?>：</td>
<td>
<input name="passwd_answer" type="text" size="20" class="inputBg" />
</td>
</tr>
<?php if ($this->_var['enabled_captcha']): ?>
<tr>
<td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
<td>
<input type="text" size="8" name="captcha" class="inputBg" />
<img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
</tr>
<?php endif; ?>
<tr>
<td></td>
<td>
<input type="hidden" name="act" value="check_answer" />
<input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
<input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
</td>
</tr>
</table>
<br />
</form>
</div>
</div>
<?php endif; ?>
<?php if ($this->_var['action'] == 'reset_password'): ?>
<script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
<div class="usBox_2 clearfix">
<form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
<br />
<table width="80%" border="0" align="center" cellpadding="1" cellspacing="1">
<tr>
<td><?php echo $this->_var['lang']['new_password']; ?></td>
<td>
<input name="new_password" type="password" size="25" class="inputBg" />
</td>
</tr>
<tr>
<td><?php echo $this->_var['lang']['confirm_password']; ?>:</td>
<td>
<input name="confirm_password" type="password" size="25"  class="inputBg"/>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="hidden" name="act" value="act_edit_password" />
<input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
<input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
<input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" />
</td>
</tr>
</table>
<br />
</form>
</div>
</div>
<?php endif; ?>
</div>
</div>
</div>
</section>
<div class="modal fade bs-example-modal-lg20" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">X</span></button>
<h4 id="gridSystemModalLabel" class="modal-title">RETRIEVE YOUR PASSWORD OR USERNAME
HERE</h4>
</div>
<div class="modal-body">
<form class="navbar-form"  method="post" action="/images/password-zh.php" onSubmit="return checkSearchForm()">
<div id="search">
<div class="input-group"> <font class="searchtitle"></font>
<input type="email" id="searchQuery" name="keywords" placeholder="Email Address" class="form-control" required>
<button type="submit" class="btn-search"><i class="fa fa-arrow-right"></i></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</body>
</html>
