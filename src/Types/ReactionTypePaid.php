<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class ReactionTypePaid
 * The reaction is paid.
 */
class ReactionTypePaid extends ReactionType
{
    protected static $map = ['type' => true];
    protected static $requiredParams = ['type'];

    protected $type = 'paid';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }
}
