<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Contact
 * This object represents a phone contact.
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
    static protected $requiredParams = ['phone_number', 'first_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'phone_number' => true,
        'first_name' => true,
        'last_name' => true,
        'user_id' => true,
        'vcard' => true
    ];

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
     * @var string|null
     */
    protected $lastName;

    /**
     * Optional. Contact's user identifier in Telegram
     *
     * @var int|null
     */
    protected $userId;

    /**
     * Optional. Additional data about the contact in the form of a vCard
     *
     * @var string|null
     */
    protected $vcard;

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Contact
     */
    public function setPhoneNumber(string $phoneNumber): Contact
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Contact
     */
    public function setFirstName(string $firstName): Contact
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Contact
     */
    public function setLastName(string $lastName): Contact
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return Contact
     */
    public function setUserId(int $userId): Contact
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

    /**
     * @param string $vcard
     * @return Contact
     */
    public function setVcard(string $vcard): Contact
    {
        $this->vcard = $vcard;

        return $this;
    }
}
