<?php
namespace Via;

interface EnvironmentInterface
{
    /**
     * Set the environment
     *
     * @param $environment String
     **/
    public function set($environment);
    /**
     * Get the environment - default: sandbox
     *
     **/
    public function get();
}
