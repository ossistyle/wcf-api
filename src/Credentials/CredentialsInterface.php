<?php
namespace Via\Credentials;

interface CredentialsInterface
{
    public function getUserName();
    public function setUserName($username);
    public function getPassword();
    public function setPassword($password);
    public function getSubscriptionToken();
    public function setSubscriptionToken($subscriptionToken);
}
