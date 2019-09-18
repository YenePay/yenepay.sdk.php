<?php

namespace YenePay\Models;

/**
 * Class IPN
 *
 * IPN (Instant Payment Notification) details:
 *
 * @package YenePay\Models
 */
 
class IPN
{
	private  $totalAmount;
	private  $buyerId;
	private  $merchantOrderId;
	private  $merchantId;
	private  $merchantCode;
	private  $transactionId;
	private  $transactionCode;
	private  $status;
	private  $currency;
	private  $signature;
	private  $useSandbox;
	
		
	function __construct()
	{

	}
		
	/**
     * Total amount paid
     *
     * @param string $totalAmount
     *
     * @return $this
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * Total amount paid
     *
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }
	
	/**
     * The customer's id on YenePay
     *
     * @param string $buyerId
     *
     * @return $this
     */
    public function setBuyerId($buyerId)
    {
        $this->buyerId = $buyerId;
        return $this;
    }

    /**
     * The customer's id on YenePay
     *
     * @return string
     */
    public function getBuyerId()
    {
        return $this->buyerId;
    }
		
	/**
     * Id that identifies the order on the merchant application
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
     * Id that identifies the order on the merchant application
     *
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }
	
	/**
     * The merchant's id on YenePay
     *
     * @param string $merchantId
     *
     * @return $this
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    /**
     * The merchant's id on YenePay
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }
	
	/**
     * an identifier for the merchant assigned by YenePay
     *
     * @param string $merchantCode
     *
     * @return $this
     */
    public function setMerchantCode($merchantCode)
    {
        $this->merchantCode = $merchantCode;
        return $this;
    }

    /**
     * an identifier for the merchant assigned by YenePay
     *
     * @return string
     */
    public function getMerchantCode()
    {
        return $this->merchantCode;
    }
	
	/**
     * an identifier for the payment order assigned by YenePay
     *
     * @param string $transactionId
     *
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * an identifier for the payment order assigned by YenePay
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }
	
	public function setTransactionCode($transactionCode)
    {
        $this->transactionCode = $transactionCode;
        return $this;
    }

    /**
     * an order code for the payment order assigned by YenePay
     *
     * @return string
     */
    public function getTransactionCode()
    {
        return $this->transactionCode;
    }
	
	/**
     * Order status value for the payment
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Order status value for the payment
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
	
	/**
     * Currency code used for payment
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Currency code used for payment
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
	
	/**
     * digital signature of the ipn
     *
     * @param string $signature
     *
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * digital signature of the ipn
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }
	
	/**
     * Use sandbox application or production server
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
     * Use sandbox application or production server
     *
     * @return string
     */
    public function getUseSandbox()
    {
        return $this->useSandbox;
    }

	public function getAsKeyValue()
	{
		$dictionary = array();
		if(null != $this->getTotalAmount())
			$dictionary["TotalAmount"] = $this->getTotalAmount();
		if(null != $this->getBuyerId())
			$dictionary["BuyerId"] = $this->getBuyerId();		
		if(null != $this->getMerchantOrderId())
			$dictionary["MerchantOrderId"] = $this->getMerchantOrderId();
		if(null != $this->getMerchantCode())
			$dictionary["MerchantCode"] = $this->getMerchantCode();
		if(null != $this->getMerchantId())
			$dictionary["MerchantId"] = $this->getMerchantId();
		if(null != $this->getTransactionCode())
			$dictionary["TransactionCode"] = $this->getTransactionCode();
		if(null != $this->getTransactionId())
			$dictionary["TransactionId"] = $this->getTransactionId();
		if(null != $this->getStatus())
			$dictionary["Status"] = $this->getStatus();		
		if(null != $this->getCurrency())
			$dictionary["Currency"] = $this->getCurrency();
		if(null != $this->getSignature())
			$dictionary["Signature"] = $this->getSignature();
		if(null != $this->getUseSandbox())
			$dictionary["UseSandbox"] = $this->getUseSandbox();
		
		return $dictionary;
	}
}

?>