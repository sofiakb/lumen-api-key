<?php


namespace Sofiakb\Lumen\ApiKey\Services;


/**
 * Class Parser
 * @package Sofiakb\Lumen\ApiKey\Services
 */
class Parser
{
    private Caesar $caesar;

    public function __construct()
    {
        $this->caesar = new Caesar();
    }
    
    /**
     * @param string $key
     * @param null $shift
     * @return string
     */
    public function encode(string $key, $shift = null): string
    {
        return $this->caesar->encrypt($key, $shift);
    }

    /**
     * @param string $encoded
     * @return string
     * @throws \Exception
     */
    public function decode(string $encoded): string
    {
        try {
            return $this->caesar->decrypt($encoded);
        } catch (\Throwable $e) {
            return $encoded;
        }
    }

}