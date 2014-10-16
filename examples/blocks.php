<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Toshi;
use Cbix\ToshiException;

//Setup
$toshi = Toshi::make();

/*
 * Get Latest Blocks
 * Retrieves list of latest blocks.
 */

try {
    $result = $toshi->get_latest_blocks();
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}

/*
 * Get Latest Block
 * Retrieves latest block.
 */

try {
    $result = $toshi->get_latest_block();
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}

/*
 * Get Block
 * Retrieves block by hash or height.
 */

try {
    $result = $toshi->get_block('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}

/*
 * Get Block Transactions
 * Retrieves latest block and full transactions list.
 */

try {
    $result = $toshi->get_block_transactions('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');
    var_dump($result);
} catch (ToshiException $e) {
    //There was an error more information in $e->getMessage();
    echo "Something went wrong!";
}