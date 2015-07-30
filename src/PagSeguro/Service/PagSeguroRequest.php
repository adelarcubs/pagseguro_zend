<?php
namespace PagSeguro\Service;

use Zend\Http\Request;
use Zend\Http\Client;

/**
 *
 * @author ajunio6
 *        
 */
class PagSeguroRequest
{

    public static function send($url, $method, $params, $headers = array(), $body = null)
    {
        if (empty($url)) {
            return false;
        }
        
        $request = new Request();
        $request->setUri($url);
        $request->setMethod($method);
        
        if (! empty($params) && is_array($params)) {
            $request->getPost()->fromArray($params);
        }
        
        if (! empty($headers) && is_array($headers)) {
            $request->getHeaders()->addHeaders($headers);
        }
        
        if (! empty($body)) {
            $request->setContent($body);
        }
        // $client = new Client(null, $clientOptions);
        $client = new Client();
        $client->setOptions(array(
            'sslverifypeer' => false
        ));
        return $client->send($request);
    }
}

