<?php
namespace PagSeguro\Service;

/**
 *
 * @author Adelar Tiemann Junior
 *        
 */
interface PagSeguroProcessTransactionInterface
{

    public function process($notificationId, $transaction);
}
