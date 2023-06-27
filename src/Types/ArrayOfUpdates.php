<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfUpdates
{
    /**
     * @param array $data
     * @return Update[]
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
