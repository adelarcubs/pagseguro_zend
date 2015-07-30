<?php
namespace PagSeguro\Service;

use PagSeguro\Options\ModuleOptions;
use Zend\Http\Request;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
class TransactionRequest
{

    private $options;

    public function __construct(ModuleOptions $options)
    {
        $this->options = $options;
    }

    public function send($transactionId)
    {
        $url = $this->options->getWsUrl() . '/v3/transactions/notifications/' . $transactionId . $this->options->getAcess();
        $method = Request::METHOD_GET;
        $params = array();
        $headers = array(
            'Content-Type: application/xml; charset=ISO-8859-1'
        );
        
        // if ($response->getBody() == 'Unauthorized') {
        // throw new \Exception('Unauthorized access to PagSeguro');
        // }
        return PagSeguroRequest::send($url, $method, $params, $headers);
    }
}

