<?php
namespace PagSeguro\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{

    protected $isSendBox = false;

    protected $email;

    protected $token;

    protected $extraAmount;

    protected $redirectURL;

    protected $notificationURL;

    protected $maxUses;

    protected $maxAge;

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
     * @return the $extraAmount
     */
    public function getExtraAmount()
    {
        return $this->extraAmount;
    }

    /**
     *
     * @return the $redirectURL
     */
    public function getRedirectURL()
    {
        return $this->redirectURL;
    }

    /**
     *
     * @return the $notificationURL
     */
    public function getNotificationURL()
    {
        return $this->notificationURL;
    }

    /**
     *
     * @return the $maxUses
     */
    public function getMaxUses()
    {
        return $this->maxUses;
    }

    /**
     *
     * @return the $maxAge
     */
    public function getMaxAge()
    {
        return $this->maxAge;
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

    /**
     *
     * @param field_type $extraAmount            
     */
    public function setExtraAmount($extraAmount)
    {
        $this->extraAmount = $extraAmount;
    }

    /**
     *
     * @param field_type $redirectURL            
     */
    public function setRedirectURL($redirectURL)
    {
        $this->redirectURL = $redirectURL;
    }

    /**
     *
     * @param field_type $notificationURL            
     */
    public function setNotificationURL($notificationURL)
    {
        $this->notificationURL = $notificationURL;
    }

    /**
     *
     * @param field_type $maxUses            
     */
    public function setMaxUses($maxUses)
    {
        $this->maxUses = $maxUses;
    }

    /**
     *
     * @param field_type $maxAge            
     */
    public function setMaxAge($maxAge)
    {
        $this->maxAge = $maxAge;
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

    public function getAcess()
    {
        return '?email=' . $this->getEmail() . '&token=' . $this->getToken();
    }

    public function getTransactionUrl($transactionId)
    {
        return 'https://ws' . $this->getUrl() . '/v3/transactions/notifications/' . $transactionId . $this->getAcess();
    }
}