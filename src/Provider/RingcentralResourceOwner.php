<?php

namespace TMannherz\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

/**
 * RingCentral OAuth 2 Resource Owner.
 */
class RingcentralResourceOwner implements ResourceOwnerInterface
{
    /**
     * Raw response
     *
     * @var array
     */
    protected $response;

    /**
     * Creates new resource owner.
     *
     * @param array $response
     */
    public function __construct (array $response = [])
    {
        $this->response = $response;
    }

    /**
     * @return string|null
     */
    public function getId ()
    {
        return $this->response['id'] ?: null;
    }

    /**
     * @return string|null
     */
    public function getMainNumber ()
    {
        return $this->response['mainNumber'] ?: null;
    }

    /**
     * @return string|null
     */
    public function getStatus ()
    {
        return $this->response['status'] ?: null;
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray ()
    {
        return $this->response;
    }

    /**
     * Returns the email of the owner
     *
     * @return string
     */
    public function getEmail()
    {
        return isset($this->response['contact']['email']) ? $this->response['contact']['email'] : '';
    }

    /**
     * Retrieves the name of the owner if it's set
     *
     * @return string
     */
    public function getName()
    {
        return isset($this->response['name']) ? $this->response['name'] : '';
    }
}
