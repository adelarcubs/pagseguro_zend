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
        if (! $checkout->getEmail() && $this->options->getEmail()) {
            $checkout->setEmail($this->options->getEmail());
        }
        if (! $checkout->getExtraAmount() && $this->options->getExtraAmount()) {
            $checkout->setExtraAmount($this->options->getExtraAmount());
        }
        if (! $checkout->getMaxAge() && $this->options->getMaxAge()) {
            $checkout->setMaxAge($this->options->getMaxAge());
        }
        if (! $checkout->getMaxUses() && $this->options->getMaxUses()) {
            $checkout->setMaxUses($this->options->getMaxUses());
        }
        if (! $checkout->getNotificationURL() && $this->options->getNotificationURL()) {
            $checkout->setNotificationURL($this->options->getNotificationURL());
        }
        if (! $checkout->getRedirectURL() && $this->options->getRedirectURL()) {
            $checkout->setRedirectURL($this->options->getRedirectURL());
        }
        
        $code = $this->send($checkout);
        
        return $this->options->getPaymentUrl($code);
    }

    private function send(Checkout $checkout)
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
        
        if ($response->getBody() == 'Unauthorized') {
            throw new \Exception('Unauthorized access to PagSeguro');
        }
        
        $xml = '';
        try {
            $xml = simplexml_load_string($response->getBody());
        } catch (\Exception $e) {
            throw new \Exception('Error on parse reponse xml. ' . $response->getBody(), 500, $e);
        }
        if ($xml->code) {
            return $xml->code;
        }
        throw new \Exception('An error has occurred: ' . $response->getBody());
    }
}

