<?php

/**
 * ECSHOP 留言板
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.kabeilu.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: message.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

?>
<?php


        $sql = "SELECT region_id,region_name" .
                " FROM " . $ecs->table('region') .
                " WHERE parent_id = '223'" ;
 
$res = $GLOBALS['db']->getAll($sql);
        if (!empty($res))
        {
            $spe_arr = array();
            foreach ($res AS $row)
            {
    
				echo $row['region_name'].$row['region_id']."<br>";
				
				}
			}
				

$count = $db->getOne("SELECT region_name FROM " . $ecs->table('region') . " WHERE parent_id = '223'");
//echo $count;
?>
