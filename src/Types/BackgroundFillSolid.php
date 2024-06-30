<?php

namespace TelegramBot\Api\Types;

/**
 * Class BackgroundFillSolid
 * The background is filled using the selected color.
 *
 * @package TelegramBot\Api\Types
 */
class BackgroundFillSolid extends BackgroundFill
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'color'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'color' => true,
    ];

    /**
     * The color of the background fill in the RGB24 format
     *
     * @var int
     */
    protected $color;

    /**
     * @return int
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param int $color
     * @return void
     */
    public function setColor($color)
    {
        $this->color = $color;
    }
}
