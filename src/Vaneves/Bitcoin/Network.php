<?php

namespace Vaneves\Bitcoin;

class Network
{
    private $scheme;
    private $host;
    private $port;
    private $user;
    private $pass;
    
    public function __construct($dsn)
    {
        $components = parse_url($dsn);

        $this->scheme = $components['scheme'];
        $this->host = $components['host'];
        $this->port = $components['port'];
        $this->user = $components['user'];
        $this->pass = $components['pass'];
    }

    public function getScheme()
    {
        return $this->scheme;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->pass;
    }

    public function __toString()
    {
        return sprintf(
            '%s://%s:%s@%s:%s',
            $this->scheme,
            $this->user,
            $this->pass,
            $this->host,
            $this->port
        );
    }
}