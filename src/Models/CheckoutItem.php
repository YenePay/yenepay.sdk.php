<?php

namespace YenePay\Models;

/**
 * Class CheckoutItem
 *
 * CheckoutItem details:
 *
 * @package YenePay\Models
 *
 * @property string id
 * @property string name
 * @property string price
 * @property string quantity
 * @property string deliveryFee
 * @property string tax1
 * @property string tax2
 * @property string discount
 * @property string handlingFee
 */
class CheckoutItem
{
	private  $id;
	private  $name;
	private  $price;
	private  $quantity;
	private  $deliveryFee;
	private  $tax1;
	private  $tax2;
	private  $discount;
	private  $handlingFee;
	
	function __construct()
	{
		$a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
	}
	
	function __construct3($itemName, $price, $quantity)
	{
		$this->name = $itemName;
		$this->price = $price;
		$this->quantity = $quantity;
	}
	
	function __construct9($itemId, $itemName, $price, $quantity, $deliveryFee, $tax1, $tax2, $discount, $handlingFee)
	{
		$this->id = $itemId;
		$this->name = $itemName;
		$this->price = $price;
		$this->quantity = $quantity;
		$this->deliveryFee = $deliveryFee;
		$this->tax1 = $tax1;
		$this->tax2 = $tax2;
		$this->discount = $discount;
		$this->handlingFee = $handlingFee;
	}
	
	/**
     * Unique identifier of the item.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Unique identifier of the item.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
	
	/**
     * Name of the item.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Name of the item.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
	
	/**
     * Unit price of the item.
     *
     * @param string $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Unit price of the item.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
	
	/**
     * Total quantity of the item.
     *
     * @param string $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Total quantity of the item.
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
	
	/**
     * Delivery fee for the item. Applicable for single item.
     *
     * @param string $deliveryFee
     *
     * @return $this
     */
    public function setDeliveryFee($deliveryFee)
    {
        $this->deliveryFee = $deliveryFee;
        return $this;
    }

    /**
     * Delivery fee for the item. Applicable for single item.
     *
     * @return string
     */
    public function getDeliveryFee()
    {
        return $this->deliveryFee;
    }
	
	/**
     * VAT amount. Set only for VAT registered merchants
     *
     * @param string $tax1
     *
     * @return $this
     */
    public function setTax1($tax1)
    {
        $this->tax1 = $tax1;
        return $this;
    }

    /**
     * VAT amount. Set only for VAT registered merchants
     *
     * @return string
     */
    public function getTax1()
    {
        return $this->tax1;
    }
	
	/**
     * Turn Over Tax (TOT) amount. Set only for TOT registered merchants
     *
     * @param string $tax2
     *
     * @return $this
     */
    public function setTax2($tax2)
    {
        $this->tax2 = $tax2;
        return $this;
    }

    /**
     * Turn Over Tax (TOT) amount. Set only for TOT registered merchants
     *
     * @return string
     */
    public function getTax2()
    {
        return $this->tax2;
    }
	
	/**
     * Discount amount on item (if applicable)
     *
     * @param string $discount
     *
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Discount amount on item (if applicable)
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }
	
	/**
     * Additional fee for handling (if applicable)
     *
     * @param string $handlingFee
     *
     * @return $this
     */
    public function setHandlingFee($handlingFee)
    {
        $this->handlingFee = $handlingFee;
        return $this;
    }

    /**
     * Additional fee for handling (if applicable)
     *
     * @return string
     */
    public function getHandlingFee()
    {
        return $this->handlingFee;
    }
	
	/**
     * generates a key-value pair array of a CheckoutItem object
     *
	 * @param array $dictionary
	 *
     * @return array
     */
	public function getAsKeyValue($dictionary)
	{
		if(!isset($dictionary))
			$dictionary = array();
		$dictionary["ItemId"] = $this->getId();
		$dictionary["ItemName"] = $this->getName();
		$dictionary["UnitPrice"] = $this->getPrice();
		$dictionary["Quantity"] = $this->getQuantity();
		if(null != $this->getDiscount())
			$dictionary["Discount"] = $this->getDiscount();
		if(null != $this->getHandlingFee())
			$dictionary["HandlingFee"] = $this->getHandlingFee();
		if(null != $this->getDeliveryFee())
			$dictionary["DeliveryFee"] = $this->getDeliveryFee();
		if(null != $this->getTax1())
			$dictionary["Tax1"] = $this->getTax1();
		if(null != $this->getTax2())
			$dictionary["Tax2"] = $this->getTax2();
		return $dictionary;
	}
	
	/**
     * generates a CheckoutItem object from a key-value pair array.
     *
	 * @param array $itemArray
	 *
     * @return CheckoutItem object
     */
	public function getFromArray($itemArray)
	{
		$this->setId($itemArray["ItemId"]);
		$this->setName($itemArray["ItemName"]);
		$this->setPrice($itemArray["UnitPrice"]);
		$this->setQuantity($itemArray["Quantity"]);
		if(isset($itemArray["DeliveryFee"]))
			$this->setDeliveryFee($itemArray["DeliveryFee"]);
		if(isset($itemArray["Tax1"]))
			$this->setTax1($itemArray["Tax1"]);
		if(isset($itemArray["Tax2"]))
			$this->setTax2($itemArray["Tax2"]);
		if(isset($itemArray["Discount"]))
			$this->setDiscount($itemArray["Discount"]);
		if(isset($itemArray["HandlingFee"]))
			$this->setHandlingFee($itemArray["HandlingFee"]);
		return $this;
	}
}
?>