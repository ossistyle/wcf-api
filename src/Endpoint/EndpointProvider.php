<?php
namespace Via\Endpoint;

use Via\Exception\UnresolvedEndpointException;

class EndpointProvider
{
    private static $endpoints = [
            'sandbox' => [
                'host' => 'sandboxapi.via.de',
                'path' => 'publicapi/v1/api.svc',
            ],
            'production' => [
                'host' => 'ebayapi.via.de',
                'path' => 'publicapi/v1/api.svc',
            ]
    ];

    /**
     * Resolves and endpoint provider and ensures a non-null return value.
     *
     * @param array $args Endpoint arguments to pass to the provider.
     *
     * @return array
     *
     * @throws UnresolvedEndpointException
     */
    public static function resolve(array $args = [])
    {
        $result = self::buildEndpoint($args);
        if (is_array($result)) {
            return $result;
        }

        throw new UnresolvedEndpointException(
            'Unable to resolve an endpoint using the provider arguments: '
            .json_encode($args).'. Note: you can provide an "endpoint" '
            .'option to a client constructor to bypass invoking an endpoint '
            .'provider.'
        );
    }

    private static function buildEndpoint($args)
    {
        $region = isset($args['region']) ? $args['region'] : '';
        $scheme = isset($args['scheme']) ? $args['scheme'] : '';

        if (isset(self::$endpoints[$region])) {
            $endpoints = self::$endpoints[$region];
            $result['endpoint'] = $scheme .'://'
                .$endpoints['host'] .'/'
                .$endpoints['path'];

            return $result;
        }
        return null;
    }
}
