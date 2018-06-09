# YenePaySDK - PHP

This library allows you to quickly and easily add YenePay as a payment method using PHP

We encourage you to read through this README to get the most our of what this library has to offer. We want this library to be community driven and we really appreciate any support we can get from the community.

## Getting Started

These instructions will guide you on how to develop and test YenePay's payment method integration with your PHP application. We have setup a sandbox environment for you to test and play around the integration process. To learn more about this, please visit our community site: https://community.yenepay.com/

## Pre-requisite

To add YenePay to your application and start collecting payments, you will first need to register on YenePay as a merchant and get your seller code. You can do that from https://www.yenepay.com/merchant

## Installation

Step 1: Download the contents of this repository and extract the contents. This repository contains the core PHP SDK and a sample shop application that shows how to the integration works. 

Step 2: Open the folder "sampleshop", locate the folder "lib" and copy it to your PHP projects root folder. 

Step 3: Open your payment processor PHP class and import the SDK's helper class and namespaces.

```
use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');
```
Note: depending on your directory structure, the path to the CheckoutHelper.php file may be slightly different.

Step 4: Generate a Checkout Url using the help methods provided by the SDK library as shown below

```
$sellerCode = "YOUR_YENEPAY_SELLER_CODE";
$useSandbox = true;

$checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
```

This will create a new instance of type CheckoutOptions and sets the UseSandbox property to true. Set this to false when on production environment.

Once you have that, set the other optional checkout options and provide the details of the order to be paid for.

```
$checkoutOptions.Process = CheckoutType.Express; //alternatively you can set this to CheckoutType.Cart if you are including multiple items in a single order

// These properties are optional
$checkoutOptions.SuccessReturn = "PAYMENT_SUCCESS_RETURN_URL";
$checkoutOptions.CancelReturn = "PAYMENT_CANCEL_RETURN_URL";
$checkoutOptions.IpnUrlReturn = "PAYMENT_COMPLETION_NOTIFICATION_URL";
$checkoutOptions.FailureReturn = "PAYMENT_FAILURE_RETURN_URL";
$checkoutOptions.ExpiresInDays = "NUMBER_OF_DAYS_BEFORE_THE_ORDER_EXPIRES";
$checkoutOptions.OrderId = "UNIQUE_ID_THAT_IDENTIFIES_THIS_ORDER_ON_YOUR_SYSTEM";

CheckoutItem checkoutitem = new CheckoutItem("NAME_OF_ITEM_PAID_FOR", UNIT_PRICE_OF_ITEM, QUANTITY);
string yenepayCheckoutUrl = CheckoutHelper.GetCheckoutUrl(checkoutoptions, checkoutitem);

$checkoutOrderItem = new CheckoutItem("NAME_OF_ITEM_PAID_FOR", UNIT_PRICE_OF_ITEM, QUANTITY);
$checkoutOrderItem  -> ItemId = "UNIQUE_ID_FOR_THE_ITEM";
$checkoutOrderItem  -> DeliveryFee = DELIVERY_FEE_IF_AVAILABLE;
$checkoutOrderItem  -> Tax1 = VAT_FEE_IF_AVAILABLE;
$checkoutOrderItem  -> Tax2 = TOT_FEE_IF_AVAILABLE;
$checkoutOrderItem  -> Discount = DISCOUNT_AMOUNT_IF_AVAILABLE;
$checkoutOrderItem  -> HandlingFee = HANDLING_FEE_IF_AVAILABLE;

$checkoutHelper = new CheckoutHelper();
$checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
```

If you are processing cart payment, use the getCartCheckoutUrl method instead as follows:

```
$checkoutUrl = $checkoutHelper -> getCartCheckoutUrl($checkoutOptions, $checkoutOrderItems);
```

Step 5: Redirect your customer to the checkout URL generated in step 4 above. Your customer will then be taken to our checkout page, login with his/her YenePay account and complete the payment there. Once a payment has been successfully completed, we will send you an Instant Payment Notification (IPN) to the URL you provided on the CheckoutOptions object in step 4 above. When you receive this notification, you should query our IPN verification url to make sure it is an authentic notification initiated by our servers.

A sample implementation is shown below

```
use YenePay\Models\IPN;
use YenePay\CheckoutHelper;

require_once(__DIR__ .'/lib/sdk/CheckoutHelper.php');
require_once(__DIR__ .'/lib/sdk/Models/IPN.php');

$ipnModel = new IPN();
$ipnModel->setUseSandbox(true);
if(isset($_POST["TotalAmount"]))
	$ipnModel->setTotalAmount($_POST["TotalAmount"]);
if(isset($_POST["BuyerId"]))
	$ipnModel->setBuyerId($_POST["BuyerId"]);
if(isset($_POST["BuyerName"]))
	$ipnModel->setBuyerName($_POST["BuyerName"]);
if(isset($_POST["TransactionFee"]))
	$ipnModel->setTransactionFee($_POST["TransactionFee"]);
if(isset($_POST["MerchantOrderId"]))
	$ipnModel->setMerchantOrderId($_POST["MerchantOrderId"]);
if(isset($_POST["MerchantId"]))
	$ipnModel->setMerchantId($_POST["MerchantId"]);
if(isset($_POST["MerchantCode"]))
	$ipnModel->setMerchantCode($_POST["MerchantCode"]);
if(isset($_POST["TransactionId"]))
	$ipnModel->setTransactionId($_POST["TransactionId"]);
if(isset($_POST["Status"]))
	$ipnModel->setStatus($_POST["Status"]);
if(isset($_POST["StatusDescription"]))
	$ipnModel->setStatusDescription($_POST["StatusDescription"]);
if(isset($_POST["Currency"]))
	$ipnModel->setCurrency($_POST["Currency"]);
if(isset($_POST["Signature"]))
	$ipnModel->setSignature($_POST["Signature"]);


$helper = new CheckoutHelper();
if ($helper->isIPNAuthentic($ipnModel))
	echo 'Success!';
else
	echo 'Fail';
```

## Deployment

When you are ready to take this to your production environment, just set the UseSandbox property of the CheckoutOptions object to false.











