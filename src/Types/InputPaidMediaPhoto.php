<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class InputPaidMediaPhoto
 * The paid media to send is a photo.
 */
class InputPaidMediaPhoto extends InputPaidMedia
{
    protected static $requiredParams = ['type', 'media'];

    protected static $map = [
        'type' => true,
        'media' => true
    ];

    protected $type = 'photo';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
