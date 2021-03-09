<?php

namespace TelegramBot\Api\Types\Inline\InputMessageContent;

use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\InputMessageContent;

class Contact extends InputMessageContent implements TypeInterface
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
    protected ?string $lastName;

    /**
     * Optional. Additional data about the contact in the form of a vCard
     *
     * @var string|null
     */
    protected ?string $vCard;

    /**
     * @param string      $phoneNumber
     * @param string      $firstName
     * @param string|null $lastName
     * @param string|null $vCard
     */
    public function __construct(string $phoneNumber, string $firstName, string $lastName = null, string $vCard = null)
    {
        $this->phoneNumber = $phoneNumber;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->vCard = $vCard;
    }

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
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getVCard(): ?string
    {
        return $this->vCard;
    }

    /**
     * @param string|null $vCard
     */
    public function setVCard(?string $vCard): void
    {
        $this->vCard = $vCard;
    }
}
