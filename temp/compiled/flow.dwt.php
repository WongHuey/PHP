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
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,shopping_flow.js')); ?>
</head>
<body class="animated-css" data-scrolling-animations="false">
<div class="sp-body"> <?php echo $this->fetch('library/page_header.lbi'); ?>
 <section id="pageTitleBox" class="paralax breadcrumb-container"  style="background-image: url('images/contact-heading-bg.jpg');">
  <!-- <div class="overlay"></div> -->
  <div class="container relative">
   <h2 class="title color-main text-capitalize zoomIn" style="color:#333333">Shopping flow</h2>
  </div>
</section>
   <section id="contact-us">
    <div class="container">
     
    <div class="row">
     <?php echo $this->fetch('library/ur_here.lbi'); ?>
      <?php if ($this->_var['step'] == "cart"): ?>
      
      <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?>
    <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>
    <div class="">
       <form id="formCart" name="formCart" method="post" action="flow.php">
       <table width="100%" align="center" border="0" cellpadding="1" cellspacing="1" bgcolor="#dddddd">
         <tr style="color:">
          <td height="28" bgcolor="#E6F2FF"><span style="color:#000;">Name of commodity</span>
           </th>
           <?php if ($this->_var['show_goods_attribute'] == 1): ?>
           <?php endif; ?>
           <?php if ($this->_var['show_marketprice']): ?>
           <?php endif; ?>
         <span style="color:#000;">Subtotal</span>
           </th>
         <td width="10%" align="center" bgcolor="#E6F2FF"></th></tr>
         <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
         <tr>
          <td height="109" align="left" class="xianflow">
         
         <div style="position:relative;">
         <div class="flow-car-01"><?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
           <?php if ($this->_var['show_goods_thumb'] == 1): ?>
           <?php else: ?>
           <a rel="nofollow" href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" style="float:left; margin-right:10px" target="_blank" id="flowone"><img width="80px" height="80px" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a>
           <?php endif; ?>
           <?php else: ?>
           <?php endif; ?>
         </div>
         <div style="float:left; line-height:18px">
         <a rel="nofollow" style="text-align:left; float:left; font-size:13px; margin-bottom:5px" href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class=""><?php echo $this->_var['goods']['goods_name']; ?></a><br>
           <font style="float:left; font-size:12px; color:#999999; line-height:25px"><?php echo nl2br($this->_var['goods']['goods_attr']); ?>
           <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
           <font style="color:#FF0000">Number:</font>
           <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="4" class="inputBg" style="text-align:center; width:30px " onkeydown="showdiv(this)"/> 　Price: <font color="#FF0000" style="font-size:12px"><?php echo $this->_var['goods']['subtotal']; ?></font>           </font>
           <?php else: ?>
           <?php endif; ?>
         </div>
         </div></td>
         <td align="center" class="xianflow"><a rel="nofollow" href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="f6"><span aria-hidden="true" style="font-size:26px">×</span></a> </td>
       </tr>
        
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         
          <tr><td height="39" colspan="2" align="left">
         <input name="submit" type="submit" class="mhbotton" value="Update" />
           <input type="button" value="Clear" class="mhbotton" onclick="location.href='flow.php?step=clear'" />
           
            <span style="float:right; color: #000000; font-size:16px;" class="font-third"><?php echo $this->_var['shopping_money']; ?></span>
<input type="hidden" name="step" value="update_cart" />
</td>
</tr>
       </table>

