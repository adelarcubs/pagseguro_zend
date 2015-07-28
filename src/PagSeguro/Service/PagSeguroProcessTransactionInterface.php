<?php
namespace PagSeguro\Service;

use PagSeguro\Model\Transaction;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
interface PagSeguroProcessTransactionInterface
{

    public function process(Transaction $transaction);
}
