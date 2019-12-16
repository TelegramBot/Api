<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class User
 * This object represents a Telegram user or bot.
 *
 * @package TelegramBot\Api\Types
 */
class User extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['id', 'first_name', 'is_bot'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'id' => true,
        'is_bot' => true,
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'language_code' => true,
    ];

    /**
     * Unique identifier for this user or bot
     *
     * @var int
     */
    protected $id;

    /**
     * True, if this user is a bot
     *
     * @var bool
     */
    protected $isBot;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    protected $firstName;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string|null
     */
    protected $username;

    /**
     * Optional. IETF language tag of the user's language
     *
     * @var string|null
     */
    protected $languageCode;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     * @throws InvalidArgumentException
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        
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
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param $username
     * @return User
     */
    public function setUsername($username): User
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     * @return $this
     */
    public function setLanguageCode(string $languageCode)
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsBot(): ?bool
    {
        return $this->isBot;
    }

    /**
     * @param bool $isBot
     * @return User
     */
    public function setIsBot(bool $isBot): User
    {
        $this->isBot = $isBot;

        return $this;
    }
}
