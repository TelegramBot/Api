<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

abstract class ArrayOfChatBoost
{
    /**
     * @param array $data
     * @return ChatBoost[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $array = [];
        foreach ($data as $datum) {
            $array[] = ChatBoost::fromResponse($datum);
        }

        return $array;
    }
}
