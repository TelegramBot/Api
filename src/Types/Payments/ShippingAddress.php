<?php

namespace TelegramBot\Api\Types\Payments;

use TelegramBot\Api\BaseType;

/**
 * Class ShippingAddress
 * This object represents a shipping address.
 *
 * @package TelegramBot\Api\Types\Payments
 */
class ShippingAddress extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = ['country_code', 'state', 'city', 'street_line1', 'street_line2', 'post_code'];

    /**
     * @var array
     */
    static protected $map = [
        'country_code' => true,
        'state' => true,
        'city' => true,
        'street_line1' => true,
        'street_line2' => true,
        'post_code' => true,
    ];

    /**
     * ISO 3166-1 alpha-2 country code
     *
     * @var string
     */
    protected $countryCode;

    /**
     * State, if applicable
     *
     * @var string
     */
    protected $state;

    /**
     * City
     *
     * @var string
     */
    protected $city;

    /**
     * First line for the address
     *
     * @var string
     */
    protected $streetLine1;

    /**
     * Second line for the address
     *
     * @var integer
     */
    protected $streetLine2;

    /**
     * Address post code
     *
     * @var integer
     */
    protected $postCode;

    /**
     * @author MY
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @author MY
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @author MY
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @author MY
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @author MY
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @author MY
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @author MY
     * @return string
     */
    public function getStreetLine1()
    {
        return $this->streetLine1;
    }

    /**
     * @author MY
     * @param string $streetLine1
     */
    public function setStreetLine1($streetLine1)
    {
        $this->streetLine1 = $streetLine1;
    }

    /**
     * @author MY
     * @return int
     */
    public function getStreetLine2()
    {
        return $this->streetLine2;
    }

    /**
     * @author MY
     * @param int $streetLine2
     */
    public function setStreetLine2($streetLine2)
    {
        $this->streetLine2 = $streetLine2;
    }

    /**
     * @author MY
     * @return int
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @author MY
     * @param int $postCode
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    }
}
