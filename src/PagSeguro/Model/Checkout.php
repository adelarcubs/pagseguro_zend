<?php
namespace PagSeguro\Model;

use PagSeguro\Model\Item;
use PagSeguro\Model\Sender;
use PagSeguro\Model\Shipping;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
class Checkout
{

    private $email;

    private $reference;

    private $extraAmount;

    private $redirectURL;

    private $notificationURL;

    private $maxUses;

    private $maxAge;

    private $items;

    private $sender;

    private $shipping;

    public function __construct()
    {
        $this->items = array();
    }

    public function addItem(Item $item)
    {
        $this->items[] = $item;
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
     * @return the $reference
     */
    public function getReference()
    {
        return $this->reference;
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
     * @param field_type $email            
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @param field_type $reference            
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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

    /**
     *
     * @return the $sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     *
     * @return the $shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     *
     * @param field_type $sender            
     */
    public function setSender(Sender $sender)
    {
        $this->sender = $sender;
    }

    /**
     *
     * @param field_type $shipping            
     */
    public function setShipping(Shipping $shipping)
    {
        $this->shipping = $shipping;
    }

    public function parseXML()
    {
        $xml = '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>';
        $xml .= '<checkout>';
        $xml .= '<currency>BRL</currency>';
        
        if ($this->getReference()) {
            $xml .= '<reference>' . $this->getReference() . '</reference>';
        }
        if ($this->getExtraAmount()) {
            $xml .= '<extraAmount>' . $this->getExtraAmount() . '</extraAmount>';
        }
        if ($this->getRedirectURL()) {
            $xml .= '<redirectURL>' . $this->getRedirectURL() . '</redirectURL>';
        }
        if ($this->getNotificationURL()) {
            $xml .= '<notificationURL>' . $this->getNotificationURL() . '</notificationURL>';
        }
        if ($this->getMaxUses()) {
            $xml .= '<maxUses>' . $this->getMaxUses() . '</maxUses>';
        }
        if ($this->getMaxAge()) {
            $xml .= '<maxAge>' . $this->getMaxAge() . '</maxAge>';
        }
        
        if ($this->getEmail()) {
            $xml .= '<receiver>';
            $xml .= '<email>' . $this->getEmail() . '</email>';
            $xml .= '</receiver>';
        }
        $xml .= '<items>';
        foreach ($this->items as $item) {
            $xml .= $item->parseXML();
        }
        $xml .= '</items>';
        
        if ($this->getSender()) {
            $xml .= $this->getSender()->parseXML();
        }
        if ($this->getShipping()) {
            $xml .= $this->getShipping()->parseXML();
        }
        
        $xml .= '</checkout>';
        return $xml;
    }
}

