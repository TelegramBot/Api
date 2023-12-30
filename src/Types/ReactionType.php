<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

abstract class ReactionType extends BaseType implements TypeInterface
{
    /**
     * Type of the reaction
     *
     * @var string
     */
    protected $type;

    /**
     * Get the type of the reaction.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type of the reaction.
     *
     * @param string $type
     */
    protected function setType($type)
    {
        $this->type = $type;
    }
}
