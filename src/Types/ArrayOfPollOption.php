<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfPollOption
{
    public static function fromResponse($data)
    {
        $arrayOfPollOption = [];
        foreach ($data as $pollOptionItem) {
            $arrayOfPollOption[] = PollOption::fromResponse($pollOptionItem);
        }

        return $arrayOfPollOption;
    }
}
