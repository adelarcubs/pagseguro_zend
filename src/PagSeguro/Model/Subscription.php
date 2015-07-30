<?php
namespace PagSeguro\Model;

class Subscription implements ModelInterface
{

    private $preapproval;

    private $sender;

    private $reference;

    /**
     *
     * @return the $preapproval
     */
    public function getPreapproval()
    {
        return $this->preapproval;
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
     * @return the $reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     *
     * @param field_type $preapproval            
     */
    public function setPreapproval(PreApproval $preapproval)
    {
        $this->preapproval = $preapproval;
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
     * @param field_type $reference            
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function parseXML()
    {
        $xml = '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>';
        $xml .= '<preApprovalRequest>';
        $xml .= '<reference>' . $this->getReference() . '</reference>';
        if ($this->getSender()) {
            $xml .= $this->getSender()->parseXML();
        }
        if ($this->getPreapproval()) {
            $xml .= $this->getPreapproval()->parseXML();
        }
        $xml .= '</preApprovalRequest>';
        return $xml;
    }
}

