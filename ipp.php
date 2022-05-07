<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
   include('images/ip2/geoip.inc');
global $countryCode;
$geoData = geoip_open('images/ip2/GeoIP.dat', GEOIP_STANDARD);
$countryCode = geoip_country_code_by_addr($geoData, $_SERVER['REMOTE_ADDR']);
geoip_close($geoData);
global $countryCode;
	echo $countryCode;
if($countryCode != 'CN')
{
	echo $countryCode;

}
else
{
	echo $countryCode;
}
	?>
</body>
</html>
