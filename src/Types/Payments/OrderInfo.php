<?php

namespace TelegramBot\Api\Types\Payments;

use TelegramBot\Api\BaseType;

/**
 * Class OrderInfo
 * This object represents information about an order.
 *
 * @package TelegramBot\Api\Types\Payments
 */
class OrderInfo extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = [];

    /**
     * @var array
     */
    static protected $map = [
        'name' => true,
        'phone_number' => true,
        'email' => true,
        'shipping_address' => ShippingAddress::class
    ];

    /**
     * Optional. User name
     *
     * @var string
     */
    protected $name;

    /**
     * Optional. User's phone number
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Optional. User email
     *
     * @var string
     */
    protected $email;

    /**
     * Optional. User shipping address
     *
     * @var ShippingAddress
     */
    protected $shippingAddress;

    /**
     * @author MY
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @author MY
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @author MY
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @author MY
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @author MY
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @author MY
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @author MY
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @author MY
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
}
