<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatBackground
 * This object represents a chat background.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBackground extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => BackgroundType::class,
    ];

    /**
     * Type of the background
     *
     * @var BackgroundType
     */
    protected $type;

    /**
     * @return BackgroundType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param BackgroundType $type
     * @return void
     */
    public function setType(BackgroundType $type)
    {
        $this->type = $type;
    }
}
