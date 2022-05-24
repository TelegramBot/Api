<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfMessages
{
    /**
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfMessages = [];
        foreach ($data as $message) {
            $arrayOfMessages[] = Message::fromResponse($message);
        }

        return $arrayOfMessages;
    }
}
