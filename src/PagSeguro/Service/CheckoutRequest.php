<?php
namespace PagSeguro\Service;

use PagSeguro\Options\ModuleOptions;
use Zend\Http\Request;
use PagSeguro\Model\ModelInterface;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
class CheckoutRequest implements RequestInterface
{

    private $options;

    public function __construct(ModuleOptions $options)
    {
        $this->options = $options;
    }

    public function send(ModelInterface $model)
    {
        $url = $this->options->getWsUrl() . '/v2/checkout/' . $this->options->getAcess();
        $method = Request::METHOD_POST;
        $params = array();
        $headers = array(
            'Content-Type' => 'application/x-www-form-urlencoded; charset=ISO-8859-1'
        );
        $body = $model->parseXML();
        
        return PagSeguroRequest::send($url, $method, $params, $headers, $body);
    }
}

