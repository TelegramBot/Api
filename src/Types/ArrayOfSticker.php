<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfSticker
{
    /**
     * @param array $data
     * @return Sticker[]
     */
    public static function fromResponse($data)
    {
        $arrayOfStickers = [];
        foreach ($data as $sticker) {
            $arrayOfStickers[] = Sticker::fromResponse($sticker);
        }

        return $arrayOfStickers;
    }
}
