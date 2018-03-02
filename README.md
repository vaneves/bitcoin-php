# 🔗 Query to Bitcoin via PHP

## Installing

Via Composer

```bash
composer require vaneves/bitcoin-php
```

## Usage

### Create Address

Creates a new address.

```php
use Vaneves\Bitcoin\Network;
use Vaneves\Bitcoin\Bitcoin;
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
```

### List Transactions

List all transactions received and sent.

```php
use Vaneves\Bitcoin\Network;
use Vaneves\Bitcoin\Bitcoin;
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
```

## License

The MIT License (MIT)

## Donate

Bitcoin address: **1H6ssXbPbLeDVQNf9PqaarTEeG9sjurEgm**

<img src="https://chart.googleapis.com/chart?cht=qr&chs=230x230&chl=1H6ssXbPbLeDVQNf9PqaarTEeG9sjurEgm">