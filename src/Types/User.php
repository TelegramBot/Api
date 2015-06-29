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
    static protected $requiredParams = array('id', 'first_name');

    /**
     * Unique identifier for this user or bot
     *
     * @var int
     */
    protected $id;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        if (is_integer($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new self();

        $instance->setId($data['id']);
        $instance->setFirstName($data['first_name']);

        if (isset($data['last_name'])) {
            $instance->setLastName($data['last_name']);
        }
        if (isset($data['username'])) {
            $instance->setUsername($data['username']);
        }

        return $instance;
    }
}
