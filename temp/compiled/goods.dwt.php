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
<link href="/css/master-product.css" rel="stylesheet">
<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
<link rel="canonical" href="https://www.kabeilu.com/<?php echo $this->_var['get_url']; ?>" />
<?php echo $this->smarty_insert_scripts(array('files'=>'good_common.js')); ?>
<script type="text/javascript">

function $id(element) {
  return document.getElementById(element);
}

function reg(str){
  var bt=$id(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++){
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function(){
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"":"h2bg");
      }
    }
  }
  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}
function changeAtt(t) {
t.lastChild.checked='checked';
for (var i = 0; i<t.parentNode.childNodes.length;i++) {
        if (t.parentNode.childNodes[i].className == 'cattsel') {
            t.parentNode.childNodes[i].className = '';
        }
    }
t.className = "cattsel";
changePrice();
}
</script>
</head>
<body class="animated-css" data-scrolling-animations="false">
<div class="sp-body">
 
 <div id="loader">
  <div class="loader"></div>
 </div>
 
 <?php echo $this->fetch('library/page_header.lbi'); ?>
 <section id="productDetails" class="product-details">
  <div class="container">
  <div class="row">
   <div class="ycmobile"> <?php echo $this->fetch('library/ur_here.lbi'); ?> </div>
   <div class="row">
    <div class="product-gallery col-lg-4 col-md-4 col-xs-12 clearfix sjdivgood">
     <ul class="bxslider" data-slide-margin="0" data-min-slides="1" data-move-slides="1" data-pager="true" data-pager-custom="#bx-pager" data-controls="false">
      <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['pictures'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pictures']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['pictures']['iteration']++;
?>
      <?php if (($this->_foreach['pictures']['iteration'] - 1) < 3): ?>
      <li><img  src="<?php echo $this->_var['picture']['img_url']; ?>" alt="<?php echo $this->_var['picture']['goods_name']; ?>"  /></li>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </ul>
     <div id="bx-pager" class="product-gallery_preview">
      <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['pictures'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pictures']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['pictures']['iteration']++;
?>
      <?php if (($this->_foreach['pictures']['iteration'] - 1) < 3): ?> <a data-slide-index="<?php echo ($this->_foreach['pictures']['iteration'] - 1); ?>" href="#"><img src="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></a> <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </div>
    </div>
   <div class="sidebar col-lg-3 col-md-3 col-sm-5 col-xs-12 clearfix yc1000"> <?php echo $this->fetch('library/category_tree5.lbi'); ?></div>
<form action="javascript:addcartmin()" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
     <div class="product-cart col-lg-5 col-md-5 col-sm-12 col-xs-12 clearfix sjdivgood">
      <div class="product-options_header clearfix fadeIn">
       <h1 class="font-third text-capitalize"><?php echo $this->_var['goods']['goods_style_name']; ?></h1>
       <div class="itcode">Item Code: KBL-889<?php echo $this->_var['goods']['goods_id']; ?>
        <?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber']): ?>
        <?php if ($this->_var['goods']['goods_number'] == 0): ?>
        <font color="#FF0000">(<?php echo $this->_var['lang']['stock_up']; ?>)</font>
        <?php else: ?>
        <font color="#000">(<font class="goodcss008">In Stock</font>)</font>
        <?php endif; ?>
        <?php endif; ?>
        <a title="Next Good" class="nextgood" href="<?php echo $this->_var['next_good']['url']; ?>"><i class="fa fa-chevron-right widcss"></i></a> <a title="Prev Good" class="pregood" href="<?php echo $this->_var['prev_good']['url']; ?>"><i class="fa fa-chevron-left widcss"></i></a></div>
 
 <div class="product-item_price customColor font-third" id="price0089">
<?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
<div><img src="/images/promo.png" style="float:left"> <font id="ECS_GOODS_AMOUNT" class="shopprice" style="color:#FF0000; font-size:30px; margin-top:18px; margin-left:10px; float:left">$<?php echo $this->_var['goods']['shop_price']; ?></font><img src="/images/timg.gif" style="float:left; margin-left:10px; height:20px; width:20px"></div>
<?php else: ?>

<?php if ($this->_var['goods']['min_number'] >= 2): ?>
<font id="ECS_GOODS_AMOUNT" class="shopprice" style="color:#000">$<?php echo $this->_var['goods']['shop_price']; ?></font><font id="pcsid" style="font-size:15px; color:#666666"> - At least 10pcs</font>
<?php else: ?>
<font id="ECS_GOODS_AMOUNT" class="shopprice" style="color:#FF0000">$<?php echo $this->_var['goods']['shop_price']; ?></font>
<?php endif; ?>

<?php endif; ?></div>


       
      </div>
      <div class="product-options_body clearfix fadeIn">
       <h4 class="font-weight-bold text-capitalize">Product Description</h4>
       <div class="product-options_desc font-main color-third"> <?php echo $this->_var['goods']['goods_brief']; ?> </div>
      </div>
      <div class="product-options_cart clearfix fadeIn post">
       <div class="post">
        <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
        <div class="catt011">
         <DIV class="cattname"><?php echo $this->_var['spec']['name']; ?>:</DIV>
         <DIV class="cattname2">
          <DIV class=catt>
  <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
<a <?php if ($this->_var['key'] == 0): ?>class="cattsel"<?php endif; ?> onclick="changeAtt(this);ycold()" href="javascript:;" name="<?php echo $this->_var['value']['id']; ?>" title="[<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>]" style="<?php if ($this->_var['value']['limi'] == 1): ?>opacity: 0.3<?php endif; ?>"><?php echo str_replace("Mix","",$this->_var['value']['label']); ?><input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> /></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" /> </DIV>
 </DIV>
 </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
       </div>
       <div class="select pull-right"> </div>
       <div class="product-options_row"> <a  href="javascript:" class="btn button-additional button-big text-capitalize hvr-bounce-to-right before-bg"> <span class="icon-basket" aria-hidden="true"></span><i class="fa fa-shopping-cart"></i>  </a>
        <div class="product-counter">
         <script language="javascript" type="text/javascript">  function goods_cut(){var num_val=document.getElementById('number');  var new_num=num_val.value;  var Num = parseInt(new_num);  if(Num>1)Num=Num-1;  num_val.value=Num;}  function goods_add(){var num_val=document.getElementById('number');  var new_num=num_val.value;  var Num = parseInt(new_num);  Num=Num+1;  num_val.value=Num;} </script>
         <input class="font-main font-weight-normal" type="text" name="number" id="number"  onblur="changePrice();ycold()" value="1">
         <div onclick="goods_add();changePrice();ycold()" class="productCounter addQuantity font-main hover-focus-color" >+</div>
         <div  onclick="goods_cut();changePrice();ycold()" class="productCounter minusQuantity font-main hover-focus-color">-</div>
        </div>
       </div>
       <div class="product-options_row"></div>
      </div>
  <script>
	  u=location.href;t=document.title;
	 function fbs_click() {
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
      <div class="product-options_footer clearfix fadeIn" id="tabs-review">
       <div class="product-options_row">
        <h4 class="font-weight-bold text-capitalize">Share this product</h4>
        <ul class="social-list">
         <li><a rel="nofollow" href="#" onclick="return fbs_click()" class="hover-focus-border hover-focus-bg hvr-rectangle-out before-bg"><span class="social_facebook" aria-hidden="true"></span></a></li>
        <li><a rel="nofollow" href="javascript: void(window.open('https://twitter.com/share?url='.concat(encodeURIComponent(location.href)), '', 'menubar=no,toolbar= no,resizable=yes,scrollbars=yes,height=600,width=600'));" title="Click to share this post on Twitter" class="hover-focus-border hover-focus-bg hvr-rectangle-out before-bg"><span class="social_twitter" aria-hidden="true"></span></a></li>
        <li><a rel="nofollow" href="javascript: void(window.open('https://plus.google.com/share?url='.concat(encodeURIComponent(location.href)), '', 'menubar=no,toolbar= no,resizable=yes,scrollbars=yes,height=600,width=600'));" class="hover-focus-border hover-focus-bg hvr-rectangle-out before-bg"><span class="social_googleplus" aria-hidden="true"></span></a></li>
        <li><a rel="nofollow" href="javascript: void(window.open('https://www.pinterest.com/pin/create/button/?url='.concat(encodeURIComponent(location.href)), '', 'menubar=no,toolbar= no,resizable=yes,scrollbars=yes,height=600,width=600'));" data-pin-do="buttonBookmark"  data-pin-shape="round" data-pin-height="28" class="hover-focus-border hover-focus-bg hvr-rectangle-out before-bg"><span class="social_pinterest" aria-hidden="true"></span></a></li>
        <li><a rel="nofollow" href="javascript: void(window.open('https://www.linkedin.com/cws/share?url='.concat(encodeURIComponent(document.title)) .concat(' ') .concat(encodeURIComponent(location.href))));" class="hover-focus-border hover-focus-bg hvr-rectangle-out before-bg"><span class="social_instagram" aria-hidden="true"></span></a></li>
       </ul>
       </div>
      </div>
     </div>
   </form>
    <div id="tabsPanel" class="col-lg-9 col-md-9 col-sm-12 tabs-container background-container sjdivgood">
     <div class="tabs-panel" role="tabpanel">
      <ul class="nav-tabs fadeIn" role="tablist">
      <li role="presentation" class="active desp"> <a class="hover-focus-border hvr-bounce-to-right before-bg" href="#description" role="tab" data-toggle="tab">Description</a> </li>
      <li role="presentation" class="reviews"> <a class="hover-focus-border hvr-bounce-to-right before-bg"  id="abc" href="#reviews" role="tab" data-toggle="tab">Reviews</a> </li>
      <li role="presentation" class="ship sp-div"> <a class="hover-focus-border hvr-bounce-to-right before-bg" href="#shippment" role="tab" data-toggle="tab">Shippment&Payment</a> </li>
     </ul>
      <div class="tab-content fadeIn">
       <div id="description" class="tab-pane fade in active" role="tabpanel">
        <div class="desimg clearfix" style="font-size:13px;line-height:20px">
<div style="padding-bottom:7px"><font style="font-size:26px">We</font> offer the best factory price for every order placed on our website, so you will be more competitive in price and to earn more money than expected. Also we have a professional team to deal with a perfect production supply chain, from raw material collection, to research and development, production, sales. Therefore we can control the same high quality and reasonable price, which is the important reason why many customers trust us.</div>
<?php 
$k = array (
  'name' => 'youtube2',
  'note' => $this->_var['goods']['seller_note'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
       <div style="margin-top:10px"><?php echo $this->_var['goods']['goods_desc']; ?></div></div>
       </div>
       <div id="shippment" class="tab-pane fade clearfix" role="tabpanel">
        <p style="text-align:center;border-bottom:#ccc 1px dashed; font-size:20px; padding-bottom:10px; padding-top:0px; margin-bottom:10px; font-weight:bold">Shipping Information</p>
<p>Trial/Sample Order and order in stock will be shipped within 24 hours after payment arrive.Customized Order normally need 3-5 days.<br />
Hair will be washed clean before putting in package. Each bundle will be packed in PVC bag, labeled length, then put into DHL shipping bag or carton, depend on the quantity.<br />
Customized package is acceptable. We could provide label, hang-tag, logo design service. </p>


<p style="text-align:center;border-bottom:#ccc 1px dashed; font-size:20px; padding-bottom:10px; padding-top:30px; margin-bottom:10px; font-weight:bold">Payment</p>
<p><font style="font-size:16px; font-weight:bold; color:#000000">1. PayPal</font> <br />
<font style="color:#666666">It include credit card visa, mastercard, american express</font></p>

<p><font style="font-size: 16px; font-weight: bold;color:#000000">2. T/T</font>&nbsp;<font style="font-size: 12px;">(Bank Transfer/Bank wire) Please pay to us dollars</font><br />
<font style="color:#666666">
<strong>Beneficiary Bank:</strong> Bank of China <br />
<strong>Swift Code:</strong> BKCHCNBJ780<br />
<strong>Swift Bank:</strong> ANHUI BRANCH. BANK OF CHINA<br />
<strong>Swift Bank Address:</strong> 313 CHANG JIANG ROAD, HEFEI, ANHUI, CHINA<br />
<strong>Beneficiary:</strong> Taihe County Kangsheng Hair Products Co.,Ltd.<br />
<strong>Account No:</strong> 188721546253<br />
<strong>Beneficiary Address:</strong> 96 JING HU ZHONG ROAD, TAIHE, ANHUI, CHINA</font></p>

<p><font style="font-size:16px; font-weight:bold;color:#000000">3. Western Union</font> <br />
<font style="color:#666666">
<strong>First name:</strong> Yanqun<br />
<strong>Last name:</strong> Cao<br />
<strong>Location:</strong> Room 1401,Long Tou Market No 222, Guang Yuan Xi Lu, Guangzhou,Guangdong, China<br />
<strong>Zip code:</strong> 510000</font></p>
       </div>
       <div id="reviews" class="tab-pane fade" role="tabpanel">
        <div id="ECS_COMMENT">
        
        <div style="margin-bottom:15px">
         <a href="kabeilureviews.php?cid=/kblhair/st/BLUE-ST.mp4"><img src="/images/video-js/kblhair/st/blueband01.png" alt="blue rubber band reviews" style="width:100%"></a>        </div>
        
      
        <div style="margin-bottom:15px">
         <a href="kabeilureviews.php?cid=/kblhair/st/BLUE-ST02.mp4"><img src="/images/video-js/kblhair/st/blueband02.png" alt="blue band hair reviews" width="100%"></a>        </div>
        
        
        
        <div style="margin-bottom:15px">
         <a href="kabeilureviews.php?cid=/kblhair/st/BLUE-LW01.mp4"><img src="/images/video-js/kblhair/st/blueband03.png" alt="blue band hair reviews" width="100%"></a>        </div>
        
        <div style="margin-bottom:15px">
          <a href="kabeilureviews.php?cid=/kblhair/XR/xr5x5.mp4"><img src="/images/video-js/kblhair/XR/xr5x5.png" alt="xr 5X5 reviews" width="100%"></a>        </div>
        
        <div style="margin-bottom:15px">
         <a href="kabeilureviews.php?cid=/kblhair/st/st01.mp4"><img src="/images/video-js/kblhair/st/st01.png" alt="straight reviews" width="100%"></a>        </div>
        </div>
       </div>
      </div>
     </div>
    </div>
  </div>
  </div>
  </div>
 </section>
<div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
     <div id="gridSystemModalLabel" class="modal-title">Online Support</div>
    </div>
    <div class="modal-body">
     
     <form action="message-all.php" method="post" name="formMsg" onSubmit="return submitMsgBoard(this)">
      <section class="col-main col-sm-123" style="padding:0px">
       <div id="contact1" class="page-content page-contact" style="padding:0px">
        <div class="row">
         <div class="col-xs-12 col-sm-6 ycmobile2" id="contact_form_map" style="padding-left:16px;">
          <div class="page-subheading">Let's get in touch</div>
          <br/>
          <ul>
           <li><a href="/wholesale-hair" target="_blank">Wholesale Hair</a></li>
           <li><a href="/article-18-payment-methods.html" target="_blank">Payment Methods</a></li>
           <li><a href="/article-16-return-policy.html" target="_blank">Return Policy</a></li>
          </ul>
          <br/>
          <ul class="store_info">
           <li><i class="fa fa-home"></i>Guangzhou,Guangdong,China</li>
           <li><i class="fa fa-phone"></i><span>(+86) 138 2213 4241</span></li>
           <li><i class="fa fa-fax"></i><span>(+86) 020 262 98437</span></li>
           <li><i class="fa fa-whatsapp"></i><span>(+86) 138 2213 4241</span></li>
           <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:webmaster@kabeilu.com">webmaster@kabeilu.com </a></span></li>
          </ul>
         </div>
         <div class="col-sm-6">
          <div class="page-subheading" style="line-height:19px">Welcome to Contact KBL Hair!<br>
          <font style="font-size:10px; color:#666666">We will reply you quickly.</font>          </div>
          <div class="contact-form-box">
           <div class="form-selector">
            <label>Username</label>
            <?php if ($_SESSION['user_name']): ?>
            <input type="text" class="form-control input-sm" id="msg_title" name="msg_title" value="<?php echo $this->_var['username']; ?>" required>
            <?php else: ?>
            <input type="text" class="form-control input-sm" id="msg_title" name="msg_title"  required >
            <?php endif; ?>
           </div>
           <div class="form-selector">
            <label>Email</label>
            <input type="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" class="form-control input-sm" id="user_email" name="user_email" required >
           </div>
           <div class="form-selector">
            <label>Mobile</label>
            <input type="mobile" value="" class="form-control input-sm" id="user_mobile" name="user_mobile" >
           </div>
           <div class="form-selector">
            <label>Message</label>
            <textarea class="form-control input-sm" name="msg_content" rows="3"  id="msg_content" required></textarea>
            <input type="hidden" name="act" value="act_add_message" />
           </div>
           <div class="form-selector">
            <input type="text" size="8" style="width:100px; float:left" class="form-control input-sm" id="captcha" name="captcha"  placeholder="" >　
            <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /></div>
           <div class="form-selector">
            <input name="msg_type" type="hidden" class="inputBg" size="30" value="2" />
            <input type="text" name="urlgood" value="https://www.kabeilu.com/<?php echo $this->_var['get_url']; ?>" style="display:none !important;" />
            <button type="submit"  name="login" id="xpbtn"  class="btn send-button btn-block hvr-bounce-to-right hover-focus-border before-bg meback"><?php echo $this->_var['lang']['post_message']; ?></button>
           </div>
          </div>
         </div>
        </div>
       </div>
      </section>
     </form>
     <script type="text/javascript">
        <?php $_from = $this->_var['lang']['message_board_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
        /**
         * 提交留言信息
        */
        function submitMsgBoard(frm)
        {
            var msg = new Object;
             msg.user_email  = frm.elements['user_email'].value;
             msg.msg_title   = frm.elements['msg_title'].value;
             msg.msg_content = frm.elements['msg_content'].value;
             msg.captcha     = frm.elements['captcha'] ? frm.elements['captcha'].value : '';

            var msg_err = '';

            if (msg.user_email.length > 0)
            {
               if (!(Utils.isEmail(msg.user_email)))
               {
                  msg_err += msg_error_email + '\n';
                }
             }
             else
             {
                  msg_err += msg_empty_email + '\n';
             }
            if (msg.msg_title.length == 0)
            {
                msg_err += msg_title_empty + '\n';
            }
            if (frm.elements['captcha'] && msg.captcha.length==0)
            {
                msg_err += msg_captcha_empty + '\n'
            }
            if (msg.msg_content.length == 0)
            {
                msg_err += msg_content_empty + '\n'
            }
            if (msg.msg_title.length > 200)
            {
                msg_err += msg_title_limit + '\n';
            }

            if (msg_err.length > 0)
            {
                alert(msg_err);
                return false;
            }
            else
            {
			//alert("123");
			//document.getElementById('xpbtn').setAttribute('disabled', true);
                return true;
            }
        }
        
        </script>
     
    </div>
   </div>
  </div>
</div>
 <?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
<?php echo $this->smarty_insert_scripts(array('files'=>'good_transport.js,good_utils.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json-1.3.js')); ?>
</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  fixpng();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 
 */
 
 function addcartmin()
{
 var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
<?php if ($this->_var['goods']['min_number']): ?>
if(qty < <?php echo $this->_var['goods']['min_number']; ?>)
{
alert('Minimum purchase quantity： <?php echo $this->_var['goods']['min_number']; ?>');
qty = <?php echo $this->_var['goods']['min_number']; ?>;
return false;
}
<?php endif; ?>
addToCart(<?php echo $this->_var['goods']['goods_id']; ?>);
}
 
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
<?php if ($this->_var['goods']['min_number']): ?>
if(qty < <?php echo $this->_var['goods']['min_number']; ?>)
{
//alert('Minimum purchase quantity： <?php echo $this->_var['goods']['min_number']; ?>');
//qty = <?php echo $this->_var['goods']['min_number']; ?>;
}
<?php endif; ?>
  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
  }
}
function ycold()
{
document.getElementById('old-price').style.display  = "none";
}

</script>
</html>