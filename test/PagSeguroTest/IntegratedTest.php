<?php
namespace PagSeguroTest;

use PHPUnit_Framework_TestCase;
use PagSeguro\Model\Checkout;
use PagSeguro\Model\Item;
use PagSeguro\Model\Sender;
use PagSeguro\Model\Shipping;
use PagSeguro\Options\ModuleOptions;
use PagSeguro\Service\PagSeguroRequest;

class IntegratedTest extends PHPUnit_Framework_TestCase
{

    public function testIntegrated()
    {
        $checkout = new Checkout();
        
        $checkout->addItem(new Item('001', 'Plano 1', 1, 12.9));
        $checkout->addItem(new Item('002', 'Plano 2', 1, 99.9));
        
        $sender = new Sender('adelar@adelarcubs.com', 'Adelar Tiemann Junior');
        $sender->setBornDate(new \DateTime('1990-07-05'));
        
        $checkout->setSender($sender);
        
        $shipping = new Shipping(1, 12.9);
        $shipping->setAddress('SC', 'Joinville', 12345678, 'Anita Garilbaldi', 'AAAAAAA', 123, 'casa');
        
        $checkout->setShipping($shipping);
        
        $module = new ModuleOptions();
        $module->setIsSendBox(true);
        $module->setEmail('adelarcubs@uol.com.br');
        $module->setToken('é para dar erro');
        $request = new PagSeguroRequest($module);
        
        $this->setExpectedException('\Exception');
        
        $request->getResponse($checkout);
    }
}
