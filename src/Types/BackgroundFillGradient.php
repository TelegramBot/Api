<?php

namespace TelegramBot\Api\Types;

class BackgroundFillGradient extends BackgroundFill
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'top_color', 'bottom_color', 'rotation_angle'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'top_color' => true,
        'bottom_color' => true,
        'rotation_angle' => true,
    ];

    /**
     * Top color of the gradient in the RGB24 format
     *
     * @var int
     */
    protected $topColor;

    /**
     * Bottom color of the gradient in the RGB24 format
     *
     * @var int
     */
    protected $bottomColor;

    /**
     * Clockwise rotation angle of the background fill in degrees; 0-359
     *
     * @var int
     */
    protected $rotationAngle;

    /**
     * @return int
     */
    public function getTopColor()
    {
        return $this->topColor;
    }

    /**
     * @param int $topColor
     * @return void
     */
    public function setTopColor($topColor)
    {
        $this->topColor = $topColor;
    }

    /**
     * @return int
     */
    public function getBottomColor()
    {
        return $this->bottomColor;
    }

    /**
     * @param int $bottomColor
     * @return void
     */
    public function setBottomColor($bottomColor)
    {
        $this->bottomColor = $bottomColor;
    }

    /**
     * @return int
     */
    public function getRotationAngle()
    {
        return $this->rotationAngle;
    }

    /**
     * @param int $rotationAngle
     * @return void
     */
    public function setRotationAngle($rotationAngle)
    {
        $this->rotationAngle = $rotationAngle;
    }
}
