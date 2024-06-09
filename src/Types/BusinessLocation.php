<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class BusinessLocation extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'address' => true,
        'location' => Location::class,
    ];

    /**
     * Address of the business
     *
     * @var string
     */
    protected $address;

    /**
     * Optional. Location of the business
     *
     * @var Location|null
     */
    protected $location;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}