<a rel="nofollow" href="flow.php?step=checkout" class="btn send-button btn-block hvr-bounce-to-right hover-focus-border before-bg meback" style="float:right; margin-top:10px; width:150px" >Checkout</a>
       </form>
       
       <?php if ($_SESSION['user_id'] > 0): ?>
       <?php echo $this->smarty_insert_scripts(array('files'=>'good_transport.js')); ?>
    <script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + $.toJSON(goods), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script>
    </div>
      <div class="blank"></div>
      <?php endif; ?>
      <?php endif; ?>
      <?php if ($this->_var['fittings_list']): ?>
      <?php echo $this->smarty_insert_scripts(array('files'=>'transport3.js')); ?>
    <script type="text/javascript" charset="utf-8">
  function fittings_to_flow(goodsId,parentId)
  {
    var goods        = new Object();
    var spec_arr     = new Array();
    var number       = 1;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = parentId;
    Ajax.call('flow.php?step=add_to_cart', 'goods=' + $.toJSON(goods), fittings_to_flow_response, 'POST', 'JSON');
  }
  function fittings_to_flow_response(result)
  {
    if (result.error > 0)
    {
      // 如果需要缺货登记，跳转
      if (result.error == 2)
      {
        if (confirm(result.message))
        {
          location.href = 'user.php?act=add_booking&id=' + result.goods_id;
        }
      }
      else if (result.error == 6)
      {
        openSpeDiv(result.message, result.goods_id, result.parent);
      }
      else
      {
        alert(result.message);
      }
    }
    else
    {
      location.href = 'flow.php';
    }
  }
  </script>
      <div class="block" ></div>
      <?php endif; ?>
      <?php if ($this->_var['favourable_list']): ?>
      <?php endif; ?>
      <?php if ($this->_var['step'] == "consignee"): ?>
      
      <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
    <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
      
      <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
      <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
      <?php echo $this->fetch('library/consignee.lbi'); ?>
      </form>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>
      <?php if ($this->_var['step'] == "checkout"): ?>
      <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
      <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
        </script>
       <div class="flowBox">
        <h6 style="background-color:#E6F2FF; height:34px; line-height:28px;padding-left:5px"><span style="color:#000; font-size:18px"><span><i class="fa fa-caret-right"></i> <?php echo $this->_var['lang']['goods_list']; ?></span>　
  <?php if ($this->_var['allow_edit_cart']): ?>
         <a rel="nofollow" style="vertical-align:super; font-size:9px;
margin:10px 0px 0px 0px" href="flow.php" class="f6"><u><?php echo $this->_var['lang']['modify']; ?></u></a>
         <?php endif; ?>
         </span></h6>
        <table width="100%" align="center" border="0" cellpadding="1" cellspacing="1" bgcolor="#666666" style="line-height:16px">
<tr>
          <th width="70%" bgcolor="#EEEEEE"><font style="font-size:12px"><?php echo $this->_var['lang']['goods_name']; ?></font></th>
<?php if ($this->_var['show_marketprice']): ?>
          <?php endif; ?>
          <th width="15%" align="center" bgcolor="#EEEEEE" style="text-align:center" ><font style="font-size:12px">Price</font></th>
<th width="15%" align="center" bgcolor="#EEEEEE" style="text-align:center"><font style="font-size:12px"><?php echo $this->_var['lang']['subtotal']; ?></font></th>
        </tr>
         <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
         <tr>
          <td class="xianflow"><?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
           <a rel="nofollow" href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6" style="font-size:12px"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
        <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
            <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
            <a rel="nofollow" href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6" style="font-size:12px"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
           <?php else: ?>
           <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6" style="font-size:12px"><?php echo $this->_var['goods']['goods_name']; ?></a>
           <?php if ($this->_var['goods']['parent_id'] > 0): ?>
           <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
           <?php elseif ($this->_var['goods']['is_gift']): ?>
           <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
           <?php endif; ?>
           <?php endif; ?>
           <?php if ($this->_var['goods']['is_shipping']): ?>
           (<span style="color:#FF0000"><?php echo $this->_var['lang']['free_goods']; ?></span>)
           <?php endif; ?>
          <br>
           <font style="float:left; font-size:10px; color:#999999; line-height:14px"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></font></td>
        <?php if ($this->_var['show_marketprice']): ?>
          <?php endif; ?>
          <td style="text-align:center" class="xianflow"><font style="font-size:12px"><?php echo $this->_var['goods']['formated_goods_price']; ?>*<?php echo $this->_var['goods']['goods_number']; ?></font></td>
         <td style="text-align:center" class="xianflow"><font style="font-size:12px"><?php echo $this->_var['goods']['formated_subtotal']; ?></font></td>
        </tr>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         <?php if (! $this->_var['gb_deposit']): ?>
         <tr>
          <td height="48" colspan="4" valign="middle" style="font-size:16px; font-weight: bold"><?php if ($this->_var['discount'] > 0): ?>
         <?php echo $this->_var['your_discount']; ?><br />
           <?php endif; ?>
           <?php echo $this->_var['shopping_money']; ?></td>
        </tr>
         <?php endif; ?>
        </table>
  <br />
        <h6 style="background-color:#E6F2FF; height:34px; line-height:28px;padding-left:5px"><span style="color:#000; font-size:18px"><i class="fa fa-caret-right"></i> <?php echo $this->_var['lang']['consignee_info']; ?>　<a rel="nofollow" style="vertical-align:super; font-size:9px;
