<!-- $Id: order_info.htm 17060 2010-03-25 03:44:42Z liuhui $ -->

<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'topbar.js,../js/utils.js,listtable.js,selectzone.js,../js/common.js')); ?>
<?php if ($this->_var['user']): ?>
<div id="topbar">
  <div align="right"><a href="" onclick="closebar(); return false"><img src="images/close.gif" border="0" /></a></div>
  <table width="100%" border="0">
    <caption><strong> <?php echo $this->_var['lang']['buyer_info']; ?> </strong></caption>
    <tr>
      <td> <?php echo $this->_var['lang']['email']; ?> </td>
      <td> <a href="mailto:<?php echo $this->_var['user']['email']; ?>"><?php echo $this->_var['user']['email']; ?></a> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['user_money']; ?> </td>
      <td> <?php echo $this->_var['user']['formated_user_money']; ?> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['pay_points']; ?> </td>
      <td> <?php echo $this->_var['user']['pay_points']; ?> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['rank_points']; ?> </td>
      <td> <?php echo $this->_var['user']['rank_points']; ?> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['rank_name']; ?> </td>
      <td> <?php echo $this->_var['user']['rank_name']; ?> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['bonus_count']; ?> </td>
      <td> <?php echo $this->_var['user']['bonus_count']; ?> </td>
    </tr>
  </table>

  <?php $_from = $this->_var['address_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'address');if (count($_from)):
    foreach ($_from AS $this->_var['address']):
?>
  <table width="100%" border="0">
    <caption><strong> <?php echo $this->_var['lang']['consignee']; ?> : <?php echo htmlspecialchars($this->_var['address']['consignee']); ?> </strong></caption>
    <tr>
      <td> <?php echo $this->_var['lang']['email']; ?> </td>
      <td> <a href="mailto:<?php echo htmlspecialchars($this->_var['address']['email']); ?>"><?php echo htmlspecialchars($this->_var['address']['email']); ?></a> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['address']; ?> </td>
      <td> <?php echo htmlspecialchars($this->_var['address']['address']); ?> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['zipcode']; ?> </td>
      <td> <?php echo htmlspecialchars($this->_var['address']['zipcode']); ?> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['tel']; ?> </td>
      <td> <?php echo htmlspecialchars($this->_var['address']['tel']); ?> </td>
    </tr>
    <tr>
      <td> <?php echo $this->_var['lang']['mobile']; ?> </td>
      <td> <?php echo htmlspecialchars($this->_var['address']['mobile']); ?> </td>
    </tr>
  </table>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<?php endif; ?>

<form action="order.php?act=operate" method="post" name="theForm">
<div class="list-div" style="margin-bottom: 5px">






<table width="100%" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="4">
      <div align="center">
        <input name="prev" type="button" class="button" onClick="location.href='order.php?act=info&order_id=<?php echo $this->_var['prev_id']; ?>';" value="<?php echo $this->_var['lang']['prev']; ?>" <?php if (! $this->_var['prev_id']): ?>disabled<?php endif; ?> />
        <input name="next" type="button" class="button" onClick="location.href='order.php?act=info&order_id=<?php echo $this->_var['next_id']; ?>';" value="<?php echo $this->_var['lang']['next']; ?>" <?php if (! $this->_var['next_id']): ?>disabled<?php endif; ?> />
      </div></td>
  </tr>
  <tr>
    <th colspan="4"><?php echo $this->_var['lang']['base_info']; ?></th>
  </tr>
  <tr>
    <td width="18%" height="39"><div align="right"><strong><?php echo $this->_var['lang']['label_order_sn']; ?></strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['order_sn']; ?></td>
    </tr>
  <tr>
    <td height="39"><div align="right"><strong>客户名称：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['consignee']; ?></td>
    </tr>
  <tr>
    <td height="39"><div align="right"><strong>商品名称：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['tradename']; ?></td>
    </tr>
  <tr>
    <td height="39"><div align="right"><strong>商品货号：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['commoditycode']; ?></td>
    </tr>
  <tr>
    <td height="39"><div align="right"><strong>数量：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['quantity']; ?></td>
    </tr>
  
  <tr>
    <td height="39"><div align="right"><strong>单位：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['unit']; ?></td>
    </tr>
    
    
  <tr>
    <td height="39"><div align="right"><strong>订单金额：</strong></div></td>
    <td height="39" colspan="3">$<?php echo $this->_var['order']['order_amount']; ?></td>
    </tr>
    
    
  <tr>
    <td height="39"><div align="right"><strong>支付状态：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['paymentstatus']; ?></td>
    </tr>
 
  <tr>
    <td height="39"><div align="right"><strong>物流运单号：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['waybillnumber']; ?></td>
    </tr>
 
  <tr>
    <td height="39"><div align="right"><strong>发往国家：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['thecountry']; ?></td>
    </tr>
    
  <tr>
    <td height="39"><div align="right"><strong>收件地址：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['address']; ?></td>
    </tr>
    
  <tr>
    <td height="39"><div align="right"><strong>支付时间：</strong></div></td>
    <td height="39" colspan="3"><?php echo $this->_var['order']['paymenttime']; ?></td>
    </tr>
    



</table>
</div>




</form>

<script language="JavaScript">

  var oldAgencyId = <?php echo empty($this->_var['order']['agency_id']) ? '0' : $this->_var['order']['agency_id']; ?>;

  onload = function()
  {
    // 开始检查订单
    startCheckOrder();
  }

  /**
   * 把订单指派给某办事处
   * @param int agencyId
   */
  function assignTo(agencyId)
  {
    if (agencyId == 0)
    {
      alert(pls_select_agency);
      return false;
    }
    if (oldAgencyId != 0 && agencyId == oldAgencyId)
    {
      alert(pls_select_other_agency);
      return false;
    }
    return true;
  }
</script>


<?php echo $this->fetch('pagefooter.htm'); ?>