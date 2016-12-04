<?php

namespace Via\Credentials;

class Credentials implements CredentialsInterface
{
    private $userName;
    private $password;
    private $subscriptionToken;

    /**
     *
     * @return $userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     *
     * @param $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     *
     * @return $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     * @return $subscriptionToken
     */
    public function getSubscriptionToken()
    {
        return $this->subscriptionToken;
    }

    /**
     *
     * @param $subscriptionToken
     */
    public function setSubscriptionToken($subscriptionToken)
    {
        $this->subscriptionToken = $subscriptionToken;
    }
}