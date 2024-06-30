<?php

namespace TelegramBot\Api\Types;

class ArrayOfChat
{
    /**
     * @param array $data
     * @return Chat[]
     */
    public static function fromResponse($data)
    {
        $array = [];
        foreach ($data as $datum) {
            $array[] = Chat::fromResponse($datum);
        }

        return $array;
    }
}
