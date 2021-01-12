<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Contact extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['phone_number', 'first_name'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'phone_number' => true,
        'first_name' => true,
        'last_name' => true,
        'user_id' => true,
        'vcard' => true,
    ];

    /**
     * Contact's phone number
     *
     * @var string
     */
    protected string $phoneNumber;

    /**
     * Contact's first name
     *
     * @var string
     */
    protected string $firstName;

    /**
     * Optional. Contact's last name
     *
     * @var string
     */
    protected string $lastName;

    /**
     * Optional. Contact's user identifier in Telegram
     *
     * @var int
     */
    protected int $userId;

    /**
     * Optional. Additional data about the contact in the form of a vCard
     *
     * @var string
     */
    protected string $vCard;

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
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
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getVCard(): string
    {
        return $this->vCard;
    }

    /**
     * @param string $vCard
     */
    public function setVCard(string $vCard): void
    {
        $this->vCard = $vCard;
    }
}
