<?php 

namespace Vaneves\Bitcoin;

class BitcoinException extends \Exception 
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}