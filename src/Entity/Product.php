<?php
namespace Via\Entity;

class Product
{
    use HasEntityTrait;

    private $title = null;
    private $description = null;
    private $stockAmount = 0;
    private $price = 0.00;
    private $productType = 0;
    private $unitQuantity = null;
    private $unitType = null;
    private $ean = null;
    private $isbn = null;
    private $upc = null;
    private $disableAutomatch = false;
    private $conditionId = null;
    private $shortDescription = null;
    private $foreignId = null;
    private $bestOfferAutoAcceptPrice = 0.00;
    private $bestOfferMinimumPrice = 0.00;
    private $externalProductId = null;
    private $mpn = null;
    private $brand = null;
    private static $instance = null;
    
    /**
     *
     * @return String $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @param String $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param String $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @return Integer
     */
    public function getStockAmount()
    {
        return $this->stockAmount;
    }

    /**
     *
     * @param Integer $stockAmount
     */
    public function setStockAmount($stockAmount)
    {
        $this->stockAmount = $stockAmount;
        return $this;
    }

    /**
     *
     * @return Float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     *
     * @param Float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     *
     * @return Boolean
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     *
     * @param Boolean $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
        return $this;
    }    

    /**
     *
     * @return Float
     */
    public function getUnitQuantity()
    {
        return $this->unitQuantity;
    }

    /**
     *
     * @param Float $unitQuantity
     */
    public function setUnitQuantity($unitQuantity)
    {
        $this->unitQuantity = $unitQuantity;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getUnitType()
    {
        return $this->unitType;
    }

    /**
     *
     * @param String $unitType
     */
    public function setUnitType($unitType)
    {
        $this->unitType = $unitType;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     *
     * @param String $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     *
     * @return Boolean
     */
    public function getDisableAutomatch()
    {
        return $this->disableAutomatch;
    }

    /**
     *
     * @param Boolean $disableAutomatch
     */
    public function setDisableAutomatch($disableAutomatch)
    {
        $this->disableAutomatch = $disableAutomatch;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getConditionId()
    {
        return $this->conditionId;
    }

    /**
     *
     * @param String $conditionId
     */
    public function setConditionId($conditionId)
    {
        $this->conditionId = $conditionId;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     *
     * @param String $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getForeignId()
    {
        return $this->foreignId;
    }

    /**
     *
     * @param String $foreignId
     */
    public function setForeignId($foreignId)
    {
        $this->foreignId = $foreignId;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     *
     * @param String $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
        return $this;
    }

    /**
     *
     * @return String
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     *
     * @param String $upc
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
        return $this;
    }

    /**
     *
     * @return Float
     */
    public function getBestOfferAutoAcceptPrice()
    {
        return $this->bestOfferAutoAcceptPrice;
    }

    /**
     *
     * @param Float $price
     */
    public function setBestOfferAutoAcceptPrice($price)
    {
        $this->bestOfferAutoAcceptPrice = $price;
        return $this;
    }

    /**
     *
     * @return Float
     */
    public function getBestOfferMinimumPrice()
    {
        return $this->bestOfferMinimumPrice;
    }

    /**
     *
     * @param Float $price
     */
    public function setBestOfferMinimumPrice($price)
    {
        $this->bestOfferMinimumPrice = $price;
        return $this;
    }

    /**
     * Get the value of mpn
     *
     * @return String
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * Set the value of mpn
     *
     * @param String $mpn
     *
     * @return self
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * Get the value of brand
     *
     * @return String
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @param String $brand
     *
     * @return self
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Get the value of ExternalProductId
     *
     * @return Integer
     */
    public function getExternalProductId()
    {
        return $this->externalProductId;
    }

    /**
     * Set the value of brand
     *
     * @param Integer $id
     *
     * @return self
     */
    public function setExternalProductId($id)
    {
        $this->externalProductId = $id;
        return $this;
    }    
}
