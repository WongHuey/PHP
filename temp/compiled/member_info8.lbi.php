<?php if ($this->_var['user_info']): ?>
<a href="user.php" title="<?php echo $this->_var['user_info']['username']; ?>" style="color:#fff">Hi, <?php echo sub_str($this->_var['user_info']['username'],8); ?></a> | <a href="user.php?act=logout" style="color:#fff"><?php echo $this->_var['lang']['user_logout']; ?></a>
<?php else: ?>
 <a href="user.php" style="color:#fff">Log in</a> | <a href="user.php?act=register" style="color:#fff">Sign up</a>
<?php endif; ?>