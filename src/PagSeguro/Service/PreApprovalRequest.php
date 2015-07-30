<?php
namespace PagSeguro\Service;

class PreApprovalRequest
{

    private $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function send(ModelInterface $model)
    {
        $url = $this->options->getWsUrl() . '/v2/pre-approvals/request' . $this->options->getAcess();
        $method = Request::METHOD_POST;
        $params = array();
        $headers = array(
            'Content-Type' => 'application/xml; charset=ISO-8859-1'
        );
        $body = $model->parseXML();
        
        return PagSeguroRequest::send($url, $method, $params, $headers, $body);
    }
}

