<?php 

namespace Vaneves\Bitcoin;

class Transaction
{
    private $command;

    public function __construct(Network $network)
    {
        $this->command = new Command($network);
    }

    public function paginate($offset, $limit)
    {
        return $this->command->execute('listtransactions', ['*', $limit, $offset, true]);
    }
}