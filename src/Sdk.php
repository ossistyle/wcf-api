<?php
namespace Via;

class Sdk
{
    const VERSION = '0.0.1beta';

    private $args;

    public function __construct($args)
    {
        $this->args = $args;
    }

    /**
     * Get api client.
     *
     * @return \Via\VwsClient
     **/
    public function getClient()
    {
        return new VwsClient($this->args);
    }
}
