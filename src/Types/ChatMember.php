<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

abstract class ChatMember extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['status', 'user'];

    /**
     * Factory method to create a concrete ChatMember instance
     *
     * @param array $data
     * @return ChatMember
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        $status = $data['status'];

        switch ($status) {
            case 'creator':
                return ChatMemberOwner::fromResponse($data);
            case 'administrator':
                return ChatMemberAdministrator::fromResponse($data);
            case 'member':
                return ChatMemberMember::fromResponse($data);
            case 'restricted':
                return ChatMemberRestricted::fromResponse($data);
            case 'left':
                return ChatMemberLeft::fromResponse($data);
            case 'kicked':
                return ChatMemberBanned::fromResponse($data);
            default:
                throw new InvalidArgumentException("Unknown chat member status: $status");
        }
    }

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'status' => true,
        'user' => User::class,
    ];

    /**
     * The member's status in the chat
     *
     * @var string
     */
    protected $status;

    /**
     * Information about the user
     *
     * @var User
     */
    protected $user;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}
