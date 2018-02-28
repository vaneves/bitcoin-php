<?php 

namespace Vaneves\Bitcoin;

class Command
{
    private $network;

    public function __construct(Network $network)
    {
        $this->network = $network;
    }

    public function execute($command, $params = [])
    {
        $params = is_array($params) ? $params : [$params];
        $request = [
            'id' => time() . '-' . rand(100000, 999999),
            'method' => $command,
            'params' => $params
        ];
        
        
        $curl = curl_init($this->network->getScheme() . '://' . $this->network->getHost() . ':' . $this->network->getPort() . '/');
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $this->network->getUser() . ':' . $this->network->getPassword());
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request));
        $raw_result = curl_exec($curl);
        curl_close($curl);

        if(!$raw_result) {
            throw new BitcoinException('The response is empty, check the Bitcoin connection');
        }
        
        $result_array = json_decode($raw_result, true);
        
        if(isset($result_array['error']['message'])) {
            throw new BitcoinException($result_array['error']['message']);
        }

        if(!isset($result_array['result'])) {
            throw new BitcoinException('Result not found');
        }

        $result = $result_array['result'];
        
        return $result;
    }
}