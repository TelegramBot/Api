<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class MessageOrigin
 * This object describes the origin of a message.
 *
 * @package TelegramBot\Api\Types
 */
class MessageOrigin extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type', 'date'];

    protected static $map = [
        'type' => true,
        'date' => true,
    ];

    protected $type;
    protected $date;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}
