<?php
namespace Via;

use InvalidArgumentException;
use Via\Credentials\Credentials;
use Via\Credentials\CredentialsInterface;
use Via\Credentials\CredentialProvider;
use Via\Endpoint\EndpointProvider;

class VwsClient implements VwsClientInterface
{
    private $argDefinitions;
    private $config;
    private $credentialProvider;
    private $region;
    private $endpoint;

    public function __construct(array $args)
    {
        $this->argDefinitions = $args;
        $config = $this->resolveArgs();
        $this->credentialProvider = $config['credentials'];
        $this->endpoint = $config['endpoint'];
        $this->config = $config['config'];
        $this->region = isset($config['region']) ? $config['region'] : null;
    }

    private function resolveArgs()
    {
        $args['config'] = [];

        if (!isset($this->argDefinitions['region'])) {
            $message = self::missing_region();
            throw new InvalidArgumentException($message);
        } else {
            $value = $this->argDefinitions['region'];
            if (!is_string($value)) {
                $this->invalid_type('region', ['string'], $value);
            }
        }
        $args['region'] = $this->argDefinitions['region'];

        if (!isset($this->argDefinitions['scheme'])) {
            $args['scheme'] = 'https';
        } else {
            $value = $this->argDefinitions['scheme'];
            if (!is_string($value)) {
                $this->invalid_type('scheme', ['string'], $value);
            } elseif (!in_array($value, ['http', 'https'])) {
                $message = self::invalid_scheme();
                throw new InvalidArgumentException($message);
            }
            $args['scheme'] = $value;
        }


        if (!isset($this->argDefinitions['endpoint'])) {
            $result = EndpointProvider::resolve([
                'region'  => $args['region'],
                'scheme'  => $args['scheme'],
            ]);
            $args['endpoint'] = $result['endpoint'];
        } else {
            $value = $this->argDefinitions['endpoint'];
            self::apply_endpoint($value, $args);
        }

        if (!isset($this->argDefinitions['credentials'])) {
            $message = self::missing_credentials();
            throw new InvalidArgumentException($message);
        }
        $value = $this->argDefinitions['credentials'];
        if ($value instanceof CredentialsInterface) {
            $args['credentials'] = CredentialProvider::fromCredentials($value);
        } elseif (is_array($value)
                && isset($value['userName'])
                && isset($value['password'])
                && isset($value['subscriptionToken'])) {
            $args['credentials'] = CredentialProvider::fromCredentials(
                new Credentials(
                    $value['userName'],
                    $value['password'],
                    $value['subscriptionToken']
                )
            );
        } else {
            $message = self::invalid_type('credentials', [CredentialsInterface::class, 'array'], $value);
            throw new InvalidArgumentException($message);
        }

        return $args;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getCredentials()
    {
        $fn = $this->credentialProvider;

        return $fn();
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Throw when an invalid type is encountered.
     *
     * @param string $name     Name of the value being validated.
     * @param mixed  $provided The provided value.
     *
     * @throws \InvalidArgumentException
     */
    private function invalid_type($name, $expectedType, $provided)
    {
        $expected = implode('|', $expectedType);
        $msg = "Invalid configuration value "
            ."provided for \"{$name}\". Expected {$expected}, but got "
            .describe_type($provided)."";

        throw new InvalidArgumentException($msg);
    }

    private static function apply_endpoint($value, array &$args)
    {
        $parts = parse_url($value);
        if (empty($parts['scheme']) || empty($parts['host'])) {
            throw new InvalidArgumentException(
                'Endpoints must be full URIs and include a scheme and host'
            );
        }

        $args['endpoint'] = $value;
    }

    private static function missing_credentials()
    {
        return <<<EOT
Credentials must be an instance of
Via\Credentials\CredentialsInterface, an associative
array that contains "userName", "password", and "subscriptionToken"
key-value pairs.
EOT;
    }

    private static function missing_region()
    {
        return <<<EOT
A "region" configuration value is required for the Api.
EOT;
    }

    private static function invalid_scheme()
    {
        return <<<EOT
A "scheme" configuration value must be one of those "http" or "https".
EOT;
    }
}
