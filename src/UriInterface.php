<?php
namespace Via;

interface UriInterface
{
    public function getAuthLive();
    public function getAuthSandbox();
    public function getApiLive();
    public function getApiSandbox();
}