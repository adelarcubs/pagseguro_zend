<?php
namespace PagSeguro\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{

    protected $isSendBox = false;

    protected $email;

    protected $token;

    /**
     *
     * @return the $isSendBox
     */
    public function getIsSendBox()
    {
        return $this->isSendBox;
    }

    /**
     *
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @return the $token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     *
     * @param boolean $isSendBox            
     */
    public function setIsSendBox($isSendBox)
    {
        $this->isSendBox = $isSendBox;
    }

    /**
     *
     * @param field_type $email            
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @param field_type $token            
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    private function getUrl()
    {
        $url = 'pagseguro.uol.com.br';
        if ($this->isSendBox) {
            $url = 'sandbox.pagseguro.uol.com.br';
        }
        return $url;
    }

    public function getWsUrl()
    {
        return 'https://ws.' . $this->getUrl() . '/v2/checkout/?email=' . $this->getEmail() . '&token=' . $this->getToken();
    }

    public function getPaymentUrl($code)
    {
        return 'https://' . $this->getUrl() . '/v2/checkout/payment.html?code=' . $code;
    }
}