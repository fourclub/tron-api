# TRON API

PHP 7.4 API for interacting with the Tron Protocol

---
#### fork https://github.com/iexbase/tron-api
+ added the setFeeLimit() method in PHP 7.4 support 

Example: /examples/send-transaction USDT-TRC20.php

---

## Install

```bash
> composer require fourclub/tron-api
```
## Requirements

The following versions of PHP are supported by this version.

* PHP 7.4

## Example Usage

```php
use fourclub\TronAPI\Tron;
use fourclub\TronAPI\Provider\HttpProvider;
use fourclub\TronAPI\Exception\TronException;

$fullNode = new HttpProvider('https://api.trongrid.io');
$solidityNode = new HttpProvider('https://api.trongrid.io');
$eventServer = new HttpProvider('https://api.trongrid.io');

try {
    $tron = new Tron($fullNode, $solidityNode, $eventServer);
} catch (TronException $e) {
    exit($e->getMessage());
}


$this->setAddress('..');
//Balance
$tron->getBalance(null, true);

// Transfer Trx
var_dump($tron->send('to', 1.5));

//Generate Address
var_dump($tron->createAccount());

//Get Last Blocks
var_dump($tron->getLatestBlocks(2));

//Change account name (only once)
var_dump($tron->changeAccountName('address', 'NewName'));


// Contract
$tron->contract('Contract Address');



```

## Testing

``` bash
$ vendor/bin/phpunit
```
