<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class BackgroundFill
 * This object describes the way a background is filled based on the selected colors.
 *
 * @package TelegramBot\Api\Types
 */
abstract class BackgroundFill extends BaseType implements TypeInterface
{
    /**
     * Type of the background fill
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
