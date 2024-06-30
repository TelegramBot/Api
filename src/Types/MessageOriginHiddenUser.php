<?php

namespace TelegramBot\Api\Types;

/**
 * Class MessageOriginHiddenUser
 * The message was originally sent by an unknown user.
 *
 * @package TelegramBot\Api\Types
 */
class MessageOriginHiddenUser extends MessageOrigin
{
    protected static $requiredParams = ['type', 'date', 'sender_user_name'];

    protected static $map = [
        'type' => true,
        'date' => true,
        'sender_user_name' => true,
    ];

    protected $senderUserName;

    public function getSenderUserName()
    {
        return $this->senderUserName;
    }

    public function setSenderUserName(User $senderUserName)
    {
        $this->senderUserName = $senderUserName;
    }
}
