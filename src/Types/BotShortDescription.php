<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class BotShortDescription
 * This object represents the bot's short description.
 *
 * @package TelegramBot\Api\Types
 */
class BotShortDescription extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['short_description'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'short_description' => true
    ];

    /**
     * The bot's short description
     *
     * @var string
     */
    protected $shortDescription;

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }
}
