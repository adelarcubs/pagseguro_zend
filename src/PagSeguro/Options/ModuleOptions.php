<?php
namespace PagSeguro\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{

    protected $isSendBox = false;

    protected $email;

    protected $token;

    public function getUrl()
    {
        $url = 'ws.pagseguro.uol.com.br';
        if ($this->isSendBox) {
            $url = 'ws.sandbox.pagseguro.uol.com.br';
        }
        return 'https://' . $url . '/v2/checkout';
    }
}