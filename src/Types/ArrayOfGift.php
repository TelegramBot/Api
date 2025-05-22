<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

abstract class ArrayOfGift
{
    /**
     * @param array $data
     * @return Gift[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $array = [];
        foreach ($data as $datum) {
            $array[] = Gift::fromResponse($datum);
        }

        return $array;
    }
}
