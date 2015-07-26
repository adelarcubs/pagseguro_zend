<?php
namespace PagSeguro\Model;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
class Shipping
{

    private $type;

    private $cost;

    private $state;

    private $city;

    private $postalCode;

    private $district;

    private $street;

    private $number;

    private $complement;

    public function __construct($type, $cost)
    {
        $this->type = $type;
        $this->cost = $cost;
    }

    public function setAddress($state, $city, $postalCode, $district, $street, $number, $complement = null)
    {
        $this->state = $state;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->district = $district;
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    /**
     *
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     *
     * @return the $cost
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     *
     * @return the $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     *
     * @return the $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     *
     * @return the $postalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     *
     * @return the $district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     *
     * @return the $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     *
     * @return the $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     *
     * @return the $complement
     */
    public function getComplement()
    {
        return $this->complement;
    }

    public function parseXML()
    {
        $xml = '<shipping>';
        
        $xml .= '<type>' . $this->getType() . '</type>';
        $xml .= '<cost>' . $this->getCost() . '</cost>';
        
        if ($this->getPostalCode()) {
            $xml .= '<address>';
            $xml .= '<country>BRA</country>';
            $xml .= '<state>' . $this->getState() . '</state>';
            $xml .= '<city>' . $this->getCity() . '</city>';
            $xml .= '<postalCode>' . $this->getPostalCode() . '</postalCode>';
            $xml .= '<district>' . $this->getDistrict() . '</district>';
            $xml .= '<street>' . $this->getStreet() . '</street>';
            $xml .= '<number>' . $this->getNumber() . '</number>';
            if ($this->getComplement()) {
                $xml .= '<complement>' . $this->getComplement() . '</complement>';
            }
            $xml .= '</address>';
        }
        
        $xml .= '</shipping>';
        
        return $xml;
    }
}

