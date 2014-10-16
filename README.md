Toshi-PHP
========

[![Build Status](https://travis-ci.org/Digital-Currency-Research/Toshi-PHP.svg)](https://travis-ci.org/Digital-Currency-Research/Toshi-PHP)
[![Code Climate](https://codeclimate.com/github/Digital-Currency-Research/Toshi-PHP/badges/gpa.svg)](https://codeclimate.com/github/Digital-Currency-Research/Toshi-PHP)
[![Test Coverage](https://codeclimate.com/github/Digital-Currency-Research/Toshi-PHP/badges/coverage.svg)](https://codeclimate.com/github/Digital-Currency-Research/Toshi-PHP)

This library provides a simple PHP interface to the [Toshi Bitcoin API](https://toshi.io/).

### Installing via Composer

The recommended way to install the library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add Chain-PHP as a dependency
php composer.phar require cbix/toshi-php:dev-master
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Setup

    $toshi = Toshi::make();

### Blocks

The get_block and get_block_transactions methods accept either a block height or block hash

    $latest_blocks = $toshi->get_latest_blocks();
    $latest_block = $toshi->get_latest_block();
    $block = $toshi->get_block('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');
    $block_transactions = $toshi->get_block_transactions('00000000839a8e6886ab5951d76f411475428afc90947ee320161bbf18eb6048');

### Transactions

    $transaction = $toshi->get_transaction('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098');
    $relay_transaction = $toshi->relay_transaction('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098);
    $unconfirmed_transactions = $toshi->unconfirmed_transactions('0e3e2357e806b6cdb1f70b54c3a3a17b6714ee1f0e68bebb44a74b1efd512098');

### Addresses

    $address_balance = $toshi->get_address_balance('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    $address_transactions = $toshi->get_address_transactions('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');
    $address_unspent_outputs = $toshi->get_address_unspent_outputs('12c6DSiU4Rq3P4ZxziKxzrL5LmMBrzjrJX');

### Exceptions

If there are any issues during the API request a ToshiException will be thrown which can be caught
and managed according to your application needs.

    try {
        $latest_block = $toshi->get_latest_block();
        echo $latest_block->height;
    } catch (ToshiException $e) {
        //There was an error more information in $e->getMessage();
        var_dump($e->getMessage());
    }

### Unit Tests

This library uses PHPUnit for unit testing. In order to run the unit tests, you'll first need
to install the dependencies of the project using Composer: `php composer.phar install --dev`.
You can then run the tests using `vendor/bin/phpunit`. The library comes with a set of mocked responses
from the [Toshi API](https://toshi.io) for running the unit tests.

### Contributions

Patches, bug fixes, feature requests, and pull requests are welcome on the GitHub page for this project.