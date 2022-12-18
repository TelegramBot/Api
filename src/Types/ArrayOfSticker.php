<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfSticker
{
    public static function fromResponse($data)
    {
        $arrayOfStickers = [];
        foreach ($data as $sticker) {
            $arrayOfStickers[] = Sticker::fromResponse($sticker);
        }

        return $arrayOfStickers;
    }
}
