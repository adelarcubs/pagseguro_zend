<?php
namespace PagSeguro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use PagSeguro\Options\ModuleOptions;
use PagSeguro\Service\TransactionRequest;
use PagSeguro\Model\Transaction;

class PagSeguroController extends AbstractActionController
{

    private $options;

    public function __construct(ModuleOptions $options)
    {
        $this->options = $options;
    }

    public function indexAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $data = $request->getPost();
            
            if ($data['notificationType'] == 'transaction') {
                $notificationCode = $data['notificationCode'];
                
                $transactionProcess = $this->getServiceLocator()->get($this->options->getTransactionProcessClassFactory());
                $transactionProcess->process($notificationCode);
            }
        }
        $this->getResponse()->setStatusCode(200);
        
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        
        return $viewModel;
    }
}

