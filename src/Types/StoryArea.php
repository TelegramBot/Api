<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class StoryArea
 * Describes a clickable area on a story media.
 */
class StoryArea extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['position', 'type'];

    protected static $map = [
        'position' => StoryAreaPosition::class,
        'type' => StoryAreaType::class
    ];

    protected $position;
    protected $type;

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
