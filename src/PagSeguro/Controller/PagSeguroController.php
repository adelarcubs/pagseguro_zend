<?php
namespace PagSeguro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use PagSeguro\Options\ModuleOptions;

class PagSeguroController extends AbstractActionController
{

    private $options;

    public function __construct(ModuleOptions $options)
    {
        $this->options = $options;
    }

    public function notificationAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $data = $request->getPost();
            
            $notificationCode = $data['notificationCode'];
            $notificationType = $data['notificationType'];
            $notificationRequest = $this->getServiceLocator()->get('PagSeguro-NotificationRequest');
            
            $xml = $notificationRequest->send($notificationCode, $notificationType);
            if ($notificationType == 'transaction') {
                $transactionProcess = $this->getServiceLocator()->get($this->options->getTransactionProcessClassFactory());
                $transactionProcess->process($xml);
            }
        }
        $this->getResponse()->setStatusCode(200);
        
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        
        return $viewModel;
    }
}

