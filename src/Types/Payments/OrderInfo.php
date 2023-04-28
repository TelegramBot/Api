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
    protected static $requiredParams = [];

    /**
     * @var array
     */
    protected static $map = [
        'name' => true,
        'phone_number' => true,
        'email' => true,
        'shipping_address' => ShippingAddress::class
    ];

    /**
     * Optional. User name
     *
     * @var string|null
     */
    protected $name;

    /**
     * Optional. User's phone number
     *
     * @var string|null
     */
    protected $phoneNumber;

    /**
     * Optional. User email
     *
     * @var string|null
     */
    protected $email;

    /**
     * Optional. User shipping address
     *
     * @var ShippingAddress|null
     */
    protected $shippingAddress;

    /**
     * @author MY
     *
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @author MY
     *
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @author MY
     *
     * @return null|string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @author MY
     *
     * @param string $phoneNumber
     *
     * @return void
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @author MY
     *
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @author MY
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @author MY
     *
     * @return ShippingAddress|null
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @author MY
     *
     * @param ShippingAddress $shippingAddress
     *
     * @return void
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
}
