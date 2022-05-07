<?php
$userip=$_SERVER['REMOTE_ADDR'];

include_once('/lib/iplimit.class.php');
$iplimit = new iplimit;

if($iplimit->setup($userip))
{
    echo 1;
}
else
{
    echo 2;
}
?>