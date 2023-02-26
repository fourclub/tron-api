<?php
include_once '../vendor/autoload.php';

$fullNode = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \fourclub\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\fourclub\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$tron->setAddress('address');
$tron->setPrivateKey('privateKey');

try {
    $transfer = $tron->send('ToAddress', 1);
    $transfer = $tron
        ->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t')    // tether contract address
        ->setFeeLimit(15);                                  // fee limit 15 trx o more AND
    // send "USDT amount" to " USDT address"
    $result = $transfer->transfer('address To', 'USDT amount');
} catch (\fourclub\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);