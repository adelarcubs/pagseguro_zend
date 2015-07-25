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

    private $quantity;

    private $amount;

    public function __construct($id, $description, $quantity, $amount)
    {
        $this->id = $id;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->amount = $amount;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
            'amount' => $this->getAmount()
        );
    }
}

