<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfPhotoSize
{
    /**
     * @param array $data
     * @return PhotoSize[]
     */
    public static function fromResponse($data)
    {
        $arrayOfPhotoSize = [];
        foreach ($data as $photoSizeItem) {
            $arrayOfPhotoSize[] = PhotoSize::fromResponse($photoSizeItem);
        }

        return $arrayOfPhotoSize;
    }
}
