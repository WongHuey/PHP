<?php

/**
 * ECSHOP 文章内容
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.kabeilu.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: article.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');





function getQuerystr($url,$key){
    $res = '';
    $a = strpos($url,'?');
    if($a!==false){
        $str = substr($url,$a+1);
        $arr = explode('&',$str);
        foreach($arr as $k=>$v){
        $tmp = explode('=',$v);
            if(!empty($tmp[0]) && !empty($tmp[1])){
                $barr[$tmp[0]] = $tmp[1];
            }
        }
    }
    if(!empty($barr[$key])){
        $res = $barr[$key];
    }
    return $res;
}
if (getQuerystr($_SERVER["REQUEST_URI"], 'cid')=="")
{
$smarty->assign('vdurl', 'kblhair/xr/xr01.mp4"');
}
else
{
//echo getQuerystr($_SERVER["REQUEST_URI"], 'cid');
$smarty->assign('vdurl', getQuerystr($_SERVER["REQUEST_URI"], 'cid') );
}
$smarty->display('kabeilu-reviews.dwt', $cache_id);
?>