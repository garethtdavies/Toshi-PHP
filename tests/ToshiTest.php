<?php

class ChainTest extends PHPUnit_Framework_TestCase
{
    public function test_make_returns_an_instance_of_chain_core()
    {
        $client = \Cbix\Toshi::make();

        $this->assertInstanceOf('Cbix\ToshiCore', $client);
    }
}