<?php
namespace PagSeguro\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use PagSeguro\Controller\PagSeguroController;

class PagSeguroControllerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $moduleOptions = $serviceLocator->getServiceLocator()->get('PagSeguro-ModuleOptions');
        return new PagSeguroController($moduleOptions);
    }
}

