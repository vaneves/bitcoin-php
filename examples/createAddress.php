<?php 

require_once '../src/Vaneves/Bitcoin/Network.php';
require_once '../src/Vaneves/Bitcoin/Bitcoin.php';
require_once '../src/Vaneves/Bitcoin/Account.php';
require_once '../src/Vaneves/Bitcoin/Command.php';
require_once '../src/Vaneves/Bitcoin/BitcoinException.php';

use Vaneves\Bitcoin\Network;
use Vaneves\Bitcoin\Bitcoin;
use Vaneves\Bitcoin\Account;
use Vaneves\Bitcoin\Command;
use Vaneves\Bitcoin\BitcoinException;

try {
    $network = new Network('http://username:password@127.0.0.1:18332');
    $bitcoin = new Bitcoin($network);
    $address = $bitcoin->account('vaneves')->newAddress();

    echo $address; 

} catch (BitcoinException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}