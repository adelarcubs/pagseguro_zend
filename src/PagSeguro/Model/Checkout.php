<?php
namespace PagSeguro\Model;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
class Checkout
{

    private $items;

    public function __construct()
    {
        $this->items = array();
    }

    public function getCurrency()
    {
        return 'BRL';
    }

    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

    public function toArray()
    {
        return array(
            'currency' => $this->getCurrency()
        );
    }
}

