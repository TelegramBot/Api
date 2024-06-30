<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class BusinessConnection
 * Describes the connection of the bot with a business account.
 *
 * @package TelegramBot\Api\Types
 */
class BusinessConnection extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['id', 'user', 'user_chat_id', 'date', 'can_reply', 'is_enabled'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'id' => true,
        'user' => User::class,
        'user_chat_id' => true,
        'date' => true,
        'can_reply' => true,
        'is_enabled' => true
    ];

    /**
     * Unique identifier of the business connection
     *
     * @var string
     */
    protected $id;

    /**
     * Business account user that created the business connection
     *
     * @var User
     */
    protected $user;

    /**
     * Identifier of a private chat with the user who created the business connection
     *
     * @var int
     */
    protected $userChatId;

    /**
     * Date the connection was established in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * True, if the bot can act on behalf of the business account in chats that were active in the last 24 hours
     *
     * @var bool
     */
    protected $canReply;

    /**
     * True, if the connection is active
     *
     * @var bool
     */
    protected $isEnabled;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getUserChatId()
    {
        return $this->userChatId;
    }

    /**
     * @param int $userChatId
     */
    public function setUserChatId($userChatId)
    {
        $this->userChatId = $userChatId;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return bool
     */
    public function getCanReply()
    {
        return $this->canReply;
    }

    /**
     * @param bool $canReply
     */
    public function setCanReply($canReply)
    {
        $this->canReply = $canReply;
    }

    /**
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }
}
