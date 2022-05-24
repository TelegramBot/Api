<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfUser
{
    /**
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfUsers = [];
        foreach ($data as $user) {
            $arrayOfUsers[] = User::fromResponse($user);
        }

        return $arrayOfUsers;
    }
}
