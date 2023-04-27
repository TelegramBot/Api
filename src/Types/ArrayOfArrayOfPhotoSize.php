<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfArrayOfPhotoSize
{
    /**
     * @param array $data
     * @return PhotoSize[][]
     */
    public static function fromResponse($data)
    {
        return array_map(function ($arrayOfPhotoSize) {
            return ArrayOfPhotoSize::fromResponse($arrayOfPhotoSize);
        }, $data);
    }
}
