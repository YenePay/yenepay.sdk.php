<?php
namespace YenePay;

use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use WpOrg\Requests\Requests;

require_once(__DIR__ .'/../../../../vendor/autoload.php');
require_once(__DIR__ .'/Models/CheckoutOptions.php');
require_once(__DIR__ .'/Models/CheckoutItem.php');


class CheckoutHelper 
{
	const CHECKOUTBASEURL_PROD = "https://www.yenepay.com/checkout/Home/Process/";
	const CHECKOUTBASEURL_SANDBOX = "https://test.yenepay.com/Home/Process/";
	const IPNVERIFYURL_PROD = "https://endpoints.yenepay.com/api/verify/ipn/";
	const IPNVERIFYURL_SANDBOX = "https://testapi.yenepay.com/api/verify/ipn/";
	const PDTURL_PROD = "https://endpoints.yenepay.com/api/verify/pdt/";
	const PDTURL_SANDBOX = "https://testapi.yenepay.com/api/verify/pdt/";

	//public $checkoutOrderDto;
			
	function __construct()
	{

	}

	function getSingleCheckoutUrl($checkoutOptions, $item)
	{
		// get the checkoutOptions as key-value pair array
		$optionsDict = $checkoutOptions -> getAsKeyValue(false);
		
		// get the checkout items as key-value pair added with the checkoutOptions array
		$queryString = $item -> getAsKeyValue($optionsDict);
		$queryString = http_build_query($queryString);
		if(null != $checkoutOptions -> getUseSandbox() && $checkoutOptions -> getUseSandbox() == 'yes')
			return self :: CHECKOUTBASEURL_SANDBOX . '?' . $queryString;
		return self :: CHECKOUTBASEURL_PROD . '?' . $queryString;
	}
	
	function getCartCheckoutUrl($checkoutOptions, $items)
	{
		// get the checkoutOptions as key-value pair array
		$optionsDict = $checkoutOptions -> getAsKeyValue(true);
		
		// get the checkout items as key-value pair added with the checkoutOptions array
		for($i=0; $i<count($items); $i++)
		{
			//var_dump($items[$i]);
			$itemsDict = $items[$i]->getAsKeyValue(null);
			foreach($itemsDict as $key => $value)
			{
				$optionsDict["Items[".$i."].".$key] = $value;
			}
		}
		$queryString = http_build_query($optionsDict);
		if(null != $checkoutOptions -> getUseSandbox() && $checkoutOptions -> getUseSandbox() == 'yes')
			return self :: CHECKOUTBASEURL_SANDBOX . '?' . $queryString;
		return self :: CHECKOUTBASEURL_PROD . '?' . $queryString;
	}

	function isIPNAuthentic($ipnModel)
	{
		//get ipnmodel dictionary
		$ipnDict = $ipnModel->getAsKeyValue();
		$ipnUrl = (null != $ipnModel->getUseSandbox() && $ipnModel->getUseSandbox() == 'yes') ? self::IPNVERIFYURL_SANDBOX : self::IPNVERIFYURL_PROD;
		$headers = array('Content-Type' => 'application/json');
		try{
			$response = Requests::post($ipnUrl, $headers, json_encode($ipnDict));

			if($response->status_code == 200)
				return true;
			return false;
		}
		catch(Exception $ex)
		{
			return false;
		}
		return false;
	}
	
	function RequestPDT($pdtModel)
	{
		//get pdtmodel dictionary
		$pdtDict = $pdtModel->getAsKeyValue();
		$pdtUrl = (null != $pdtModel->getUseSandbox() && $pdtModel->getUseSandbox() == 'yes') ? self::PDTURL_SANDBOX : self::PDTURL_PROD;
		$headers = array('Content-Type' => 'application/json');
		try{
			$response = Requests::post($pdtUrl, $headers, json_encode($pdtDict));
			if($response->status_code == 200){
				parse_str(trim($response->body, '"'), $responseArray);
				return $responseArray;
			}
			else{
				$result['result']="Fail";
			}
		}
		catch(Exception $ex)
		{
			$result['result'] = "FAIL";
			// echo "exception: ". $ex->getMessage();
		}
		$result['result'] = "FAIL";
		return $result;
	}
}
?>