<?php
namespace PagSeguroTest\Model;

use PHPUnit_Framework_TestCase;
use PagSeguro\Model\Item;

class ItemTest extends PHPUnit_Framework_TestCase
{

    public function testItem()
    {
        $item = new Item();
        $this->assertInstanceOf('PagSeguro\Model\Item', $item);
    }
}
