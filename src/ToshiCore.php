<?php namespace Cbix;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Class Toshi Core
 * @package Cbix
 */
class ToshiCore implements ToshiInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * retrieves list of latest blocks
     *
     * @throws ToshiException
     * @return string
     */
    public function get_latest_blocks()
    {
        try {
            $response = $this->client->get("blocks");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * retrieves latest block
     *
     * @throws ToshiException
     * @return string
     */
    public function get_latest_block()
    {
        try {
            $response = $this->client->get("blocks/latest");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * retrieves block by hash or height
     * accepts either a block hash or block height as parameter
     * @param mixed $block
     * @throws ToshiException
     * @return string
     */
    public function get_block($block)
    {
        try {
            $response = $this->client->get("blocks/{$block}");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * retrieves block and full transactions list
     * accepts either a block hash or block height as parameter
     * @param mixed $block
     * @throws ToshiException
     * @return string
     */
    public function get_block_transactions($block)
    {
        try {
            $response = $this->client->get("blocks/{$block}/transactions");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * relays a transaction to the network
     * accepts a transaction hash as parameter
     * @param string $hash
     * @throws ToshiException
     * @return string
     */
    public function get_transaction($hash)
    {
        try {
            $response = $this->client->get("transactions/{$hash}");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * retrieves transaction information
     * accepts a signed transaction in hex format
     * @param string $hex
     * @throws ToshiException
     * @return string
     */
    public function relay_transaction($hex)
    {
        try {
            $response = $this->client->put(
                "transactions",
                [
                    'json' => [
                        'hex' => $hex
                    ]
                ]
            );
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * returns a list of unconfirmed transactions
     *
     * @throws ToshiException
     * @return string
     */
    public function unconfirmed_transactions()
    {
        try {
            $response = $this->client->get("transactions/unconfirmed");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * returns address balance and details
     * accepts an address as parameter
     * @param string $address
     * @throws ToshiException
     * @return string
     */
    public function get_address_balance($address)
    {
        try {
            $response = $this->client->get("addresses/{$address}");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * returns address balance and transactions
     * accepts an address as parameter
     * @param string $address
     * @throws ToshiException
     * @return string
     */
    public function get_address_transactions($address)
    {
        try {
            $response = $this->client->get("addresses/{$address}/transactions");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * returns address unspent outputs
     * accepts an address as parameter
     * @param string $address
     * @throws ToshiException
     * @return string
     */
    public function get_address_unspent_outputs($address)
    {
        try {
            $response = $this->client->get("addresses/{$address}/unspent_outputs");
        } catch (RequestException $e) {
            throw new ToshiException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }
}