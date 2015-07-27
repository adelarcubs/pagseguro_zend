<?php
namespace PagSeguro\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use PagSeguro\Service\PagSeguroRequest;

class PagSeguroRequestFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $moduleOptions = $serviceLocator->get('PagSeguro-ModuleOptions');
        return new PagSeguroRequest($moduleOptions);
    }
}

