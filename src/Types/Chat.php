<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Chat
 * This object represents a chat.
 *
 * @package TelegramBot\Api\Types
 */
class Chat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['id', 'type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'id' => true,
        'type' => true,
        'title' => true,
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'is_forum' => true,
    ];

    /**
     * Unique identifier for this chat.
     *
     * @var int|float
     */
    protected $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”.
     *
     * @var string
     */
    protected $type;

    /**
     * Optional. Title, for supergroups, channels and group chats.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Optional. Username, for private chats, supergroups and channels if available.
     *
     * @var string|null
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat.
     *
     * @var string|null
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat.
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Optional. True, if the supergroup chat is a forum (has topics enabled).
     *
     * @var bool|null
     */
    protected $isForum;

    /**
     * @return int|float
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return void
     * @throws InvalidArgumentException
     */
    public function setId($id)
    {
        if (is_integer($id) || is_float($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return bool|null
     */
    public function getIsForum()
    {
        return $this->isForum;
    }

    /**
     * @param bool|null $isForum
     */
    public function setIsForum($isForum)
    {
        $this->isForum = $isForum;
    }
}
