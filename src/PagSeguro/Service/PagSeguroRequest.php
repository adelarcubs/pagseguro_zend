<?php
namespace PagSeguro\Service;

use PagSeguro\Options\ModuleOptions;
use PagSeguro\Model\Checkout;
use Zend\Http\Request;
use Zend\Http\Client;

/**
 *
 * @author ajunio6
 *        
 */
class PagSeguroRequest
{

    private $options;

    public function __construct(ModuleOptions $options)
    {
        $this->options = $options;
    }

    public function getResponse(Checkout $checkout)
    {
        $request = new Request();
        $request->getHeaders()->addHeaders(array(
            'Content-Type: application/xml; charset=ISO-8859-1'
        ));
        $request->setUri($this->options->getWsUrl());
        $request->setMethod(Request::METHOD_POST);
        $request->setContent($checkout->parseXML());
        
        $client = new Client();
        $response = $client->dispatch($request);
        
        $xml = '';
        try {
            $xml = simplexml_load_string($response->getBody());
        } catch (\Exception $e) {
            throw new \Exception('Error on parse reponse xml. ' . $response->getBody(), 400, $e);
        }
        if ($xml->code) {
            return $this->options->getPaymentUrl($xml->code);
        } else {
            throw new \Exception('An error has occurred: ' . $response->getBody());
        }
    }
}

