<?php
namespace PagSeguro\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{

    protected $isSendBox = false;

    protected $email;

    protected $tokenProduction;

    protected $tokenSendBox;

    protected $extraAmount;

    protected $redirectURL;

    protected $notificationURL;

    protected $maxUses;

    protected $maxAge;

    protected $transactionProcessClassFactory;

    /**
     *
     * @return the $transactionProcessClassFactory
     */
    public function getTransactionProcessClassFactory()
    {
        return $this->transactionProcessClassFactory;
    }

    /**
     *
     * @param field_type $transactionProcessClass            
     */
    public function setTransactionProcessClassFactory($transactionProcessClassFactory)
    {
        $this->transactionProcessClassFactory = $transactionProcessClassFactory;
    }

    /**
     *
     * @return the $tokenProduction
     */
    public function getTokenProduction()
    {
        return $this->tokenProduction;
    }

    /**
     *
     * @param field_type $tokenProduction            
     */
    public function setTokenProduction($tokenProduction)
    {
        $this->tokenProduction = $tokenProduction;
    }

    /**
     *
     * @return the $tokenSendBox
     */
    public function getTokenSendBox()
    {
        return $this->tokenSendBox;
    }

    /**
     *
     * @param field_type $tokenSendBox            
     */
    public function setTokenSendBox($tokenSendBox)
    {
        $this->tokenSendBox = $tokenSendBox;
    }

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

    public function getToken()
    {
        if ($this->getIsSendBox()) {
            return $this->getTokenSendBox();
        }
        return $this->getTokenProduction();
    }

    private function getUrl($https = true)
    {
        $url = 'pagseguro.uol.com.br';
        if ($this->isSendBox) {
            $url = 'sandbox.' . $url;
        }
        if ($https) {
            $url = 'https://' . $url;
        }
        return $url;
    }

    public function getWsUrl()
    {
        return 'https://ws.' . $this->getUrl(false);
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
        return 'https://ws.' . $this->getUrl() . '/v3/transactions/notifications/' . $transactionId . $this->getAcess();
    }
}