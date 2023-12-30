<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

abstract class ArrayOfMessages
{
    /**
     * @param array $data
     * @return Message[]
     * @throws InvalidArgumentException
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
