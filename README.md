# YenePaySDK - PHP

This library allows you to quickly and easily add YenePay as a payment method using PHP

We encourage you to read through this README to get the most our of what this library has to offer. We want this library to be community driven and we really appreciate any support we can get from the community.

## Getting Started

These instructions will guide you on how to develop and test YenePay's payment method integration with your PHP application. We have setup a sandbox environment for you to test and play around the integration process. To learn more about this, please visit our community site: https://community.yenepay.com/

## Pre-requisite

To add YenePay to your application and start collecting payments, you will first need to register on YenePay as a merchant and get your seller code. You can do that from https://www.yenepay.com/merchant

## Installation

Step 1: Include yenepay/php-sdk in your composer.json file

```
{
  "require": {
    	"yenepay/php-sdk": "dev-master"
    }
}
``` 

Step 2: Run ```composer install --no-dev``` to download and install the latest version of yenepay/php-sdk. This will download and put the library inside the vendor folder.		

Step 3: Open your payment processor PHP class and import the SDK's helper class and namespaces.

```
use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\Models\CheckoutType;
use YenePay\CheckoutHelper;

require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/CheckoutHelper.php');
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/Models/CheckoutOptions.php');
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/Models/CheckoutItem.php');
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/Models/CheckoutType.php');
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
$checkoutOptions -> setProcess(CheckoutType::Express); //alternatively you can set this to CheckoutType::Cart if you are including multiple items in a single order

// These properties are optional
$successUrl = "YOUR_PAYMENT_SUCCESS_RETURN_URL";
$cancelUrl = "YOUR_PAYMENT_CANCEL_RETURN_URL";
$failureUrl = "YOUR_PAYMENT_FAILURE_RETURN_URL";
$ipnUrl = "YOUR_PAYMENT_COMPLETION_NOTIFICATION_URL";

$checkoutOptions -> setSuccessUrl($successUrl);
$checkoutOptions -> setCancelUrl($cancelUrl);
$checkoutOptions -> setFailureUrl($failureUrl);
$checkoutOptions -> setIPNUrl($ipnUrl);
$checkoutOptions -> setMerchantOrderId("UNIQUE_ID_THAT_IDENTIFIES_THIS_ORDER_ON_YOUR_SYSTEM");
$checkoutOptions -> setExpiresAfter("NUMBER_OF_MINUTES_BEFORE_THE_ORDER_EXPIRES");


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

require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/CheckoutHelper.php');
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/Models/IPN.php');

$ipnModel = new IPN();
$ipnModel->setUseSandbox(true); //set this to false on production

$json_data = json_decode(file_get_contents('php://input'), true);

if(isset($json_data["TotalAmount"]))
	$ipnModel->setTotalAmount($json_data["TotalAmount"]);
if(isset($json_data["BuyerId"]))
	$ipnModel->setBuyerId($json_data["BuyerId"]);
if(isset($json_data["MerchantOrderId"]))
	$ipnModel->setMerchantOrderId($json_data["MerchantOrderId"]);
if(isset($json_data["MerchantId"]))
	$ipnModel->setMerchantId($json_data["MerchantId"]);
if(isset($json_data["MerchantCode"]))
	$ipnModel->setMerchantCode($json_data["MerchantCode"]);
if(isset($json_data["TransactionCode"]))
	$ipnModel->setTransactionCode($json_data["TransactionCode"]);
if(isset($json_data["TransactionId"]))
	$ipnModel->setTransactionId($json_data["TransactionId"]);
if(isset($json_data["Status"]))
	$ipnModel->setStatus($json_data["Status"]);
if(isset($json_data["Currency"]))
	$ipnModel->setCurrency($json_data["Currency"]);
if(isset($json_data["Signature"]))
	$ipnModel->setSignature($json_data["Signature"]);


$helper = new CheckoutHelper();
if ($helper->isIPNAuthentic($ipnModel))
	echo 'Success!';
else
	echo 'Fail';
```

## Deployment

When you are ready to take this to your production environment, just set the UseSandbox property of the CheckoutOptions object to false.











