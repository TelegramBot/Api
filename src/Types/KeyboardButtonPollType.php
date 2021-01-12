<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class KeyboardButtonPollType extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = [];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'type' => true
    ];

    /**
     * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is
     * passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
     *
     * @var string
     */
    protected string $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}