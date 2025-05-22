<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class InputStoryContentPhoto
 * Describes a photo to post as a story.
 */
class InputStoryContentPhoto extends InputStoryContent
{
    protected static $requiredParams = ['type', 'photo'];

    protected static $map = [
        'type' => true,
        'photo' => true
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
