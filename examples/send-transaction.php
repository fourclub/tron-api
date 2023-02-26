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
} catch (\fourclub\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);