<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class BotName
 * Represents the bot's name.
 */
class BotName extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['name'];

    protected static $map = [
        'name' => true
    ];

    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
