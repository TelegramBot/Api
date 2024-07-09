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

    /**
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        $class = match ($data['type']) {
            'user' => MessageOriginUser::class,
            'hidden_user' => MessageOriginHiddenUser::class,
            'chat' => MessageOriginChat::class,
            'channel' => MessageOriginChannel::class,
            default => MessageOrigin::class
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

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
