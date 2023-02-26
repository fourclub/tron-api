<?php
$fullNode = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \fourclub\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \fourclub\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\fourclub\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$balance = $tron->getTransactionBuilder()->contractbalance($tron->getAddress);
foreach ($balance as $key => $item) {
    echo $item["name"] . " (" . $item["symbol"] . ") => " . $item["balance"] . "\n";
}

