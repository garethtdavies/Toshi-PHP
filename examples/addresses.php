<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Toshi;
use Cbix\ToshiException;

//Setup
$toshi = Toshi::make();

/*
 * Get Address Balance
 * Returns address balance and details.
 */

try {
    $result = $toshi->get_address_balance('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}

/*
 * Get Address Transactions
 * Returns address balance and transactions.
 */

try {
    $result = $toshi->get_address_transactions('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}

/*
 * Get Address Unspent Outputs
 * Returns address unspent outputs.
 */

try {
    $result = $toshi->get_address_unspent_outputs('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}