margin:10px 0px 0px 0px" href="flow.php?step=consignee" class="f6"><u><?php echo $this->_var['lang']['modify']; ?></u></a></span></h6>
        <table width="100%" align="center" border="0" cellspacing="1" style="font-size:12px; padding:0px; margin-top:10px">
  <tr>
          <td height="25"><strong><?php echo $this->_var['lang']['consignee_name']; ?>:</strong> <?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></td>
        </tr>
         <tr>
          <td height="25"><strong><?php echo $this->_var['lang']['email_address']; ?>:</strong> <?php echo htmlspecialchars($this->_var['consignee']['email']); ?></td>
        </tr>
         
                  <tr>
          <td height="25" colspan="3"><strong><?php echo $this->_var['lang']['phone']; ?>/Mobile:</strong> <?php echo $this->_var['consignee']['tel']; ?> <font color="#999999"></font></td>
        </tr>
         <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
         <tr>
          <td height="25" ><strong><?php echo $this->_var['lang']['detailed_address']; ?>:</strong> <?php echo htmlspecialchars($this->_var['consignee']['address']); ?>,<?php echo htmlspecialchars($this->_var['consignee']['city']); ?>, <?php echo htmlspecialchars($this->_var['consignee']['province']); ?>, <?php echo $this->_var['country']['region_name']; ?> </td>
        </tr>
         <tr>
          <td height="25"><strong><?php echo $this->_var['lang']['postalcode']; ?>:</strong> <?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?></td>
        </tr>
         <?php endif; ?>

         <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
         <tr>
          <td height="25" ><strong><?php echo $this->_var['lang']['sign_building']; ?>:</strong> <?php echo htmlspecialchars($this->_var['consignee']['sign_building']); ?> </td>
        </tr>
         <tr>
          <td height="25"><strong><?php echo $this->_var['lang']['deliver_goods_time']; ?>:</strong> <?php echo htmlspecialchars($this->_var['consignee']['best_time']); ?></td>
        </tr>
         <?php endif; ?>
        </table>
<input name = "shstate" type="hidden" value = "<?php echo htmlspecialchars($this->_var['consignee']['province']); ?>" />
     <input name = "shcity" type="hidden" value = "<?php echo htmlspecialchars($this->_var['consignee']['city']); ?>" />
     <input name = "shcountry" type="hidden" value = "<?php echo $this->_var['country']['region_name']; ?>" /> 
     <input name = "shaddress" type="hidden" value = "<?php echo htmlspecialchars($this->_var['consignee']['address']); ?>" /> 
     <input name = "shzip" type="hidden" value = "<?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?>" /> 
     <input name = "shname" type="hidden" value = "<?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?>" /> 
     <input name = "shmail" type="hidden" value = "<?php echo htmlspecialchars($this->_var['consignee']['email']); ?>" />    
        
        
<?php if ($this->_var['total']['real_goods_count'] != 0): ?>
        <br />
        <h6 style="background-color:#E6F2FF; height:34px; line-height:30px;padding-left:5px"><span style="color:#000; font-size:18px"><i class="fa fa-caret-right"></i> <?php echo $this->_var['lang']['shipping_method']; ?></span></h6>
        <table width="100%" align="center" border="0" cellpadding="1" cellspacing="1" bgcolor="#F5F5F5"  style="font-size:12px; padding:0px">

         <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
         <tr>
          <td width="6%" height="64" valign="middle">
