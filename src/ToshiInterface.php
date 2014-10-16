<?php namespace Cbix;

/**
 * Interface ToshiCore
 */
interface ToshiInterface
{

    /**
     * retrieves list of latest blocks
     *
     * @return string
     */
    public function get_latest_blocks();

    /**
     * retrieves latest block
     *
     * @return string
     */
    public function get_latest_block();

    /**
     * retrieves block by hash or height
     * accepts either a block hash or block height as parameter
     * @param mixed $block
     * @return string
     */
    public function get_block($block);

    /**
     * retrieves block and full transactions list
     * accepts either a block hash or block height as parameter
     * @param mixed $block
     * @return string
     */
    public function get_block_transactions($block);

    /**
     * relays a transaction to the network
     * accepts a transaction hash as parameter
     * @param string $hash
     * @return string
     */
    public function get_transaction($hash);

    /**
     * retrieves transaction information
     * accepts a signed transaction in hex format
     * @param string $hex
     * @return string
     */
    public function relay_transaction($hex);

    /**
     * returns a list of unconfirmed transactions
     *
     * @return string
     */
    public function unconfirmed_transactions();

    /**
     * returns address balance and details
     * accepts an address as parameter
     * @param string $address
     * @return string
     */
    public function get_address_balance($address);

    /**
     * returns address balance and transactions
     * accepts an address as parameter
     * @param string $address
     * @return string
     */
    public function get_address_transactions($address);

    /**
     * returns address unspent outputs
     * accepts an address as parameter
     * @param string $address
     * @return string
     */
    public function get_address_unspent_outputs($address);
}