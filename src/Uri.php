<?php
namespace Via;

class Uri implements UriInterface
{
    /**
     * sandbox uri.
     **/
    private $authUriSandbox = 'https://sandboxapi.via.de/Authentication_JSON_AppService.axd/Login';
    private $apiUriSandbox = 'https://sandboxapi.via.de/publicapi/v1/api.svc';
    private $carPartsBulkApiUriSandbox = 'https://sandboxapi.via.de/CarParts';

    /**
     * live uri.
     **/
    private $authUriLive = 'https://ebayapi.via.de/Authentication_JSON_AppService.axd/Login';
    private $apiUriLive = 'https://ebayapi.via.de/publicapi/v1/api.svc';
    private $carPartsApiUriLive = 'https://ebayapi.via.de/CarParts';

    /**
     * Get the uri of the live authorization api.
     *
     * @return $authUriLive String
     **/
    public function getAuthLive()
    {
        return $this->authUriLive;
    }
    /**
     * Get the uri of the sandbox authorization api.
     *
     * @return $authUriSandbox String
     **/
    public static function getAuthSandbox()
    {
        return $this->authUriSandbox;
    }
    /**
     * Get the uri of the live api.
     *
     * @return $apiUriLive String
     **/
    public static function getApiLive()
    {
        return $this->apiUriLive;
    }
    /**
     * Get the uri of the sandbox api.
     *
     * @return $apiUriSandbox String
     **/
    public static function getApiSandbox()
    {
        return $this->apiUriSandbox;
    }
}
