<?php

namespace YenePay\Models;

/**
 * Class IPN
 *
 * IPN (Instant Payment Notification) details:
 *
 * @package YenePay\Models
 *
 * @property string totalAmount
 * @property string name
 * @property string price
 * @property string quantity
 * @property string deliveryFee
 * @property string tax1
 * @property string tax2
 * @property string discount
 * @property string handlingFee
 */
 
class IPN
{
	private  $totalAmount;
	private  $buyerId;
	private  $buyerName;
	private  $transactionFee;
	private  $merchantOrderId;
	private  $merchantId;
	private  $merchantCode;
	private  $transactionId;
	private  $status;
	private  $statusDescription;
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
     * The customer's name
     *
     * @param string $buyerName
     *
     * @return $this
     */
    public function setBuyerName($buyerName)
    {
        $this->buyerName = $buyerName;
        return $this;
    }

    /**
     * The customer's name
     *
     * @return string
     */
    public function getBuyerName()
    {
        return $this->buyerName;
    }
	
	/**
     * The service fee charged by YenePay for the transaction
     *
     * @param string $transactionFee
     *
     * @return $this
     */
    public function setTransactionFee($transactionFee)
    {
        $this->transactionFee = $transactionFee;
        return $this;
    }

    /**
     * The service fee charged by YenePay for the transaction
     *
     * @return string
     */
    public function getTransactionFee()
    {
        return $this->transactionFee;
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
     * Description of the order status
     *
     * @param string $statusDescription
     *
     * @return $this
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    /**
     * Description of the order status
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
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
		if(null != $this->getBuyerName())
			$dictionary["BuyerName"] = $this->getBuyerName();
		if(null != $this->getTransactionFee())
			$dictionary["TransactionFee"] = $this->getTransactionFee();
		if(null != $this->getMerchantOrderId())
			$dictionary["MerchantOrderId"] = $this->getMerchantOrderId();
		if(null != $this->getMerchantId())
			$dictionary["MerchantId"] = $this->getMerchantId();
		if(null != $this->getMerchantCode())
			$dictionary["MerchantCode"] = $this->getMerchantCode();
		if(null != $this->getTransactionId())
			$dictionary["TransactionId"] = $this->getTransactionId();
		if(null != $this->getStatus())
			$dictionary["Status"] = $this->getStatus();
		if(null != $this->getStatusDescription())
			$dictionary["StatusDescription"] = $this->getStatusDescription();
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