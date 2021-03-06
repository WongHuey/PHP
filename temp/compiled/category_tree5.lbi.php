<?php
include_once("includes/lib_goods.php");
$goods = get_goods_info($_REQUEST['id']);
$id = $goods['cat_id'];
function get_categories($cat_id = 0)
{
    if ($cat_id > 0)
    {
			  $parent_id = $cat_id;
    }
    else
    {
        $parent_id = 0;
    }

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$cat_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, a.sort_order AS parent_order, a.cat_id, a.is_show,' .
                    'b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order AS child_order ' .
                'FROM ' . $GLOBALS['ecs']->table('category') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ecs']->table('category') . ' AS b ON b.parent_id = a.cat_id AND b.is_show = 1 ' .
                "WHERE a.parent_id = '$parent_id' ORDER BY parent_order ASC, a.cat_id ASC, child_order ASC";
    }
    else
    {
        /* 获取当前分类及其父分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order, b.is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ecs']->table('category') . ' AS b ON b.parent_id = a.cat_id AND b.is_show = 1 ' .
                "WHERE b.parent_id = '$parent_id' ORDER BY sort_order ASC";
    }
    $res = $GLOBALS['db']->getAll($sql);

    $cat_arr = array();
    foreach ($res AS $row)
    {
        if ($row['is_show'])
        {
            $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
            $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
            $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

            if ($row['child_id'] != NULL)
            {
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['id']   = $row['child_id'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['name'] = $row['child_name'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['url']  = build_uri('category', array('cid' => $row['child_id']), $row['child_name']);
            }
        }
    }

    return $cat_arr;
}
function get_cat_name_add($id)
{
    $sql = 'SELECT cat_name ' . 'FROM ' . $GLOBALS['ecs']->table('category')  . "WHERE cat_id =$id " ;
		$cat_name = $GLOBALS['db']->getOne($sql);
		return $cat_name;
}
function get_parent($value,$id='')
{

    if($value!=0)
    {
			$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$value'";
			$res = $GLOBALS['db']->getOne($sql);
			return get_parent($res,$value);
    }
		else
		{
			return $id;
		}
}
$this->assign('categories1'     ,    get_categories(get_parent($id)));
$this->assign('cat_name'     ,       get_cat_name_add(get_parent($id)))
?>


<ul class="categories-tree wow fadeIn">
<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['tosssoods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tosssoods']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['tosssoods']['iteration']++;
?>
<li class="dropdown"><a href="/<?php echo $this->_var['cat']['url']; ?>"><font style="font-size:18px; font-weight:bold"><?php echo $this->_var['cat']['parent_id']; ?><?php echo htmlspecialchars($this->_var['cat']['name']); ?></font></a> </li>
<?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['no']['iteration']++;
?>
<li style="padding-left:6px"><a href="/<?php echo $this->_var['child']['url']; ?>" <?php if ($this->_var['child']['id'] == $this->_var['category']): ?>style="color:red"<?php endif; ?>><i class="fa fa-angle-right" style="padding-right:6px"></i><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>

<div class="sidebar-title text-capitalize customColor wow fadeIn" data-wow-delay="0.3s"><font class="cat009">Featured Products</font></div>
<ul class="sidebar-popular-product fadeIn">
 <li> <a class="popular-product-item" href="/goods-31-high-quality-blue-band-hair-loose-wave-brazilian-hair-extension.html"> <img src="themes/web3/images/products/latest-1.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">High-Quality Blue Band Hair Loose Wave Brazilian Hair Extension</span> <span class="popular-product-item_price font-third">$27.90</span> </a> </li>
 <li> <a class="popular-product-item" href="/goods-34-best-brazilian-blue-rubber-band-hair-deep-wave-extensions.html"> <img src="themes/web3/images/products/latest-2.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">Best Brazilian Blue Rubber Band Hair Deep Wave Extensions</span> <span class="popular-product-item_price  font-third">$27.90</span> </a> </li>
 <li> <a class="popular-product-item" href="/goods-37-soft-and-silk-100%25-virgin-brazilian-human-hair-body-wave-hair-extensions.html"> <img src="themes/web3/images/products/latest-3.jpg" alt="Product"> <span class="popular-product-item_title text-capitalize">Soft And Silk 100% Virgin Brazilian Human Hair Body Wave Hair Extensions</span><span class="popular-product-item_price font-third">$43.50</span></a> </li>
</ul>
