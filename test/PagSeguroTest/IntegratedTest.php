<?php
namespace PagSeguroTest;

use PHPUnit_Framework_TestCase;
use PagSeguro\Model\Checkout;
use PagSeguro\Model\Item;
use PagSeguro\Service\PagSeguroRequest;

class IntegratedTest extends PHPUnit_Framework_TestCase
{

    public function testIntegrated()
    {
        $checkout = new Checkout();
        
        $checkout->addItem(new Item('001', 'Plano 1', 1, 12.9));
        
        $this->assertInstanceOf('PagSeguro\Model\Checkout', $checkout);
        
        $this->assertEquals('BRL', $checkout->getCurrency());
        $request = new PagSeguroRequest();
        $request->call();
    }
}
