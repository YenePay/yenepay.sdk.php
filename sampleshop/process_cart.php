<?php

use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');

	$sellerCode = "YOUR_YENEPAY_SELLER_CODE";
	$successUrl = "http://localhost:81/sampleshop/success.php"; //"YOUR_SUCCESS_URL";
	$cancelUrl = "http://localhost:81/sampleshop/cancel.php"; //"YOUR_CANCEL_URL";
	$ipnUrl = "http://localhost:81/sampleshop/ipn.php"; //"YOUR_IPN_URL";
	$useSandbox = true; // set this to false if you are on production environment
	
	$checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
	$checkoutOptions -> setSuccessUrl($successUrl);
	$checkoutOptions -> setCancelUrl($cancelUrl);
	$checkoutOptions -> setIPNUrl($ipnUrl);
	
	$checkoutOptions -> setTotalItemsDeliveryFee(30);
	
	$data = json_decode(file_get_contents('php://input'), true);
	$checkoutOrderArray = $data['Items'];

	$checkoutOrderItems = array();
	foreach($checkoutOrderArray as $key=>$value)
	{
		$item = new CheckoutItem();
		$checkoutOrderItems[$key] = $item->getFromArray($value);
	}

	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getCartCheckoutUrl($checkoutOptions, $checkoutOrderItems);

	$obj = array("redirectUrl" => $checkoutUrl);
	$result = json_encode($obj);
	header("Content-type: application/json");
	echo $result;
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							