<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfPollOption
{
    /**
     * @param array $data
     * @return PollOption[]
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
