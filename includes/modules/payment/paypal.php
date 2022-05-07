<?php

/**
 * ECSHOP PayPal插件
 * ============================================================================
 * * 版权所有 2013-2018 ECSHOP插件网，并保留所有权利。
 * 网站地址: https://www.ecshop.vc
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: ECSHOP插件网 $
 * $Id: paypal.php 17217 2018-09-18 06:29:08Z ECSHOP插件网 $
 */

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

$payment_lang = ROOT_PATH . 'languages/' .$GLOBALS['_CFG']['lang']. '/payment/paypal.php';

if (file_exists($payment_lang))
{
    global $_LANG;

    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'paypal_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 作者 */
    $modules[$i]['author']  = 'ECSHOP插件网';

    /* 网址 */
    $modules[$i]['website'] = 'https://www.kabeilu.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.1.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'paypal_account',  'type' => 'text',   'value' => ''),
        array('name' => 'paypal_currency', 'type' => 'select', 'value' => 'USD'),
        array('name' => 'pdt_token',       'type' => 'text',   'value' => ''),
        array('name' => 'sandbox',         'type' => 'select', 'value' => '')
    );

    return;
}

/**
 * 类
 */
class paypal
{
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function __construct()
    {
        $this->paypal();
    }

    function paypal()
    {
    }

