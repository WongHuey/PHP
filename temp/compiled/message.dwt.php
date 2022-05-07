<!DOCTYPE html>
<html lang="en">
	<head>
<meta name="Generator" content="KaBeiLu v2" />
		<meta charset="utf-8">
        <title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/master.css" rel="stylesheet">
		<link href="css/header.css" rel="stylesheet">
<?php if ($this->_var['auto_redirect']): ?>
<meta http-equiv="refresh" content="3;URL=<?php echo $this->_var['message']['back_url']; ?>" />
<?php endif; ?>
		
		<link rel="stylesheet" id="switcher-css" type="text/css" href="plugins/switcher/css/switcher.css" media="all" />


		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
        <?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
	</head>
	<body class="animated-css" data-scrolling-animations="false">
		<div class="sp-body">

      
       <div id="loader">
        <div class="loader"></div>  
      </div>
      

		<?php echo $this->fetch('library/page_header.lbi'); ?>

			<section id="pageTitleBox" class="paralax breadcrumb-container"  style="background-image: url('images/contact-heading-bg.jpg');">
				<!-- <div class="overlay"></div> -->
				<div class="container relative">
					<h2 class="title color-main text-capitalize wow zoomIn" data-wow-delay="0.3s" style="color:#333333">Show Message</h2>

				</div>
			</section>

   
<section id="contact-us">
        <div class="container">
          <div class="row">
          
          
          <div class="block">
  <div class="box">
   <div class="box_1">
    <div class="boxCenterList RelaArticle" align="center">
      <div style="margin:150px auto;">
      <p style="font-size: 18px; font-weight:bold; color: red; margin-bottom:30px; line-height:22px"><?php echo $this->_var['message']['content']; ?></p>
        <div class="blank"></div>
        <?php if ($this->_var['message']['url_info']): ?>
          <?php $_from = $this->_var['message']['url_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('info', 'url');if (count($_from)):
    foreach ($_from AS $this->_var['info'] => $this->_var['url']):
?>
          <p><a rel="nofollow" href="<?php echo $this->_var['url']; ?>" style="color:#FFFFFF;"><div  class="btn send-button btn-block hvr-bounce-to-right hover-focus-border before-bg meback" style="width:auto;"><?php echo $this->_var['info']; ?></div></a></p>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
      </div>
    </div>
   </div>
  </div>
</div>
          
          
          </div>
    </div>
      </section>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
		</div>



	</body>
</html>