<input name="shipping" id="radio-1-1" class="regular-radio big-radio" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" />
           <label for="radio-1-1"></label>           </td>
          <td width="94%" valign="middle"><strong><?php echo $this->_var['shipping']['shipping_name']; ?></strong> <font color="#999999">(<?php echo $this->_var['shipping']['shipping_desc']; ?>)</font></td>
        </tr>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
  <?php else: ?>
        <input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>
        <br>
        <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>
        <h6 style="background-color:#E6F2FF; height:34px; line-height:30px">　<span style="color:#000;font-size:18px"><i class="fa fa-caret-right"></i> <?php echo $this->_var['lang']['payment_method']; ?></span></h6>
        <table width="100%" align="center" border="0" cellpadding="1" cellspacing="1" bgcolor="#F5F5F5"  style="font-size:12px; padding:0px">
         <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
         
         <tr>
          <td  width="6%" valign="middle" height="64"  headers="41"><input type="radio" id="radio-2-1" class="regular-radio big-radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/>
         <label for="radio-2-1"></label>          </td>
         <td width="94%" valign="middle" bgcolor=""><strong><?php echo $this->_var['payment']['pay_name']; ?></strong> <font color="#999999">(<?php echo $this->_var['payment']['pay_desc']; ?>)</font></td>
         </tr>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
        <?php else: ?>
        <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>
        <?php if ($this->_var['pack_list']): ?>
        <h6><span><?php echo $this->_var['lang']['goods_package']; ?></span></h6>
        <table width="100%" align="center" border="0" cellpadding="1" cellspacing="1" bgcolor="#F5F5F5"  style="font-size:11px; padding:4px">
         <tr>
          <th width="5%" scope="col" >&nbsp;</th>
          <th width="35%" scope="col" ><?php echo $this->_var['lang']['name']; ?></th>
          <th width="22%" scope="col" ><?php echo $this->_var['lang']['price']; ?></th>
          <th width="22%" scope="col"><?php echo $this->_var['lang']['free_money']; ?></th>
          <th scope="col"><?php echo $this->_var['lang']['img']; ?></th>
         </tr>
         <tr>
          <td valign="top" bgcolor="#ffffff"><input type="radio" name="pack" value="0" <?php if ($this->_var['order']['pack_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" /></td>
          <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['no_pack']; ?></strong></td>
          <td valign="top" bgcolor="#ffffff">&nbsp;</td>
          <td valign="top" bgcolor="#ffffff">&nbsp;</td>
          <td valign="top" bgcolor="#ffffff">&nbsp;</td>
         </tr>
         <?php $_from = $this->_var['pack_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pack');if (count($_from)):
    foreach ($_from AS $this->_var['pack']):
?>
         <tr>
          <td valign="top" bgcolor="#ffffff"><input type="radio" name="pack" value="<?php echo $this->_var['pack']['pack_id']; ?>" <?php if ($this->_var['order']['pack_id'] == $this->_var['pack']['pack_id']): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" />          </td>
          <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['pack']['pack_name']; ?></strong></td>
          <td valign="top" bgcolor="#ffffff" align="right"><?php echo $this->_var['pack']['format_pack_fee']; ?></td>
          <td valign="top" bgcolor="#ffffff" align="right"><?php echo $this->_var['pack']['format_free_money']; ?></td>
          <td valign="top" bgcolor="#ffffff" align="center"><?php if ($this->_var['pack']['pack_img']): ?>
           <a rel="nofollow" href="data/packimg/<?php echo $this->_var['pack']['pack_img']; ?>" target="_blank" class="f6"><?php echo $this->_var['lang']['view']; ?></a>
           <?php else: ?>
           <?php echo $this->_var['lang']['no']; ?>
           <?php endif; ?>          </td>
         </tr>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
        <?php endif; ?>
        <?php if ($this->_var['card_list']): ?>
        <h6 style="background-color:#E6F2FF; height:34px; line-height:30px;padding-left:5px"><span style="color:#000;font-size:18px"><?php echo $this->_var['lang']['goods_card']; ?></span></h6>
        <table width="100%" align="center" border="0" cellpadding="1" cellspacing="1" bgcolor="#F5F5F5" style="font-size:11px; padding:4px">
         <tr>
          <th width="5%" scope="col">&nbsp;</th>
          <th width="35%" scope="col"><?php echo $this->_var['lang']['name']; ?></th>
          <th width="22%" scope="col"><?php echo $this->_var['lang']['price']; ?></th>
          <th width="22%" scope="col"><?php echo $this->_var['lang']['free_money']; ?></th>
          <th scope="col"><?php echo $this->_var['lang']['img']; ?></th>
         </tr>
         <tr>
          <td bgcolor="#ffffff" valign="top"><input type="radio" name="card" value="0" <?php if ($this->_var['order']['card_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectCard(this)" /></td>
          <td bgcolor="#ffffff" valign="top"><strong><?php echo $this->_var['lang']['no_card']; ?></strong></td>
          <td bgcolor="#ffffff" valign="top">&nbsp;</td>
          <td bgcolor="#ffffff" valign="top">&nbsp;</td>
          <td bgcolor="#ffffff" valign="top">&nbsp;</td>
         </tr>
         <?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
         <tr>
          <td valign="top" bgcolor="#ffffff"><input type="radio" name="card" value="<?php echo $this->_var['card']['card_id']; ?>" <?php if ($this->_var['order']['card_id'] == $this->_var['card']['card_id']): ?>checked="true"<?php endif; ?> onclick="selectCard(this)"  />          </td>
          <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['card']['card_name']; ?></strong></td>
          <td valign="top" align="right" bgcolor="#ffffff"><?php echo $this->_var['card']['format_card_fee']; ?></td>
          <td valign="top" align="right" bgcolor="#ffffff"><?php echo $this->_var['card']['format_free_money']; ?></td>
          <td valign="top" align="center" bgcolor="#ffffff"><?php if ($this->_var['card']['card_img']): ?>
           <a rel="nofollow" href="data/cardimg/<?php echo $this->_var['card']['card_img']; ?>" target="_blank" class="f6"><?php echo $this->_var['lang']['view']; ?></a>
           <?php else: ?>
           <?php echo $this->_var['lang']['no']; ?>
           <?php endif; ?>          </td>
         </tr>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         <tr>
          <td bgcolor="#ffffff"></td>
          <td bgcolor="#ffffff" valign="top"><strong><?php echo $this->_var['lang']['bless_note']; ?>:</strong></td>
          <td bgcolor="#ffffff" colspan="3"><textarea name="card_message" cols="60" rows="3" style="width:auto; border:1px solid #ccc;"><?php echo htmlspecialchars($this->_var['order']['card_message']); ?></textarea></td>
         </tr>
        </table>
        <?php endif; ?>
        <br />
        <h6 style="background-color:#E6F2FF; height:34px; line-height:30px;padding-left:5px"><span style="color:#000;font-size:18px"><i class="fa fa-caret-right"></i> <?php echo $this->_var['lang']['other_info']; ?></span></h6>
        <table width="100%" align="center" border="0" cellpadding="1" cellspacing="1" bgcolor="#F5F5F5" style="font-size:12px; padding:0px">



         <?php if ($this->_var['inv_content_list']): ?>
         <tr>
          <td><strong><?php echo $this->_var['lang']['invoice']; ?>:</strong>
           <input name="need_inv" type="checkbox"  class="input" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" <?php if ($this->_var['order']['need_inv']): ?>checked="true"<?php endif; ?> />          </td>
          <td bgcolor="#ffffff"><?php if ($this->_var['inv_type_list']): ?>
           <?php echo $this->_var['lang']['invoice_type']; ?>
           <select name="inv_type" id="ECS_INVTYPE" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?> onchange="changeNeedInv()" style="border:1px solid #ccc;">
            
                <?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?>
           </select>
           <?php endif; ?>
           <?php echo $this->_var['lang']['invoice_title']; ?>
           <input name="inv_payee" type="text"  class="input" id="ECS_INVPAYEE" size="20" <?php if (! $this->_var['order']['need_inv']): ?>disabled="true"<?php endif; ?> value="<?php echo $this->_var['order']['inv_payee']; ?>" onblur="changeNeedInv()" />
           <?php echo $this->_var['lang']['invoice_content']; ?>
           <select name="inv_content" id="ECS_INVCONTENT" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?>  onchange="changeNeedInv()" style="border:1px solid #ccc;">
            

                <?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>

                
           </select></td>
         </tr>
         <?php endif; ?>
         <tr>
          <td colspan="2" valign="top"><br>
<strong>Please leave a message:</strong><br>
<br>
<textarea style="width:100%; height:100px; padding:5px 5px; font-size:14px;border:1px solid #ccc;" name="postscript" cols="80" rows="3" id="postscript" ><?php echo htmlspecialchars($this->_var['order']['postscript']); ?></textarea></td>
        </tr>
        </table>
       <h6 style="background-color:#E6F2FF; height:34px; line-height:30px;padding-left:5px"><span style="color:#000;font-size:18px"><i class="fa fa-caret-right"></i> <?php echo $this->_var['lang']['fee_total']; ?></span></h6>
       <?php echo $this->fetch('library/order_total.lbi'); ?>
        <div align="center" style=" padding:10px;">
         
         <a data-target=".bs-example-modal-lg12" data-toggle="modal">
         <img src="themes/web3/images/bnt_subOrder.gif" style="cursor:pointer" title="Click To Buy Now" /></a>
         <input type="hidden" name="step" value="done" />
        </div>
       </div>
       
<div class="modal fade bs-example-modal-lg12" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header"><button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&times;</span></button>
<div id="gridSystemModalLabel" class="modal-title">Attention</div>
</div>
<div class="modal-body" style="line-height:22px; font-size:12px; color:#666666">
<b>Please follow blow tips when Web page jump to the Paypal payment page.</b><P></P>
Kindly check your delivery address, we will ship the goods according to this delivery address:<P></P>
<b>Name:</b> <?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?><br>
<b>Address:</b> <?php echo htmlspecialchars($this->_var['consignee']['address']); ?>, <?php echo htmlspecialchars($this->_var['consignee']['city']); ?>, <?php echo htmlspecialchars($this->_var['consignee']['province']); ?>, <?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?>, <?php echo $this->_var['country']['region_name']; ?>
<P></P>
<font color="#FF0000">To Avoid your payment risk, please make sure your delivery address same with the PayPal billing address, Please noted!</font>
<br>
<br>
<p style="text-align:center">
<button type="submit"  name="login"  class="btn send-button btn-block hvr-bounce-to-right hover-focus-border before-bg meback" style="width:150px" title="Click To Buy Now">Buy Now</button>
</p></div>
</div>
</div>
</div>
      </form>
      <?php endif; ?>
      <?php if ($this->_var['step'] == "done"): ?>
      
      <div class="flowBox" style="margin:30px auto 70px auto;">
       <h6 style="text-align:center; height:30px; line-height:30px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></h6>
       <table width="99%" align="center" border="0" cellpadding="15" cellspacing="0" bgcolor="#fff" style="border:1px solid #ddd; margin:20px auto;" >
        <tr>
         <td align="center" bgcolor="#FFFFFF"></td>
        </tr>
        <tr>
         <td height="42" align="center" bgcolor="#FFFFFF" style="font-size:18px; font-weight:bold; color:#FF0000">Connecting to PayPal...</td>
        </tr>
        <?php if ($this->_var['pay_online']): ?>
        
        <tr>
         <td align="center" bgcolor="#FFFFFF"><?php echo $this->_var['pay_online']; ?></td>
        </tr>
        <?php endif; ?>
       </table>
       <?php if ($this->_var['virtual_card']): ?>
       <div style="text-align:center;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
        <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
        <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
        <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
        <ul style="list-style:none;padding:0;margin:0;clear:both">
         <?php if ($this->_var['card']['card_sn']): ?>
         <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span> </li>
         <?php endif; ?>
         <?php if ($this->_var['card']['card_password']): ?>
         <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span> </li>
         <?php endif; ?>
         <?php if ($this->_var['card']['end_date']): ?>
         <li style="float:left;"> <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?> </li>
         <?php endif; ?>
        </ul>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       </div>
       <?php endif; ?>
       <p style="text-align:center; margin-bottom:20px;"><?php echo $this->_var['order_submit_back']; ?></p>
      </div>
    <script language="javascript">



var js_var = "<?php echo $this->_var['total']['amount']; ?>";


		if(parseInt(String(js_var))>3000000)
		{
		
		window.location="/article-18-Payment+Methods.html";
		}
		else
		{
		
		payform.submit();
		}

		</script>
      <?php endif; ?>
      <?php if ($this->_var['step'] == "login"): ?>
      <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,user.js')); ?>
    <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        
        </script>
      
      <div class="flowBox ">
       <div id="login3">
        <h6 style="background-color:#E6F2FF; height:34px; line-height:30px">　<span style="color:#000; font-size:18px">Login</span></h6>
        <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
         <table width="100%" border="0" cellpadding="1" cellspacing="6" style="font-size:12px">
<tr>
           <td width="12%">Username</td>
           <td width="88%"><input type="text" class="message-field font-additional font-weight-normal color-third text-capitalize" id="username" name="username"  placeholder="Name" required>           </td>
         </tr>
          <tr>
           <td>Password</td>
           <td><input type="password" class="message-field font-additional font-weight-normal color-third text-capitalize" id="password" name="password"  placeholder="PassWord" required></td>
          </tr>
          <tr>
           <td><div align="center">
             <input name="act" type="hidden" value="signin" />
            </div></td>
           <td><div class="login300">
             <button type="submit"  name="login"  class="btn hvr-bounce-to-right hover-focus-border before-bg meback" style="width:100px">Login</button>
           <button type="button" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'"  name="buy"  class="btn send-button hvr-bounce-to-right hover-focus-border before-bg meback" style="width:120px">Buy direct</button>
           
           
            </div>          </td>
          </tr>
         </table>
       </form>
       </div>
       <div id="login5">
        <h6 style="background-color:#E6F2FF; height:34px; line-height:30px">　<span style="color:#000; font-size:18px">Regist</span></h6>
        <form action="flow.php?step=login" method="post" name="formUser" id="registerForm" onsubmit="return checkSignupForm(this)">
         <table width="98%" border="0" cellpadding="1" cellspacing="6" class="table" style="font-size:12px">
   <tr>
           <td width="12%">Username</td>
           <td width="88%"><input type="text" class="message-field font-additional font-weight-normal color-third text-capitalize" id="username" name="username"  onblur="is_registered(this.value);" placeholder="Username" required>
            <span id="username_notice" style="color:#FF0000"></span></td>
         </tr>
          <tr>
           <td>Email</td>
           <td><input type="text" class="message-field font-additional font-weight-normal color-third text-capitalize" id="email" name="email"  onblur="checkEmail(this.value);" placeholder="email" required>
            <span id="email_notice" style="color:#FF0000"></span></td>
          </tr>
          <tr>
           <td>Mobile</td>
           <td><input type="text" class="message-field font-additional font-weight-normal color-third text-capitalize" id="mobile_phone" name="mobile_phone"  onblur="checkEmail(this.value);" placeholder="mobile" required>
            <span id="email_notice" style="color:#FF0000"></span></td>
          </tr>
          <tr>
           <td>Password</td>
           <td><input type="password" class="message-field font-additional font-weight-normal color-third text-capitalize" id="password1" name="password"  onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" placeholder="Password" required>
            <span style="color:#FF0000" id="password_notice"></span></td>
          </tr>
          <tr>
           <td>Re-password</td>
           <td><input type="password" class="message-field font-additional font-weight-normal color-third text-capitalize" id="confirm_password" name="confirm_password"  onblur="check_conform_password(this.value);" placeholder="Confirm password" required>
            <span style="color:#FF0000" id="conform_password_notice"></span></td>
          </tr>
          <tr>
           <td>Verification</td>
           <td><input type="text" size="8" name="captcha" class="inputBg" style="width:100px; font-size:14px; padding:5px 5px;" />
            <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /></td>
          </tr>
          <tr>
           <td align="left"><input name="act" type="hidden" value="signup" />           </td>
           <td align="left"><button type="submit"  name="Submit" class="btn send-button btn-block hvr-bounce-to-right hover-focus-border before-bg meback" style="width:130px">Regist</button></td>
          </tr>
         </table>
       </form>
       </div>
      </div>
      
      <?php endif; ?>
    </div>
    
    </div>
   </section>
 


<?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
</body>
</html>
