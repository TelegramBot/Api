<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class BotDescription
 * This object represents the bot's description.
 *
 * @package TelegramBot\Api\Types
 */
class BotDescription extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['description'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'description' => true
    ];

    /**
     * The bot's description
     *
     * @var string
     */
    protected $description;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
