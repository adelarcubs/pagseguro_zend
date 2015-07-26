<?php
namespace PagSeguroTest\Model;

use PHPUnit_Framework_TestCase;
use PagSeguro\Model\Checkout;

class CheckoutTest extends PHPUnit_Framework_TestCase
{

    public function testCheckout()
    {
        $checkout = new Checkout();
        $this->assertInstanceOf('PagSeguro\Model\Checkout', $checkout);
    }
}
