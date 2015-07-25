<?php
namespace PagSeguro\Factory;

use PagSeguro\Options\ModuleOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');
        return new ModuleOptions(isset($config['pag-seguro-config']) ? $config['pag-seguro-config'] : array());
    }
}