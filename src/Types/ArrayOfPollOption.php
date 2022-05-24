<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfPollOption
{
    /**
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfPollOption = [];
        foreach ($data as $pollOptionItem) {
            $arrayOfPollOption[] = PollOption::fromResponse($pollOptionItem);
        }

        return $arrayOfPollOption;
    }
}
