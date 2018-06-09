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
	
	$checkoutOrderItem = new CheckoutItem($_POST["ItemName"], $_POST["UnitPrice"], $_POST["Quantity"]);
	if(isset($_POST["ItemId"]))
	{
		$checkoutOrderItem  -> setId($_POST["ItemId"]);
	}
	if(isset($_POST["DeliveryFee"]))
	{
		$checkoutOrderItem  -> setDeliveryFee($_POST["DeliveryFee"]);
	}
	if(isset($_POST["Tax1"]))
	{
		$checkoutOrderItem  -> setTax1($_POST["Tax1"]);
	}
	if(isset($_POST["Tax2"]))
	{
		$checkoutOrderItem  -> setTax2($_POST["Tax2"]);
	}
	if(isset($_POST["Discount"]))
	{
		$checkoutOrderItem  -> setDiscount($_POST["Discount"]);
	}
	if(isset($_POST["HandlingFee"]))
	{
		$checkoutOrderItem  -> setHandlingFee($_POST["HandlingFee"]);
	}
	
	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);

	header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							