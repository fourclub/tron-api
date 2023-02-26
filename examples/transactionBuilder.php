<?php
$fullNode = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \fourclub\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\fourclub\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


try {
    $transaction = $tron->getTransactionBuilder()->sendTrx('to', 2, 'fromAddress');
    $signedTransaction = $tron->signTransaction($transaction);
    $response = $tron->sendRawTransaction($signedTransaction);
} catch (\fourclub\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}
