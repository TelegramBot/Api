<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class VideoChatParticipantsInvited
 * This object represents a service message about new members invited to a video chat.
 *
 * @package TelegramBot\Api\Types
 */
class VideoChatParticipantsInvited extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['users'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'users' => ArrayOfUser::class,
    ];

    /**
     * New members that were invited to the video chat
     *
     * @var array
     */
    protected $users;

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param array $users
     * @return void
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}
