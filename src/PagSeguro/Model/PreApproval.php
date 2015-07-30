<?php
namespace PagSeguro\Model;

class PreApproval implements ModelInterface
{

    private $charge;

    private $name;

    private $details;

    private $amountPerPayment;

    private $period;

    private $finalDate;

    private $maxTotalAmount;

    public function __construct($charge, $name, $details, $amountPerPayment, $period, $finalDate, $maxTotalAmount)
    {
        $this->charge = $charge;
        $this->name = $name;
        $this->details = $details;
        $this->amountPerPayment = $amountPerPayment;
        $this->period = $period;
        $this->finalDate = $finalDate;
        $this->maxTotalAmount = $maxTotalAmount;
    }

    /**
     *
     * @return the $charge
     */
    public function getCharge()
    {
        return $this->charge;
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
     * @return the $details
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     *
     * @return the $amountPerPayment
     */
    public function getAmountPerPayment()
    {
        return $this->amountPerPayment;
    }

    /**
     *
     * @return the $period
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     *
     * @return the $finalDate
     */
    public function getFinalDate()
    {
        return $this->finalDate;
    }

    /**
     *
     * @return the $maxTotalAmount
     */
    public function getMaxTotalAmount()
    {
        return $this->maxTotalAmount;
    }

    public function parseXML()
    {
        $xml = '<preApproval>';
        $xml .= '<charge>' . $this->getCharge() . '</charge>';
        $xml .= '<name>' . $this->getName() . '</name>';
        $xml .= '<details>' . $this->getDetails() . '</details>';
        $xml .= '<amountPerPayment>' . number_format($this->getAmountPerPayment(), 2) . '</amountPerPayment>';
        $xml .= '<period>' . $this->getPeriod() . '</period>';
        $xml .= '<finalDate>' . $this->getFinalDate() . '</finalDate>';
        $xml .= '<maxTotalAmount>' . number_format($this->getMaxTotalAmount(), 2) . '</maxTotalAmount>';
        $xml .= '</preApproval>';
        return $xml;
    }
}

