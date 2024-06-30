<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class BackgroundType
 * This object describes the type of a background.
 *
 * @package TelegramBot\Api\Types
 */
abstract class BackgroundType extends BaseType implements TypeInterface
{
    /**
     * Type of the background
     *
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
