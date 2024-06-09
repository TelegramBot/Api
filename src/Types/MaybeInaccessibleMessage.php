<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class MaybeInaccessibleMessage
 * This object describes a message that can be inaccessible to the bot.
 * It can be one of Message or InaccessibleMessage.
 *
 * @package TelegramBot\Api\Types
 */
class MaybeInaccessibleMessage extends BaseType implements TypeInterface
{
    public static function fromResponse($data)
    {
        self::validate($data);
        if (isset($data['message_id'])) {
            return Message::fromResponse($data);
        } else {
            return InaccessibleMessage::fromResponse($data);
        }
    }
}

