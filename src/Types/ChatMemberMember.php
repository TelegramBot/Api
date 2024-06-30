<?php

namespace TelegramBot\Api\Types;

class ChatMemberMember extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['status', 'user'];

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }
}
