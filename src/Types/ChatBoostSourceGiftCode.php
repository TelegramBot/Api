<?php

namespace TelegramBot\Api\Types;

/**
 * Class ChatBoostSourceGiftCode
 * This object represents a chat boost obtained by the creation of Telegram Premium gift codes to boost a chat.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['source', 'user'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'source' => true,
        'user' => User::class
    ];

    /**
     * Source of the boost, always “gift_code”
     *
     * @var string
     */
    protected $source = 'gift_code';

    /**
     * User for which the gift code was created
     *
     * @var User
     */
    protected $user;

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }
}
