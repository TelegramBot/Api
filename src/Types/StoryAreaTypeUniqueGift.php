<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class StoryAreaTypeUniqueGift
 * Describes a story area pointing to a unique gift.
 */
class StoryAreaTypeUniqueGift extends StoryAreaType
{
    protected static $requiredParams = ['type', 'name'];

    protected static $map = [
        'type' => true,
        'name' => true
    ];

    protected $type = 'unique_gift';
    protected $name;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
