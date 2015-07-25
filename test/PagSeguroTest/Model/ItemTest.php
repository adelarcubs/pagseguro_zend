<?php
namespace PagSeguroTest\Model;

use PHPUnit_Framework_TestCase;
use PagSeguro\Model\Item;

class ItemTest extends PHPUnit_Framework_TestCase
{

    public function testItem()
    {
        $item = new Item('001', 'Plano 1', 1, 123.45);
        $this->assertInstanceOf('PagSeguro\Model\Item', $item);
        
        $this->assertEquals('001', $item->getId());
        $this->assertEquals('Plano 1', $item->getDescription());
        $this->assertEquals(1, $item->getQuantity());
        $this->assertEquals(123.45, $item->getAmount());
    }
}
