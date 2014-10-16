<?php

class ChainCoreTest extends \Guzzle\Tests\GuzzleTestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function test_get_latest_blocks_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_latest_blocks.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_latest_blocks();

        $this->assertCount(2, $result);
    }

    public function test_get_latest_blocks_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_latest_blocks();
    }

    public function test_get_latest_block_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_latest_block.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_latest_block();

        $this->assertEquals('0000000000000000085a5e54dddaaf822e06011b38201082b74bea51ec08727c', $result->hash);
    }

    public function test_get_latest_block_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_latest_block();
    }

    public function test_get_block_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_block.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_block('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');

        $this->assertEquals('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048', $result->hash);
    }

    public function test_get_block_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_block('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');
    }

    public function test_get_block_transactions_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_block_transactions.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_block_transactions('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');

        $this->assertEquals('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048', $result->hash);
    }

    public function test_get_block_transactions_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_block_transactions('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');
    }

    public function test_get_transaction_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_transaction.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_transaction('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098');

        $this->assertEquals('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098', $result->hash);
    }

    public function test_get_transaction_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_transaction('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098');
    }

    public function test_relay_transaction_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/relay_transaction.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->relay_transaction('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098');

        $this->assertEquals('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098', $result->hash);
    }

    public function test_relay_transaction_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->relay_transaction('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098');
    }

    public function test_unconfirmed_transactions_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/unconfirmed_transactions.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->unconfirmed_transactions();

        $this->assertCount(1, $result);
    }

    public function test_unconfirmed_transactions_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->unconfirmed_transactions();
    }

    public function test_get_address_balance_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_address_balance.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_address_balance('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');

        $this->assertEquals('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX', $result->hash);
    }

    public function test_get_address_balance_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_address_balance('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    }

    public function test_get_address_transactions_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_address_transactions.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_address_transactions('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');

        $this->assertEquals('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX', $result->hash);
    }

    public function test_get_address_transactions_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_address_transactions('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    }

    public function test_get_address_unspent_outputs_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/get_address_unspent_outputs.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $result = $toshi->get_address_unspent_outputs('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');

        $this->assertCount(1, $result);
    }

    public function test_get_address_unspent_outputs_throws_an_exception()
    {
        $this->setExpectedException('Cbix\ToshiException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $toshi = new Cbix\ToshiCore($this->client);
        $toshi->get_address_unspent_outputs('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    }
}
