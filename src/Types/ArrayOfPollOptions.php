<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfPollOptions
{
    public static function fromResponse($data)
    {
        $ArrayOfPollOptions = [];
        foreach ($data as $pollOption) {
            $ArrayOfPollOptions[] = Poll::fromResponse($pollOption);
        }

        return $ArrayOfPollOptions;
    }
}
