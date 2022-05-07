<?php
 
include('ip2/geoip.inc');
 
global $countryCode;
 
$geoData = geoip_open('ip2/GeoIP.dat', GEOIP_STANDARD);
$countryCode = geoip_country_code_by_addr($geoData, $_SERVER['REMOTE_ADDR']);
//$countryCode = geoip_country_code_by_addr($geoData, "23.234.53.55");
geoip_close($geoData);
 
 
global $countryCode;
 
if($countryCode == 'CN') {
	// 中国大陆地区执行的代码
	echo "a" ;
} else if($countryCode == 'US') {
	// 美国地区执行的代码
	echo "b" ;
} else {
	// 中国大陆和美国以外地区执行的代码
	echo "c" ;
}
 
?>
