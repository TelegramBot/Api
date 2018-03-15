<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfMessages
{
    public static function fromResponse($data)
    {
        $arrayOfMessages = [];
        foreach ($data as $message) {
            $arrayOfMessages[] = Message::fromResponse($message);
        }

        return $arrayOfMessages;
    }
}
