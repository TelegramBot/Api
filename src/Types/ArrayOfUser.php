<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfUser
{
    /**
     * @param array $data
     * @return User[]
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
