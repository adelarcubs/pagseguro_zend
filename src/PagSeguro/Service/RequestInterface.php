<?php
namespace PagSeguro\Service;

interface RequestInterface
{

    public function __construct($options);

    public function send(ModelInterface $model);
}

