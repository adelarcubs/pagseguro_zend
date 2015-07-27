<?php
namespace PagSeguro\Model;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
class Item
{

    private $id;

    private $description;

    private $amount;

    private $quantity;

    private $shippingCost;

    private $weight;

    public function __construct($id, $description, $quantity, $amount, $weight = null, $shippingCost = null)
    {
        $this->id = $id;
        $this->description = $description;
        $this->amount = $amount;
        $this->quantity = $quantity;
        
        $this->setWeight($weight);
        $this->setShippingCost($shippingCost);
    }

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return the $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     *
     * @return the $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     *
     * @return the $shippingCost
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     *
     * @return the $weight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     *
     * @param field_type $shippingCost            
     */
    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;
    }

    /**
     *
     * @param field_type $weight            
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function parseXML()
    {
        $xml = '<item>';
        $xml .= '<id>' . $this->getId() . '</id>';
        $xml .= '<description>' . $this->getDescription() . '</description>';
        $xml .= '<quantity>' . $this->getQuantity() . '</quantity>';
        $xml .= '<amount>' . number_format($this->getAmount(), 2) . '</amount>';
        
        if ($this->getWeight()) {
            $xml .= '<weight>' . $this->getWeight() . '</weight>';
        }
        if ($this->getShippingCost()) {
            $xml .= '<shippingCost>' . $this->getShippingCost() . '</shippingCost>';
        }
        
        $xml .= '</item>';
        return $xml;
    }
}

