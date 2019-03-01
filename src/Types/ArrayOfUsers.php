<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfUsers
{
    public static function fromResponse($data)
    {
        $arrayOfUsers = [];
        foreach ($data as $update) {
            $arrayOfUsers[] = User::fromResponse($update);
        }

        return $arrayOfUsers;
    }
}
