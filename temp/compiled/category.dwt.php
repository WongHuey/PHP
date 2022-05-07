<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="Generator" content="KaBeiLu v2" />
<meta charset="utf-8">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="googlebot" content="NOODP" />
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="/animated_favicon.gif" type="image/gif" />
<link href="/css/master-product.css" rel="stylesheet">
<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
</head>
<body class="animated-css" data-scrolling-animations="false">
<div class="sp-body">

<div id="loader">
<div class="loader"></div>
</div>

<?php echo $this->fetch('library/page_header.lbi'); ?>
<section id="pageTitleBox" class="paralax breadcrumb-container ycmobile"  style="background-image: url('images/detail-heading-bg.jpg');">
  <div class="container relative">
  <div class="row">
   <div class="title color-main zoomIn" style="color:#333333"><?php echo $this->fetch('library/ban2.lbi'); ?></div>
   </div>
  </div>
</section>
<section id="pageContent" class="page-content">
<div class="container">
<div class="row">
<div><?php echo $this->fetch('library/ur_here.lbi'); ?></div>
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix2 categorylist">
<div class="content-box">
<div class="isotope-frame">
<div class="sidebar-title text-capitalize customColor fadeIn">
<?php echo $this->fetch('library/category_tree8.lbi'); ?>
<div class="catselect" style="width:50px;float:left; margin-left:5px; margin-right:5px">
<select id="pid3" onchange="gradeChange2()">
<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_22501200_1651641139');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_22501200_1651641139']):
?>
<?php $_from = $this->_var['filter_attr_0_22501200_1651641139']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
<option grade="<?php echo $this->_var['attr']['url']; ?>" value="<?php echo $this->_var['attr']['url']; ?>" <?php if ($this->_var['attr']['selected']): ?>selected<?php endif; ?>><?php echo $this->_var['attr']['attr_value']; ?></option>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</select>
</div>
<div style="float:right; text-align:right; margin-right:6px;"> <a href="<?php echo $this->_var['script_name']; ?>.php?id=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list"><img src="themes/web3/images/shop_price_<?php if ($this->_var['pager']['sort'] == 'shop_price'): ?><?php echo $this->_var['pager']['order']; ?><?php else: ?>default<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['sort']['shop_price']; ?>" class="bianjikddyi"></a> <a href="<?php echo $this->_var['script_name']; ?>.php?id=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=last_update&order=<?php if ($this->_var['pager']['sort'] == 'last_update' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list"><img src="themes/web3/images/last_update_<?php if ($this->_var['pager']['sort'] == 'last_update'): ?><?php echo $this->_var['pager']['order']; ?><?php else: ?>default<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['sort']['last_update']; ?>"  class="bianjikddyi"></a></div>
</div>
<div class="isotope-filter" style="margin-top:20px">
<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
<?php if ($this->_var['goods']['goods_id']): ?>
<div class="isotope-item newproducts col-md-4 col-sm-6" >
<div class="product-item-cat hvr-underline-from-center">
<div class="product-item_body">
<img class="product-item_image" src="/<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['keywords']; ?>">
<?php if ($this->_var['goods']['goods_number'] <= 0): ?><font class="kclink02">Out of stock</font><?php endif; ?><a class="product-item_link" href="/<?php echo $this->_var['goods']['url']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"><span class="product-item_sale color-main font-additional customBgColor circle"><i class="fa fa-shopping-cart"></i></span></a></div>
<a href="<?php echo $this->_var['goods']['url']; ?>" class="product-item_footer" title="<?php echo $this->_var['goods']['goods_name']; ?>">
<div class="product-item_title lineh text-center text-capitalize catname08"><?php echo $this->_var['goods']['goods_name']; ?></div>
<div class="product-item_price font-weight-normal font-third"><?php if ($this->_var['goods']['goods_weight'] >= 3): ?><font class="catretail"><?php echo $this->_var['goods']['shop_price']; ?></font><font class="kclink05">/ <?php echo $this->_var['goods']['goods_weight']; ?>pcs</font><?php elseif ($this->_var['goods']['goods_weight'] == 2.5): ?><font class="catretail"><?php echo $this->_var['goods']['shop_price']; ?></font><font class="kclink05"></font><?php else: ?><font class="catretail"><?php echo $this->_var['goods']['shop_price']; ?></font><font class="kclink05">/ 1piece</font><?php endif; ?></div>
</a></div>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
<?php echo $this->fetch('library/pages.lbi'); ?>
<div class="category-pagination col-sm-12">
<nav>
<ul class="pagination pagination-small pull-right">
<li> </li>
</ul>
</nav>
</div>
</div>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 clearfix categorytitle ycmobilecat">
<ul class="categories-tree fadeIn"  id="myarticle">
<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['tosssoods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tosssoods']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['tosssoods']['iteration']++;
?>
<li class="dropdown"><a href="/<?php echo $this->_var['cat']['url']; ?>"><font style="font-size:18px; font-weight:bold"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></font></a> </li>
<?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['no']['iteration']++;
?>
<li style="padding-left:6px;"><a href="/<?php echo $this->_var['child']['url']; ?>" <?php if ($this->_var['child']['id'] == $this->_var['category']): ?>style="color:red"<?php endif; ?>><i class="fa fa-angle-right" style="padding-right:6px"></i><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<button id="cbutton"><i class="fa fa-angle-double-down"></i></button>
<script src="js/cat.js" type="text/javascript"></script>
</div>
</div>
</div>
</div>
</section>
<?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
</body>
</html>