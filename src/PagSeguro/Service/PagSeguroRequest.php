<?php
namespace PagSeguro\Service;

/**
 *
 * @author ajunio6
 *        
 */
class PagSeguroRequest
{

    public function call()
    {
        $email = 'adelarcubs@uol.com.br';
        $token = 'F4D2A532ED93411FAD40EC9C053C8800';
        // $url = 'https://ws.pagseguro.uol.com.br/v2/checkout/?email=' . $email . '&token=' . $token;
        $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/?email=' . $email . '&token=' . $token;
        $xml = '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>
    <checkout>
        <currency>BRL</currency>
        <redirectURL>http://www.minhaloja.com.br/paginaDeRedirecionamento</redirectURL>
        <items>
            <item>
                <id>0001</id>
                <description>Notebook Prata</description>
                <amount>1.00</amount>
                <quantity>1</quantity>
                <weight>1000</weight>
            </item>
            <item>
                <id>0002</id>
                <description>Notebook Rosa</description>
                <amount>2.00</amount>
                <quantity>2</quantity>
                <weight>750</weight>
            </item>
        </items>
        <reference>REF1234</reference>
        <sender>
            <name>José Comprador</name>
            <email>c96008442815175241615@sandbox.pagseguro.com.br</email>
            <phone>
                <areaCode>11</areaCode>
                <number>55663377</number>
            </phone>
        </sender>
        <shipping>
            <type>1</type>
            <address>
                <street>Rua sem nome</street>
                <number>1384</number>
                <complement>5o andar</complement>
                <district>Jardim Paulistano</district>
                <postalCode>01452002</postalCode>
                <city>Sao Paulo</city>
                <state>SP</state>
                <country>BRA</country>
            </address>
        </shipping>
    </checkout>';
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
        echo $xml;
        // if ($xml == 'Unauthorized') {
        // // Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
        
        // header('Location: paginaDeErro.php');
        // exit(); // Mantenha essa linha
        // }
        
        curl_close($curl);
        
        $xml = simplexml_load_string($xml);
        
        return 'Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml->code;
    }
}

