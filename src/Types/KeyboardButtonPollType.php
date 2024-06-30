<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class KeyboardButtonPollType
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 *
 * @package TelegramBot\Api\Types
 */
class KeyboardButtonPollType extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
    ];

    /**
     * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
     * If regular is passed, only regular polls will be allowed.
     * Otherwise, the user will be allowed to create a poll of any type.
     *
     * @var string|null
     */
    protected $type;

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
