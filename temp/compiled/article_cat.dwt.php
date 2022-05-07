<!DOCTYPE html>
<html lang="en">
<head>
<meta name="Generator" content="KaBeiLu v2" />
<meta charset="utf-8">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="/css/master.css" rel="stylesheet">
<link href="/css/header.css" rel="stylesheet">

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
   <h2 class="title color-main text-capitalize zoomIn" style="color:#333333">KBL Article</h2>
  </div>
 </section>
 
 
 <section id="contact-us">
  <div class="container">
   <div class="row"> <?php echo $this->fetch('library/ur_here.lbi'); ?>
    <div class="box" style="line-height:22px">
     <div class="box_1">
      <div class="boxCenterList">
        <ul class="blog-posts">
       <?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
        <li class="post-item col-lg-18 blogdiv">
         <article class="entry">
          <div class="row">
           <div class="col-sm-12 blogli">
            <h3 class="entry-title"><a href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" target="_blank"><?php echo $this->_var['article']['short_title']; ?></a></h3>
            <div class="blogdiv2">
             <div class="entry-excerpt blogimg2" style="word-wrap:break-word; word-break:normal; width:100%"><?php echo sub_str($this->_var['article']['content'],500); ?> <br>
              <a href="<?php echo $this->_var['article']['url']; ?>" class="button" target="_blank">Read more <i class="fa fa-angle-double-right"></i></a></div>
            </div>
           </div>
          </div>
         </article>
        </li>   
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       </ul>
      </div>
     </div>
    </div>
    <div class="blank5"></div>
    <?php echo $this->fetch('library/pages.lbi'); ?> </div>
  </div>
 </section>
 <?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
</body>
</html>
