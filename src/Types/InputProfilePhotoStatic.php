<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class InputProfilePhotoStatic
 * A static profile photo in the .JPG format.
 */
class InputProfilePhotoStatic extends InputProfilePhoto
{
    protected static $requiredParams = ['type', 'photo'];

    protected static $map = [
        'type' => true,
        'photo' => true
    ];

    protected $type = 'static';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
