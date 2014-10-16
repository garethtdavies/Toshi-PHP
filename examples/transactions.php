<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Toshi;
use Cbix\ToshiException;

//Setup
$toshi = Toshi::make();

/*
 * Get Transaction
 * Retrieves transaction information.
 */

try {
    $result = $toshi->get_transaction('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098');
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}

/*
 * Relay Transaction
 * Accepts a signed transaction in hex format and sends it to the network
 */

try {
    $result = $toshi->relay_transaction('410496b538e853519c726a2c91e61ec11600ae1390813a627c66fb8be7947be63c52da7589379515d4e0a604f8141781e62294721166bf621e73a82cbf2342c858eeac');
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}

/*
 * Unconfirmed Transactions
 * Returns a list of unconfirmed transactions
 */

try {
    $result = $toshi->unconfirmed_transactions();
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}