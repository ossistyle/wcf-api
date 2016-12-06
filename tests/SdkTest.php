<?php
namespace Via\Test;

use Via\Sdk;

/**
 * @covers Via\Sdk
 */
class SdkTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatesClients()
    {
        $this->assertInstanceOf(
            'Via\VwsClientInterface',
            (new Sdk)->getClient([
                'region'  => 'sandbox',
                'credentials' => [
                    'userName' => 'user',
                    'password' => 'pass',
                    'subscriptionToken' => 'token'
                ]
            ])
        );
    }
}
