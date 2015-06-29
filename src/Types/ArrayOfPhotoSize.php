<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfPhotoSize
{
    public static function fromResponse($data)
    {
        $arrayOfPhotoSize = array();
        foreach ($data as $photoSizeItem) {
            $arrayOfPhotoSize[] = PhotoSize::fromResponse($photoSizeItem);
        }

        return $arrayOfPhotoSize;
    }
}
