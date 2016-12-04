<?php
namespace Via;

use Via\Exception\EnvironmentException;

class Environment implements EnvironmentInterface
{
    private $allowedEnvironments = ['live', 'sandbox'];
    private $environment = 'sandbox';
    
    public function __construct()
    {
    }

    /**
     *
     * @throws Via\Exception\EnvironmentException
     **/
    public function set($environment)
    {
        if (!in_array($environment, $this->allowedEnvironments)) {
            throw new EnvironmentException(
                "Environment '{$environment}' is not valid. Use one of those: "
                . implode(', ', self::$allowedEnvironments) . " environments."
            );
        }
        $this->environment = $environment;
    }

    public function get()
    {
        return $this->environment;
    }
}
