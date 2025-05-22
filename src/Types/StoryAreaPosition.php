<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class StoryAreaPosition
 * Describes the position of a clickable area within a story.
 */
class StoryAreaPosition extends BaseType implements TypeInterface
{
    protected static $requiredParams = [
        'x_percentage',
        'y_percentage',
        'width_percentage',
        'height_percentage',
        'rotation_angle',
        'corner_radius_percentage'
    ];

    protected static $map = [
        'x_percentage' => true,
        'y_percentage' => true,
        'width_percentage' => true,
        'height_percentage' => true,
        'rotation_angle' => true,
        'corner_radius_percentage' => true
    ];

    protected $xPercentage;
    protected $yPercentage;
    protected $widthPercentage;
    protected $heightPercentage;
    protected $rotationAngle;
    protected $cornerRadiusPercentage;

    public function getXPercentage()
    {
        return $this->xPercentage;
    }

    public function setXPercentage($xPercentage)
    {
        $this->xPercentage = $xPercentage;
    }

    public function getYPercentage()
    {
        return $this->yPercentage;
    }

    public function setYPercentage($yPercentage)
    {
        $this->yPercentage = $yPercentage;
    }

    public function getWidthPercentage()
    {
        return $this->widthPercentage;
    }

    public function setWidthPercentage($widthPercentage)
    {
        $this->widthPercentage = $widthPercentage;
    }

    public function getHeightPercentage()
    {
        return $this->heightPercentage;
    }

    public function setHeightPercentage($heightPercentage)
    {
        $this->heightPercentage = $heightPercentage;
    }

    public function getRotationAngle()
    {
        return $this->rotationAngle;
    }

    public function setRotationAngle($rotationAngle)
    {
        $this->rotationAngle = $rotationAngle;
    }

    public function getCornerRadiusPercentage()
    {
        return $this->cornerRadiusPercentage;
    }

    public function setCornerRadiusPercentage($cornerRadiusPercentage)
    {
        $this->cornerRadiusPercentage = $cornerRadiusPercentage;
    }
}
