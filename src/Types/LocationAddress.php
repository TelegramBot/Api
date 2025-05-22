<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class LocationAddress
 * Describes the physical address of a location.
 */
class LocationAddress extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['country_code'];

    protected static $map = [
        'country_code' => true,
        'state' => true,
        'city' => true,
        'street' => true
    ];

    protected $countryCode;
    protected $state;
    protected $city;
    protected $street;

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }
}
