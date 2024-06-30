<?php

namespace TelegramBot\Api\Types;

/**
 * Class BackgroundTypeFill
 * The background is automatically filled based on the selected colors.
 *
 * @package TelegramBot\Api\Types
 */
class BackgroundTypeFill extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'fill', 'dark_theme_dimming'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'fill' => BackgroundFill::class,
        'dark_theme_dimming' => true,
    ];

    /**
     * The background fill
     *
     * @var BackgroundFill
     */
    protected $fill;

    /**
     * Dimming of the background in dark themes, as a percentage; 0-100
     *
     * @var int
     */
    protected $darkThemeDimming;

    /**
     * @return BackgroundFill
     */
    public function getFill()
    {
        return $this->fill;
    }

    /**
     * @param BackgroundFill $fill
     * @return void
     */
    public function setFill(BackgroundFill $fill)
    {
        $this->fill = $fill;
    }

    /**
     * @return int
     */
    public function getDarkThemeDimming()
    {
        return $this->darkThemeDimming;
    }

    /**
     * @param int $darkThemeDimming
     * @return void
     */
    public function setDarkThemeDimming($darkThemeDimming)
    {
        $this->darkThemeDimming = $darkThemeDimming;
    }
}