    /**
     * 生成支付代码
     * @param   array   $order  订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
        $data_order_id      = $order['log_id'];
        $data_amount        = $order['order_amount'];
		if ($_POST["insurance"]!="")
		{
		$data_amount        = $data_amount+intval($_POST["insurance"])+intval($_POST["insurance"])*0.039+0.1;
		}
		
        $data_return_url    = return_url(basename(__FILE__, '.php'));
        $data_pay_account   = $payment['paypal_account'];
        $currency_code      = $payment['paypal_currency'];
        $data_notify_url    = return_url(basename(__FILE__, '.php'));
        $cancel_return      = $GLOBALS['ecs']->url();
        $sub_fix            = preg_replace('/(.*?:\/\/(www\.)?)(.*?)\.(:?.*?)$/','$3',$data_return_url);
        $invoice            = $data_order_id.'-'.$sub_fix;
        $paypal_url         = $payment['sandbox'] ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

        $def_url  = '<br /><form name="payform" style="text-align:left;" action="'.$paypal_url.'" method="post">' .   // 不能省略
            "<input type='hidden' name='cmd' value='_xclick'>" .                             // 不能省略
            "<input type='hidden' name='business' value='$data_pay_account'>" .              // 贝宝帐号
            "<input type='hidden' name='item_name' value='$order[order_sn]'>" .              // payment for
            "<input type='hidden' name='amount' value='$data_amount'>" .                     // 订单金额
            "<input type='hidden' name='currency_code' value='$currency_code'>" .            // 货币
            "<input type='hidden' name='return' value='$data_return_url'>" .                 // 付款后页面
            "<input type='hidden' name='invoice' value='$invoice'>" .                        // 订单号
            "<input type='hidden' name='charset' value='utf-8'>" .                           // 字符集
            "<input type='hidden' name='no_note' value=''>" .                                // 付款说明
            "<input type='hidden' name='notify_url' value='$data_notify_url'>" .
            "<input type='hidden' name='rm' value='2'>" .
			"<input type='hidden' name='city' value='$_POST[shcity]'>" .
			"<input type='hidden' name='country' value='$_POST[shcountry]'>" .
			"<input type='hidden' name='email' value='$_POST[shmail]'>" .
			"<input type='hidden' name='first_name' value='$_POST[shname]'>" .
			"<input type='hidden' name='last_name' value=''>" .
			"<input type='hidden' name='zip' value='$_POST[shzip]'>" .
			"<input type='hidden' name='state' value='$_POST[shstate]'>" .
			"<input type='hidden' name='address1' value='$_POST[shaddress]'>" .
			"<input type='hidden' name='address2' value=''>" .
            "<input type='hidden' name='cancel_return' value='$cancel_return'>" .
            "<input type='submit' value='" . $GLOBALS['_LANG']['paypal_button'] . "'>" .     // 按钮
            "</form>";

        return $def_url;
    }
	
	
	    function get_code2($order,$insurance,$payment,$country,$province,$city,$zipcode,$email,$consignee,$address)
    {
        $data_order_id      = $order['log_id'];
        $data_amount        = $order['order_amount'];
		
	
		$data_amount        = $data_amount+intval($insurance)+intval($insurance)*0.039+0.1;

		
        $data_return_url    = return_url(basename(__FILE__, '.php'));
        $data_pay_account   = $payment['paypal_account'];
        $currency_code      = $payment['paypal_currency'];
        $data_notify_url    = return_url(basename(__FILE__, '.php'));
        $cancel_return      = $GLOBALS['ecs']->url();
        $sub_fix            = preg_replace('/(.*?:\/\/(www\.)?)(.*?)\.(:?.*?)$/','$3',$data_return_url);
        $invoice            = $data_order_id.'-'.$sub_fix;
        $paypal_url         = $payment['sandbox'] ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

        $def_url  = '<br /><form name="payform" style="text-align:left;" action="'.$paypal_url.'" method="post">' .   // 不能省略
            "<input type='hidden' name='cmd' value='_xclick'>" .                             // 不能省略
            "<input type='hidden' name='business' value='$data_pay_account'>" .              // 贝宝帐号
            "<input type='hidden' name='item_name' value='$order[order_sn]'>" .              // payment for
            "<input type='hidden' name='amount' value='$data_amount'>" .                     // 订单金额
            "<input type='hidden' name='currency_code' value='$currency_code'>" .            // 货币
            "<input type='hidden' name='return' value='$data_return_url'>" .                 // 付款后页面
            "<input type='hidden' name='invoice' value='$invoice'>" .                        // 订单号
            "<input type='hidden' name='charset' value='utf-8'>" .                           // 字符集
            "<input type='hidden' name='no_note' value=''>" .                                // 付款说明
            "<input type='hidden' name='notify_url' value='$data_notify_url'>" .
            "<input type='hidden' name='rm' value='2'>" .
			"<input type='hidden' name='city' value='$city'>" .
			"<input type='hidden' name='country' value='$country'>" .
			"<input type='hidden' name='email' value='$email'>" .
			"<input type='hidden' name='first_name' value='$consignee'>" .
			"<input type='hidden' name='last_name' value=''>" .
			"<input type='hidden' name='zip' value='$zipcode'>" .
			"<input type='hidden' name='state' value='$province'>" .
			"<input type='hidden' name='address1' value='$address'>" .
			"<input type='hidden' name='address2' value=''>" .
            "<input type='hidden' name='cancel_return' value='$cancel_return'>" .
            "<input type='submit' value='" . $GLOBALS['_LANG']['paypal_button'] . "'>" .     // 按钮
            "</form>";

        return $def_url;
    }
	

    /**
     * 响应操作
     */
    function respond()
    {
        if (function_exists('curl_init'))
        {
            $payment    = get_payment('paypal');
            $paypal_url = $payment['sandbox'] ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

            // read the post from PayPal system and add 'cmd'
            if (isset($_POST['ipn_track_id']))
            {
                $req = 'cmd=_notify-validate';
            }
            else
            {
                $req = 'cmd=_notify-synch';
            }
            foreach ($_POST as $key => $value)
            {
                $req .= "&$key=".urlencode(stripslashes($value));
            }
            foreach ($_GET as $key => $value)
            {
                $req .= "&$key=".urlencode(stripslashes($value));
            }
            $req .= '&at='.$payment['pdt_token'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $paypal_url);
            $options = array(
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $req,
                CURLOPT_AUTOREFERER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSLVERSION => '1'
            );
            curl_setopt_array($ch, $options);
            $res = curl_exec($ch);
            $res_arr = explode("\n", $res);
            $pay_status = $res_arr[0];
            unset($res_arr[0]);

            // assign posted variables to local variables
            foreach ($res_arr as $value)
            {
                list($key, $val) = explode('=', $value);
                $$key = urldecode($val);
            }
            $order_sn       = !empty($_POST['invoice'])        ? intval($_POST['invoice']) : intval($invoice);
            $txn_id         = !empty($_POST['txn_id'])         ? $_POST['txn_id']          : $txn_id;
            $payment_status = !empty($_POST['payment_status']) ? $_POST['payment_status']  : $payment_status;
            $receiver_email = !empty($_POST['receiver_email']) ? $_POST['receiver_email']  : $receiver_email;
            $mc_gross       = !empty($_POST['mc_gross'])       ? $_POST['mc_gross']        : $mc_gross;
            $mc_currency    = !empty($_POST['mc_currency'])    ? $_POST['mc_currency']     : $mc_currency;
            $action_note    = $GLOBALS['_LANG']['paypal_txn_id'].'：'.$txn_id;

            if ($pay_status == 'VERIFIED')
            {
                order_paid($order_sn, PS_PAYED, $action_note);
                return true;
            }

            if ($pay_status == 'SUCCESS')
            {
                // check the payment_status is Completed
                if ($payment_status != 'Completed' && $payment_status != 'Pending')
                {
                    return false;
                }

                // check that receiver_email is your Primary PayPal email
                if ($payment['paypal_account'] != $receiver_email)
                {
                    return false;
                }

                // check that payment_amount/payment_currency are correct
                $sql = "SELECT order_amount FROM " . $GLOBALS['ecs']->table('pay_log') . " WHERE log_id = '$order_sn'";
                if ($GLOBALS['db']->getOne($sql) != $mc_gross)
                {
                    return false;
                }

                if ($payment['paypal_currency'] != $mc_currency)
                {
                    return false;
                }

                // process payment
                order_paid($order_sn, PS_PAYED, $action_note);

                return true;
            }
            else
            {
            // log for manual investigation
                return false;
            }
        }
        else
        {
            show_message($GLOBALS['_LANG']['curl_error']);
        }
    }
}

?>