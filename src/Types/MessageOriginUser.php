<?php

namespace TelegramBot\Api\Types;

/**
 * Class MessageOriginUser
 * The message was originally sent by a known user.
 *
 * @package TelegramBot\Api\Types
 */
class MessageOriginUser extends MessageOrigin
{
    protected static $requiredParams = ['type', 'date', 'sender_user'];

    protected static $map = [
        'type' => true,
        'date' => true,
        'sender_user' => User::class,
    ];

    protected $senderUser;

    public function getSenderUser()
    {
        return $this->senderUser;
    }

    public function setSenderUser(User $senderUser)
    {
        $this->senderUser = $senderUser;
    }
}
