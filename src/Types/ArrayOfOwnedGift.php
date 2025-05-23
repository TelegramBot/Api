<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

abstract class ArrayOfOwnedGift
{
    /**
     * @param array $data
     * @return OwnedGift[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $array = [];
        foreach ($data as $datum) {
            $array[] = OwnedGift::fromResponse($datum);
        }

        return $array;
    }
}
