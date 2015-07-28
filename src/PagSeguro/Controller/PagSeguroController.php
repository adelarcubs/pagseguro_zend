<?php
namespace PagSeguro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PagSeguroController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel(array());
    }
}

