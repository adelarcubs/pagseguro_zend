<?php
namespace PagSeguro\Service;

use Zend\Http\Request;
use Zend\Http\Client;

class TransactionRequest
{

    public function send($url)
    {
        $request = new Request();
        $request->getHeaders()->addHeaders(array(
            'Content-Type: application/xml; charset=ISO-8859-1'
        ));
        $request->setUri($url);
        $request->setMethod(Request::METHOD_GET);
        // $request->setContent($checkout->parseXML());
        
        $client = new Client();
        $response = $client->dispatch($request);
        
        if ($response->getBody() == 'Unauthorized') {
            throw new \Exception('Unauthorized access to PagSeguro');
        }
        
        return simplexml_load_string($response->getBody());
    }
}

