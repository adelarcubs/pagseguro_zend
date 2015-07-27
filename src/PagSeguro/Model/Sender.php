<?php
namespace PagSeguro\Model;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
class Sender
{

    private $email;

    private $name;

    private $bornDate;

    private $areaCode;

    private $number;

    private $cpf;

    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    public function setPhone($areaCode, $number)
    {
        $this->areaCode = $areaCode;
        $this->number = $number;
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
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return the $bornDate
     */
    public function getBornDate()
    {
        return $this->bornDate;
    }

    /**
     *
     * @return the $cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     *
     * @param field_type $bornDate            
     */
    public function setBornDate(\DateTime $bornDate)
    {
        $this->bornDate = $bornDate;
    }

    /**
     *
     * @param field_type $cpf            
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     *
     * @return the $areaCode
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     *
     * @return the $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    public function parseXML()
    {
        $xml = '<sender>';
        $xml .= '<email>' . $this->getEmail() . '</email>';
        $xml .= '<name>' . $this->getName() . '</name>';
        if ($this->getBornDate()) {
            $xml .= '<bornDate>' . $this->getBornDate()->format('d/m/Y') . '</bornDate>';
        }
        
        if ($this->getAreaCode() && $this->getNumber()) {
            $xml .= '<phone>';
            $xml .= '<areaCode>' . $this->getAreaCode() . '</areaCode>';
            $xml .= '<number>' . $this->getNumber() . '</number>';
            $xml .= '</phone>';
        }
        if ($this->getCpf()) {
            $xml .= '<documents>';
            $xml .= '<document>';
            $xml .= '<type>CPF</type>';
            $xml .= '<value>' . $this->getCpf() . '</value>';
            $xml .= '</document>';
            $xml .= '</documents>';
        }
        $xml .= '</sender>';
        return $xml;
    }
}

