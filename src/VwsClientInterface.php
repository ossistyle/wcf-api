<?php
namespace Via;

interface VwsClientInterface
{
    public function getConfig();
    public function getCredentials();
    public function getRegion();
    public function getEndpoint();
}
