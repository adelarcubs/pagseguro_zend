<?php
namespace PagSeguroTest\Model;

use PHPUnit_Framework_TestCase;
use PagSeguro\Model\PagSeguroCheckout;

class PagSeguroCheckoutTest extends PHPUnit_Framework_TestCase
{

    public function testPagSeguroCheckout()
    {
        $pagSeguroCheckout = new PagSeguroCheckout();
        $this->assertInstanceOf('PagSeguro\Model\PagSeguroCheckout', $pagSeguroCheckout);
        
        $this->assertEquals('BRL', $pagSeguroCheckout->getCurrency());
    }
}
