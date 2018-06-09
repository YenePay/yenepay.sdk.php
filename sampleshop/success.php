<?php

use YenePay\Models\PDT;
use YenePay\CheckoutHelper;

require_once(__DIR__ .'/lib/sdk/CheckoutHelper.php');
require_once(__DIR__ .'/lib/sdk/Models/PDT.php');

$pdtToken = "YOUR_PDT_KEY_HERE";
$pdtRequestType = "PDT";
$pdtModel = new PDT($pdtToken);
$pdtModel->setUseSandbox(true);
		
if(isset($_GET["TransactionId"]))
	$pdtModel->setTransactionId($_GET["TransactionId"]);
if(isset($_GET["MerchantOrderId"]))
	$pdtModel->setMerchantOrderId($_GET["MerchantOrderId"]);
	

$helper = new CheckoutHelper();
$result = $helper->RequestPDT($pdtModel);

if($result['result'] == "SUCCESS"){
	$order_status = $result['Status'];
	if($order_status == 'Paid')
	{
		//This means the payment is completed. 
		//You can extract more information of the transaction from the $result array
		//You can now mark the order as "Paid" or "Completed" here and start the delivery process
	}
}
else{
	//This means the pdt request has failed.
	//possible reasons are 
		//1. the TransactionId is not valid
		//2. the PDT_Key is incorrect
}

header("Location: " . '/');

?>
