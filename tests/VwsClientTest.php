<?php
namespace Via\Test;

use Via\VwsClient;
use Via\Credentials\Credentials;

/**
 * @covers Via\VwsClient
 */
class VwsClientTest extends \PHPUnit_Framework_TestCase
{
    public function testCanResolveArgsWithEndpoint()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token'),
            'region'       => 'sandbox',
            'endpoint'     => 'http://example.com'
        ];

        $client = new VwsClient($config);
        $this->assertSame($config['credentials'], $client->getCredentials()->wait());
        $this->assertEquals($config['region'], $client->getRegion());
        $this->assertEquals('http://example.com', $client->getEndpoint());
    }

    public function testCanResolveArgs()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token'),
            'region'       => 'sandbox'
        ];

        $client = new VwsClient($config);
        $this->assertSame($config['credentials'], $client->getCredentials()->wait());
        $this->assertEquals($config['region'], $client->getRegion());
        $this->assertEquals([], $client->getConfig());
        $this->assertEquals('https://sandboxapi.via.de/publicapi/v1/api.svc', $client->getEndpoint());
    }

    public function testCanResolveArgsWithScheme()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token'),
            'region'       => 'sandbox',
            'scheme'       => 'http'
        ];

        $client = new VwsClient($config);
        $this->assertSame($config['credentials'], $client->getCredentials()->wait());
        $this->assertEquals($config['region'], $client->getRegion());
        $this->assertEquals('http://sandboxapi.via.de/publicapi/v1/api.svc', $client->getEndpoint());
    }

    public function testCanResolveArgsWithCredentialsAsArray()
    {
        $config = [
            'credentials' => [
                'userName' => '16461:viaebay-api-integrationstestAPI',
                'password' => 'HXwGynf_z!JUv@O',
                'subscriptionToken' => '1d9adaf4-ee33-405d-8f29-be72b04fc367'
            ],
            'region'       => 'sandbox',
        ];

        $client = new VwsClient($config);
        $creds = new Credentials(
            $config['credentials']['userName'],
            $config['credentials']['password'],
            $config['credentials']['subscriptionToken']
        );
        $this->assertEquals($creds, $client->getCredentials()->wait());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "region" configuration value is required for the Api.
     */
    public function testEnsureMissingRegionFails()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token')
        ];

        $client = new VwsClient($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp |Credentials must be an instance of?|
     */
    public function testEnsureMissingCredentialsFails()
    {
        $config = [
            'region'  => 'sandbox'
        ];

        $client = new VwsClient($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "credentials". Expected Via\Credentials\CredentialsInterface|array, but got string(3) "foo"
     */
    public function testEnsureInvalidCredentialsTypeFails()
    {
        $config = [
            'credentials'  => 'foo',
            'region'  => 'sandbox'
        ];

        $client = new VwsClient($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "region". Expected string, but got array(0)
     */
    public function testEnsureRegionMustBeString()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token'),
            'region'       => []
        ];

        $client = new VwsClient($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Endpoint must be full URI and include a scheme and host
     */
    public function testEnsureEndpointMustBeUri()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token'),
            'region'       => 'sandbox',
            'endpoint'     => 'example.com'
        ];

        $client = new VwsClient($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "scheme" configuration value must be one of those "http" or "https".
     */
    public function testEnsureInvalidSchemeFails()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token'),
            'region'       => 'sandbox',
            'scheme'       => 'ftp'
        ];

        $client = new VwsClient($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "scheme". Expected string, but got array(0)
     */
    public function testEnsureSchemeMustBeString()
    {
        $config = [
            'credentials'  => new Credentials('user', 'pass', 'token'),
            'region'       => 'sandbox',
            'scheme'       => []
        ];

        $client = new VwsClient($config);
    }
}
