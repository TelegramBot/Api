<?php

namespace TelegramBot\Api\Types;

/**
 * Class BackgroundFillFreeformGradient
 * The background is a freeform gradient that rotates after every message in the chat.
 *
 * @package TelegramBot\Api\Types
 */
class BackgroundFillFreeformGradient extends BackgroundFill
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'colors'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'colors' => true,
    ];

    /**
     * A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     *
     * @var array
     */
    protected $colors;

    /**
     * @return array
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * @param array $colors
     * @return void
     */
    public function setColors($colors)
    {
        $this->colors = $colors;
    }
}
