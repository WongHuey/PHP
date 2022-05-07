<!DOCTYPE html>
<html lang="en">
<head>
<meta name="Generator" content="KaBeiLu v2" />
<meta charset="utf-8">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="googlebot" content="NOODP" />
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel='canonical' href='<?php echo $this->_var['get_url']; ?>' />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $this->_var['page_title']; ?>" />
<meta property="og:description" content="<?php echo $this->_var['description']; ?>" />
<meta property="og:site_name" content="KaBeiLu Hair" />
<meta property="og:url" content="<?php echo $this->_var['get_url']; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/master-art.css" rel="stylesheet">

<link rel="stylesheet" id="switcher-css" type="text/css" href="/plugins/switcher/css/switcher.css" media="all" />
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
<section id="pageTitleBox" class="paralax breadcrumb-container"  style="background-image: url('/images/contact-heading-bg.jpg');">
<!-- <div class="overlay"></div> -->
<div class="container relative">
<h1 class="title font-additional font-weight-normal color-main text-uppercase wow zoomIn" data-wow-delay="0.3s" style="color:#333333">404</h1>
</div>
</section>


<section id="contact-us">
<div class="container" style=" padding-bottom:100px; padding-top:100px;text-align:center">
<div class="row" style="line-height:22px">
<div class="error-page">
<div class="container">
<div><font style="font-size:36px"><strong>4<span id="animate-arrow">0</span>4 </strong></font> <br />
<b>Oops... Page Not Found!</b> <br />
<br />
<br />
<a href="javascript:;" onClick="javascript:history.back(-1);" class="button-back"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; Go
to Back</a> </div>

</div>
</div>
</div>
</div>
</section>
<?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
</body>
</html>
