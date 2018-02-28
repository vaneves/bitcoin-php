<?php 

namespace Vaneves\Bitcoin;

class Bitcoin
{
    private $network;

    public function __construct(Network $network)
    {
        $this->network = $network;
    }

    public function setNetwork(Network $network)
    {
        $this->network = $network;
    }

    public function account($name)
    {
        return new Account($this->network, $name);
    }

    public function address($address)
    {
        return new Address($this->network, $address);
    }

    public function transaction()
    {
        return new Transaction($this->network);
    }
}