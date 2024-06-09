<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

abstract class ArrayOfSharedUser
{
    /**
     * @param array $data
     * @return SharedUser[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfSharedUser = [];
        foreach ($data as $datum) {
            $arrayOfSharedUser[] = SharedUser::fromResponse($datum);
        }

        return $arrayOfSharedUser;
    }
}
