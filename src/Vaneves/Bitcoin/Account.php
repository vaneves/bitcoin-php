<?php 

namespace Vaneves\Bitcoin;

class Account
{
    private $command;
    private $name;

    public function __construct(Network $network, $name)
    {
        $this->command = new Command($network);
        $this->name = $name;
    }

    public function newAddress()
    {
        return $this->command->execute('getnewaddress', $this->name);
    }
}