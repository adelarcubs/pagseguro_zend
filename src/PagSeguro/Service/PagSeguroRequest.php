<?php
namespace PagSeguro\Service;

use PagSeguro\Options\ModuleOptions;
use PagSeguro\Model\Checkout;

/**
 *
 * @author ajunio6
 *        
 */
class PagSeguroRequest
{

    private $options;

    private $checkout;

    public function __construct(ModuleOptions $options)
    {
        $this->options = $options;
    }

    public function setCheckout(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    public function call()
    {
        $email = $this->options->email;
        $token = $this->options->token;
        
        $url = $this->options->getUrl() . '/?email=' . $email . '&token=' . $token;
        $xml = $this->checkout->parseXML();
        
        // echo 'begin';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, Array(
            'Content-Type: application/xml; charset=ISO-8859-1'
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
        // echo 'call';
        // echo "\n\n";
        $xml = curl_exec($curl);
        // echo "\n\n";
        // echo $xml;
        // if ($xml == 'Unauthorized') {
        // // Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
        
        // header('Location: paginaDeErro.php');
        // exit(); // Mantenha essa linha
        // }
        
        curl_close($curl);
        
        $xml = simplexml_load_string($xml);
        return $this->options->getUrl() . '/payment.html?code=' . $xml->code;
    }
}

