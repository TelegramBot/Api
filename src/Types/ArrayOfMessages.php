<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfMessages
{
    /**
     * @param array $data
     * @return Message[]
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
