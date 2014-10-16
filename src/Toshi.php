<?php namespace Cbix;

use GuzzleHttp\Client;

/**
 * Class Toshi
 * @package Cbix
 */
class Toshi
{
    /**
     * @return ToshiCore
     */
    public static function make()
    {
        $client = new Client([
            'base_url' => ["https://bitcoin.toshi.io/api/{version}/", ['version' => 'v0']],
        ]);

        return new ToshiCore($client);
    }
}