<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfUpdates
{
    public static function fromResponse($data)
    {
        $arrayOfUpdates = array();
        foreach ($data as $update) {
            $arrayOfUpdates[] = Update::fromResponse($update);
        }

        return $arrayOfUpdates;
    }
}
