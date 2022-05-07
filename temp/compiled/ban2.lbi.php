<?php
if($_REQUEST['id'])
{
	$id = $_REQUEST['id'];
    
}
else
{
	$id = $_REQUEST['category'];
    
    
        function get_parent3($value2)
{

			$sql = 'SELECT cat_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE define_url = '$value2'";
			$res = $GLOBALS['db']->getOne($sql);
            $cat_id = $GLOBALS['db']->getOne($sql);
		return $cat_id;
}


    
    $id = get_parent3($_REQUEST['defurl']);
    
    
}


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
include_once("includes/lib_goods.php");
$this->assign('categories1'     ,    get_categories(get_parent($id)));


if($id==500)
{
$this->assign('cat_name'     ,       "Body Wave");
}
else if($id==600)
{
$this->assign('cat_name'     ,       "Deep Wave");
}
else if($id==700)
{
$this->assign('cat_name'     ,       "Loose Wave");
}

else if($id==800)
{
$this->assign('cat_name'     ,       "Straight");
}

else if($id==900)
{
$this->assign('cat_name'     ,       "Curly");
}



else
{
$this->assign('cat_name'     ,       get_cat_name_add(get_parent($id)));
}



?>


<?php
$cname=get_cat_name_add($id);
$cnames=get_cat_name_add(get_parent($id));
if($cname==$cnames)
{
$cnames="";
}
else
{
$cnames=$cnames." ";
}
if($id==8)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1>Virgin <b>Malaysian hair</b> is obtained from malaysian women who sell their to make some extra money. Malaysian hair weave is heavier, thicker and more dense than indian hair, and also not as shiny and has a fuller body. It has very soft and smooth texture, it waves slightly when wet. As usual, we only offer 100% virgin malaysian hair, therefore our malaysian hair is obtained from a single donor and has not been chemically altered or processed. It is shed-free and tangle-free.</font>";
}
else if($id==2)
{
echo "<font class='leftimg80'><h1>Blue Rubber Band Hair</h1>KBL <b>brazilian blue rubber band hair</b> is very high in quality and overall appearance. They are made of all natural, human hair that adds to the appeal factor. As we alluded to earlier, it has surged in popularity over the years due to the fact that it can be cut to desired lengths or textured on human hair extensions. KaBeiLu.com promise that we only sell 100% real Brazilian hair. It doesn't matter what your ethnicity is, Brazilian hair is ideal for Caucasian textures to African American and everything in between. You are going to be amazed at how wonderful you are going to look.</font>";
}
else if($id==6)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1>Virgin <b>Indian hair</b> is obtained from indian women who sell their to make some extra money. Indian hair is thinner and silkier compared to brazilian hair. As usual we only offer 100% virgin indian hair, therefore our indian hair is obtained from a single donor and has not been chemically altered or processed. It is shed-free and tangle-free, so you can rest assured that you are purchasing top notch hair. We guarantee that you will love our long lasting and beautiful hair.</font>";
}
else if($id==1)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1>Virgin <b>Peruvian hair</b> has many purposes, it is lightweight but still carries lots of volume. Peruvian hair has soft and silky texture, available in natural black and natural brown shades. As usual, we only offer 100% virgin Peruvian hair, therefore our Peruvian hair is obtained from a single donor and has not been chemically altered or processed. It is shed-free and tangle-free, so you can rest assured that you are purchasing top-notch hair. We guarantee that you will love our long-lasting and beautiful hair.</font>";
}

else if($id==71)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1>The <b>closure</b> is 5×5 size with transparent lace, resistant to high temperatures, suitable for any skin color.<br>It is made by 100% unprocessed human hair and handmade products, which makes it durable and the lace is very elastic, which will fit your head perfectly.<br>And our closure has baby hair on it, you can have a natural look with this closure.</font>";
}


else if($id==38)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1><b>7A hair</b> is devoted to be the best quality, the most natural and the real human hair originating from Brazilian girls.<br>We collect our human hair in the most excellent birthplace of human hair - Brazil.<br />Perhaps, it is exactly because of poverty that this Brazilian hair, without too much chemical pollution is the quality that 7A hair. Among the hair extensions, 7A Brazilian hair is the top, can be dyed to any color and curl, identical length let the hair looks fuller.</font>";
}

else if($id==44)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1>It's a good choice for you to purchase hair weft with a closure. The role of the closure is making your hair looks more fuller and nature, also used to close your wefts. Both hair extensions and closures are 100 percent human hair, full cuticle. It has very soft and smooth texture, can be dyed and bleached. Want to own an amazing hairstyle, get now!</font>";
}
else if($cname=="European Hair")
{
echo "<font class='leftimg80'><h1 class='leftimg081'>$cnames$cname</h1>European hair is a very popular and fashionable hair style in U.S And Europe countries. The texture of European hair is very soft and silk. They are made of 100 percent human virgin hair. Full cuticle, no processing.Not easy get shed or get tangle cause its double drawn. Last 2-3 years with good care,it looks luster when you under the sunlight,very nature and shinning! You are going to be more confident and amazing if you get this look.</font>";
}

else if($id==82)
{
echo "<font class='leftimg80'><h1>XR Brazilian Hair</h1><b>XR Brazilian hair</b> is beautiful but affordable hair, suitable for most of the business store. It is one donor hair, which means cuticles aligned. It is unprocessed human virgin hair, can be dyed to any color even 613. The hair is very soft, it can be restyled easily, very suitable for changing looks or hair style.<br><b>Hair lifespan:</b> 2-3 years</font>";
}


else if($id==74)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1>The closure is 13×5 size with transparent lace, resistant to high temperatures, suitable for any skin color.<br>It is made by 100% unprocessed human hair and handmade products, which makes it durable and the lace is very elastic, which will fit your head perfectly.<br>And our frontal has baby hair on it, natural and charming.</font>";
}

else if($id==78)
{
echo "<font class='leftimg80'><h1>$cnames$cname</h1>We have 13×6 size transparent <b>lace frontal wigs</b> in 180 density, made with XR Brazilian high quality unprocessed hair, one donor hair and cuticle aligned.<br>The lace resistant to high temperatures, can last for long time. <br>You can restyle the hair and dye the hair to any color, it is very easy to install or change looks.</font>";
}




else
{
echo "<div class='category-ban'><h1>$cname</h1></div>";
}

?>