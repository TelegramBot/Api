<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfStickers
{
    public static function fromResponse($data)
    {
        $arrayOfStickers = [];
        foreach ($data as $message) {
            $arrayOfStickers[] = Sticker::fromResponse($message);
        }

        return $arrayOfStickers;
    }
}
