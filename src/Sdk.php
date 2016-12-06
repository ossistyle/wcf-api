<?php
namespace Via;

class Sdk
{
    const VERSION = '1.0.0beta';

    private $args;

    public function __construct($args)
    {
        $this->args = $args;
    }

    /**
     * Get api client.
     *
     * @return \Via\Client
     **/
    public function getClient()
    {
        return new VwsClient($this->args);
    }
}
