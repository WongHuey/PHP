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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/master-art.css" rel="stylesheet">
<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<style>
.pf{width:100%;}
.float01{position:fixed;top:0px; padding-top:10px;}
.float02{position:relative;top:0px;padding:0px;}
@media screen and (max-width:1200px){
.wyc{visibility:hidden;display:none;}
.wyc01{width:100%;}
}
</style>
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
      <h2 class="title color-main text-capitalize zoomIn" style="color:#333333">YSF Hair</h2>
    </div>
  </section>
  <section id="contact-us">
    <div class="container">
      <div class="row">
        <div class=""> <?php echo $this->fetch('library/ur_here.lbi'); ?>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 wyc01">
            <div style="line-height:22px"><?php echo $this->_var['article']['content']; ?></div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 clearfix wyc" style="padding-left:24px; height:100%;">
            <div class="pf" style=" height:auto; min-height:300px;width:100%; max-width:324px; min-width:30px;">
              <div class="sidebar-title text-capitalize"><font class="cat009" style="font-weight:bold">Wholesale Best Sellers</font></div>
              <ul class="sidebar-popular-product fadeIn">
                <li> <a class="popular-product-item" href="/goods-31-high-quality-blue-band-hair-loose-wave-brazilian-hair-extension.html"> <img src="themes/web3/images/products/latest-1.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">High-Quality Blue Band Hair Loose Wave Brazilian Hair Extension</span> <span class="popular-product-item_price font-third">$27.90</span> </a> </li>
                <li> <a class="popular-product-item" href="/goods-34-best-brazilian-blue-rubber-band-hair-deep-wave-extensions.html"> <img src="themes/web3/images/products/latest-2.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">Best Brazilian Blue Rubber Band Hair Deep Wave Extensions</span> <span class="popular-product-item_price  font-third">$27.90</span> </a> </li>
                <li> <a class="popular-product-item" href="/goods-37-soft-and-silk-100%25-virgin-brazilian-human-hair-body-wave-hair-extensions.html"> <img src="themes/web3/images/products/latest-3.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">Soft And Silk 100% Virgin Brazilian Human Hair Body Wave Hair Extensions</span><span class="popular-product-item_price font-third">$43.50</span></a> </li>
                
                
                 <li> <a class="popular-product-item" href="/goods-40-wholesale-supplier-brazilian-silky-straight-hair-weaving.html"> <img src="themes/web3/images/products/latest-5.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">Wholesale Supplier Brazilian Silky Straight Hair Weaving</span><span class="popular-product-item_price font-third">$27.90</span></a> </li>
                 
                 
                <li> <a class="popular-product-item" href="/goods-140-factory-price-613%23-straight-hair-blonde-color-100%25-human-hair.html"> <img src="themes/web3/images/products/latest-6.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">Factory Price 613# Straight Hair Blonde Color 100% Human Hair</span><span class="popular-product-item_price font-third">$47.30</span></a> </li>              
                
              </ul>
            </div>

<script type="text/javascript">
function getScrollTop(){
　　var scrollTop = 0, bodyScrollTop = 0, documentScrollTop = 0;
　　if(document.body){
　　　　bodyScrollTop = document.body.scrollTop;
　　}
　　if(document.documentElement){
　　　　documentScrollTop = document.documentElement.scrollTop;
　　}
　　scrollTop = (bodyScrollTop - documentScrollTop > 0) ? bodyScrollTop : documentScrollTop;
　　return scrollTop;
}
function getScrollHeight(){
　　var scrollHeight = 0, bodyScrollHeight = 0, documentScrollHeight = 0;
　　if(document.body){
　　　　bodyScrollHeight = document.body.scrollHeight;
　　}
　　if(document.documentElement){
　　　　documentScrollHeight = document.documentElement.scrollHeight;
　　}
　　scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
　　return scrollHeight;
}
function getWindowHeight(){
　　var windowHeight = 0;
　　if(document.compatMode == "CSS1Compat"){
　　　　windowHeight = document.documentElement.clientHeight;
　　}else{
　　　　windowHeight = document.body.clientHeight;
　　}
　　return windowHeight;
}
window.onscroll = function(){



　if(document.body.scrollHeight < 1500  ){
　　　$(".pf").addClass('float02');
　}

if ($(document).scrollTop() > 320)
{
//$("#pf_nav").show();
$(".pf").addClass('float01');
}else{
//$("#pf_nav").hide();
$(".pf").removeClass('float01');
}


　　if(getScrollTop() + getWindowHeight()+300 >  getScrollHeight()){
　　　$(".pf").removeClass('float01');

　　}




};
</script>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
</body>
</html>
