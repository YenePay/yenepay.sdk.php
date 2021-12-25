<?php

namespace YenePay\Models;

use YenePay\Models\CheckoutType;

require_once(__DIR__ .'/CheckoutType.php');

class CheckoutOptions
{
	private  $sellerCode;
	private  $process;
	private  $merchantOrderId;
	private  $expiresAfter;
	private  $ipnUrl;
	private  $successUrl;
	private  $failureUrl;
	private  $cancelUrl;
	private  $useSandbox;
	private  $totalItemsTax1;
	private  $totalItemsTax2;
	private  $totalItemsDeliveryFee;
	private  $totalItemsHandlingFee;
	private  $totalItemsDiscount;
    private  $currency;

    private $supported_currencies = array('ETB', 'USD', 'EUR', 'GBP');

	function __construct()
	{
		$a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
	}
	
	function __construct0()
	{
		$this->useSandbox = false;
        $this->process = CheckoutType::Express;
	}
	
	function __construct2($sellerCode, $useSandbox)
	{
		$this->useSandbox = $useSandbox;
		$this->sellerCode = $sellerCode;
        $this->process = CheckoutType::Express;
	}
	
	function __construct9($sellerCode, $process, $merchantOrderId, $expiresAfter, $ipnUrl, $successUrl, $failureUrl, $cancelUrl, $useSandbox)
	{
		$this->useSandbox = $useSandbox;
		$this->sellerCode = $sellerCode;
        $this->process = $process;
		$this->merchantOrderId = $merchantOrderId;
		$this->expiresAfter = $expiresAfter;
		$this->ipnUrl = $ipnUrl;
		$this->successUrl = $successUrl;
		$this->failureUrl = $failureUrl;
		$this->cancelUrl = $cancelUrl;
	}

    function __construct10($sellerCode, $process, $merchantOrderId, $expiresAfter, $ipnUrl, $successUrl, $failureUrl, $cancelUrl, $useSandbox, $currency)
	{
        __construct9($sellerCode, $process, $merchantOrderId, $expiresAfter, $ipnUrl, $successUrl, $failureUrl, $cancelUrl, $useSandbox);
        $this->currency = $currency;
    }

	
	/**
     * An all numeral unique seller code used to uniquely identify a merchant on YenePay
     *
     * @param string $sellerCode
     *
     * @return $this
     */
    public function setSellerCode($sellerCode)
    {
        $this->sellerCode = $sellerCode;
        return $this;
    }

    /**
     * An all numeral unique seller code used to uniquely identify a merchant on YenePay
     *
     * @return string
     */
    public function getSellerCode()
    {
        return $this->sellerCode;
    }
	
	/**
     * a string representing the type of checkout process (Enums.php for full list of valid values)
     *
     * @param string $process
     *
     * @return $this
     */
    public function setProcess($process)
    {
        $this->process = $process;
        return $this;
    }

    /**
     * a string representing the type of checkout process (Enums.php for full list of valid values)
     *
     * @return string
     */
    public function getProcess()
    {
        return $this->process;
    }
	
	/**
     * Use sandbox application or production server (set to true if testing)
     *
     * @param string $useSandbox
     *
     * @return $this
     */
    public function setUseSandbox($useSandbox)
    {
        $this->useSandbox = $useSandbox;
        return $this;
    }

    /**
     * Use sandbox application or production server (set to true if testing)
     *
     * @return string
     */
    public function getUseSandbox()
    {
        return $this->useSandbox;
    }
	
	/**
     * Id that identifies the order on the merchant application (optional)
     *
     * @param string $merchantOrderId
     *
     * @return $this
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    /**
     * Id that identifies the order on the merchant application (optional)
     *
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }
	
	/**
     * The number of minutes before an order expires
     *
     * @param string $expiresAfter
     *
     * @return $this
     */
    public function setExpiresAfter($expiresAfter)
    {
        $this->expiresAfter = $expiresAfter;
        return $this;
    }

    /**
     * The number of minutes before an order expires
     *
     * @return string
     */
    public function getExpiresAfter()
    {
        return $this->expiresAfter;
    }
	
	/**
     * endpoint url on a merchant site used to send instant payment notifications (IPN)
     *
     * @param string $ipnUrl
     *
     * @return $this
     */
    public function setIPNUrl($ipnUrl)
    {
        $this->ipnUrl = $ipnUrl;
        return $this;
    }

    /**
     * endpoint url on a merchant site used to send instant payment notifications (IPN)
     *
     * @return string
     */
    public function getIPNUrl()
    {
        return $this->ipnUrl;
    }
	
