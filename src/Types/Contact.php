<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Contact
 * This object represents a sticker.
 *
 * @package TelegramBot\Api\Types
 */
class Contact extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = array('phone_number', 'first_name');

    /**
     * Contact's phone number
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Contact's first name
     *
     * @var string
     */
    protected $firstName;

    /**
     * Optional. Contact's last name
     *
     * @var string
     */
    protected $lastName;

    /**
     * Optional. Contact's user identifier in Telegram
     *
     * @var string
     */
    protected $userId;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new self();

        $instance->setPhoneNumber($data['phone_number']);
        $instance->setFirstName($data['first_name']);

        if (isset($data['last_name'])) {
            $instance->setLastName($data['last_name']);
        }
        if (isset($data['user_id'])) {
            $instance->setUserId($data['user_id']);
        }

        return $instance;
    }
}
