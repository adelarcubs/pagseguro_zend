<?php
namespace PagSeguro\Model;

use Zend\Json\Json;

class Transaction
{

    private $code;

    private $reference;

    private $type;

    private $status;

    private $cancellationSource;

    public function __construct($xml)
    {
        $json = Json::fromXml($xml);
        $array = Json::decode($json, true);
        
        $this->code = $array['code'];
        $this->reference = $array['reference'];
        $this->type = $array['type'];
        $this->status = $array['status'];
        $this->cancellationSource = $array['cancellationSource'];
    }
}

