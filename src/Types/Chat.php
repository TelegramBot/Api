<?php

namespace TelegramBot\Api\Types;

abstract class Chat
{
    public static function fromResponse($data)
    {
        return isset($data['title']) ? GroupChat::fromResponse($data) : User::fromResponse($data);
    }
}
