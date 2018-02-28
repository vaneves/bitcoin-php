<?php

require_once '../src/Vaneves/Bitcoin/Network.php';
require_once '../src/Vaneves/Bitcoin/Bitcoin.php';
require_once '../src/Vaneves/Bitcoin/Transaction.php';
require_once '../src/Vaneves/Bitcoin/Command.php';
require_once '../src/Vaneves/Bitcoin/BitcoinException.php';

use Vaneves\Bitcoin\Network;
use Vaneves\Bitcoin\Bitcoin;
use Vaneves\Bitcoin\Transaction;
use Vaneves\Bitcoin\Command;
use Vaneves\Bitcoin\BitcoinException;

try {
    $network = new Network('http://username:password@127.0.0.1:18332');
    $bitcoin = new Bitcoin($network);

    $offset = 0;
    $limit = 100;
    $transactions = $bitcoin->transaction()->paginate($offset, $limit);
    print_r($transactions);
} catch (BitcoinException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}