<?php
namespace PagSeguroTest;

use PHPUnit_Framework_TestCase;
use PagSeguro\Model\PagSeguroCheckout;
use PagSeguro\Model\Item;
use PagSeguro\Service\PagSeguroRequest;

class IntegratedTest extends PHPUnit_Framework_TestCase
{

    public function testPagSeguroCheckout()
    {
        $pagSeguroCheckout = new PagSeguroCheckout();
        
        $pagSeguroCheckout->addItem(new Item('001', 'Plano 1', 1, 12.9));
        
        $this->assertInstanceOf('PagSeguro\Model\PagSeguroCheckout', $pagSeguroCheckout);
        
        $this->assertEquals('BRL', $pagSeguroCheckout->getCurrency());
        $request = new PagSeguroRequest();
        $request->call();
    }
}
