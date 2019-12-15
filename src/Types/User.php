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
     * @var string
     */
    protected $lastName;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string
     */
    protected $username;

    /**
     * Optional. IETF language tag of the user's language
     *
     * @var string
     */
    protected $languageCode;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     * @throws InvalidArgumentException
     */
    public function setId($id)
    {
        if (is_integer($id) || is_float($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }

        return $this;
    }



    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param $languageCode
     * @return $this
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBot()
    {
        return $this->isBot;
    }

    /**
     * @param $isBot
     * @return $this
     */
    public function setIsBot($isBot)
    {
        $this->isBot = $isBot;

        return $this;
    }
}
