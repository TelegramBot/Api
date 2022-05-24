<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfUpdates
{
    /**
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfUpdates = [];
        foreach ($data as $update) {
            $arrayOfUpdates[] = Update::fromResponse($update);
        }

        return $arrayOfUpdates;
    }
}
