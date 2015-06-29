<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfPhotoSize extends \ArrayObject
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