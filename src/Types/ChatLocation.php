<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class ChatLocation extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['location', 'address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'location' => Location::class,
        'address' => true,
    ];

    /**
     * The location to which the supergroup is connected. Can't be a live location.
     *
     * @var Location
     */
    protected $location;

    /**
     * Location address; 1-64 characters, as defined by the chat owner
     *
     * @var string
     */
    protected $address;

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
}
