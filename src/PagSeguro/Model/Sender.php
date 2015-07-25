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

    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function toArray()
    {
        return array(
            'email' => $this->getEmail(),
            'name' => $this->getName()
        );
    }
}