	/**
     * endpoint url on a merchant site used to return a customer after a payment is successfully completed on YenePay
     *
     * @param string $successUrl
     *
     * @return $this
     */
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;
        return $this;
    }

    /**
     * endpoint url on a merchant site used to return a customer after a payment is successfully completed on YenePay
     *
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }
	
	/**
     * endpoint url on a merchant site used to return a customer after cancelling a payment on YenePay
     *
     * @param string $cancelUrl
     *
     * @return $this
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    /**
     * endpoint url on a merchant site used to return a customer after a payment is successfully completed on YenePay
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }
	
	/**
     * endpoint url on a merchant site used to return a customer when a payment fails on YenePay
     *
     * @param string $failureUrl
     *
     * @return $this
     */
    public function setFailureUrl($failureUrl)
    {
        $this->failureUrl = $failureUrl;
        return $this;
    }

    /**
     * endpoint url on a merchant site used to return a customer when a payment fails on YenePay
     *
     * @return string
     */
    public function getFailureUrl()
    {
        return $this->failureUrl;
    }
	
	/**
     * Total VAT amount. Set only for VAT registered merchants
     *
     * @param string $totalItemsTax1
     *
     * @return $this
     */
    public function setTotalItemsTax1($totalItemsTax1)
    {
        $this->totalItemsTax1 = $totalItemsTax1;
        return $this;
    }

    /**
     * Total VAT amount. Set only for VAT registered merchants
     *
     * @return string
     */
    public function getTotalItemsTax1()
    {
        return $this->totalItemsTax1;
    }
	
	/**
     * Total TOT amount. Set only for TOT registered merchants
     *
     * @param string $totalItemsTax2
     *
     * @return $this
     */
    public function setTotalItemsTax2($totalItemsTax2)
    {
        $this->totalItemsTax2 = $totalItemsTax2;
        return $this;
    }

    /**
     * Total TOT amount. Set only for TOT registered merchants
     *
     * @return string
     */
    public function getTotalItemsTax2()
    {
        return $this->totalItemsTax2;
    }
	
	/**
     * Total handling fee for the order
     *
     * @param string $totalItemsHandlingFee
     *
     * @return $this
     */
    public function setTotalItemsHandlingFee($totalItemsHandlingFee)
    {
        $this->totalItemsHandlingFee = $totalItemsHandlingFee;
        return $this;
    }

    /**
     * Total handling fee for the order
     *
     * @return string
     */
    public function getTotalItemsHandlingFee()
    {
        return $this->totalItemsHandlingFee;
    }
	
	/**
     * Total delivery fee for the order
     *
     * @param string $totalItemsDeliveryFee
     *
     * @return $this
     */
    public function setTotalItemsDeliveryFee($totalItemsDeliveryFee)
    {
        $this->totalItemsDeliveryFee = $totalItemsDeliveryFee;
        return $this;
    }

    /**
     * Total delivery fee for the order
     *
     * @return string
     */
    public function getTotalItemsDeliveryFee()
    {
        return $this->totalItemsDeliveryFee;
    }
	
	/**
     * Total discount amount for the order
     *
     * @param string $totalItemsDiscount
     *
     * @return $this
     */
    public function setTotalItemsDiscount($totalItemsDiscount)
    {
        $this->totalItemsDiscount = $totalItemsDiscount;
        return $this;
    }

    /**
     * Total discount amount for the order
     *
     * @return string
     */
    public function getTotalItemsDiscount()
    {
        return $this->totalItemsDiscount;
    }

    /**
     * An all numeral unique seller code used to uniquely identify a merchant on YenePay
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        if(in_array($currency, $this->supported_currencies))
        {
            $this->currency = $currency;
            return $this;
        }
    }

    /**
     * gets the current set currency of the transaction
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
	
	function getAsKeyValue($forCart)
	{
		$dictionary = array(
			"Process" => $this->getProcess(),
			"MerchantId" => $this->getSellerCode(),
			"MerchantOrderId" => $this->getMerchantOrderId(),
			"SuccessUrl" => $this->getSuccessUrl(),
			"CancelUrl" => $this->getCancelUrl(),
			"IPNUrl" => $this->getIPNUrl(),
			"FailureUrl" => $this->getFailureUrl(),
            "Currency" => $this->getCurrency()
		);
		if(null != $this->getExpiresAfter())
			$dictionary["ExpiresAfter"] = $this->getExpiresAfter();
		if($forCart){
			$dictionary["TotalItemsTax1"] = $this->getTotalItemsTax1();
			$dictionary["TotalItemsTax2"] = $this->getTotalItemsTax2();
			$dictionary["TotalItemsHandlingFee"] = $this->getTotalItemsHandlingFee();
			$dictionary["TotalItemsDeliveryFee"] = $this->getTotalItemsDeliveryFee();
			$dictionary["TotalItemsDiscount"] = $this->getTotalItemsDiscount();
		}
		return $dictionary;
	}

	function isvalid()
	{
		
 		if(null != $this->getProcess() && null != $this->getSellerCode())
 			{
 				return true;
 			}
	}
}
?>