# PagSeguro
Integration API with PagSeguro

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/adelarcubs/pagseguro/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/adelarcubs/pagseguro/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/adelarcubs/pagseguro/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/adelarcubs/pagseguro/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/adelarcubs/pagseguro/badges/build.png?b=master)](https://scrutinizer-ci.com/g/adelarcubs/pagseguro/build-status/master)

Installation
------------

```bash
composer require adelarcubs/pag-seguro
```

Copy sample config "pag-seguro.local.php.dist" to "pag-seguro.local.php" on your local config


Enable module on "application.config.php"
```
<?php
return array(
    'modules' => array(
        // ...
        'PagSeguro',
    ),
    // ...
);
```

Using
------------
```
use PagSeguro\Model\Checkout;
use PagSeguro\Model\Item;



$pagseguroRequest = $this->getServiceLocator()->get('PagSeguro-PagSeguroRequest');

$checkout = new Checkout();

$checkout->addItem(new Item('001', 'PagSeguro', 1, 123.45));
$checkout->addItem(new Item('002', 'Notebook', 2, 1299));

$this->redirect()->toUrl($pagseguroRequest->getResponse($checkout));
```