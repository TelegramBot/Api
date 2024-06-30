<?php

namespace TelegramBot\Api\Types;

/**
 * Class BackgroundTypeWallpaper
 * The background is a wallpaper in the JPEG format.
 *
 * @package TelegramBot\Api\Types
 */
class BackgroundTypeWallpaper extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'document', 'dark_theme_dimming'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'document' => Document::class,
        'dark_theme_dimming' => true,
        'is_blurred' => true,
        'is_moving' => true,
    ];

    /**
     * Document with the wallpaper
     *
     * @var Document
     */
    protected $document;

    /**
     * Dimming of the background in dark themes, as a percentage; 0-100
     *
     * @var int
     */
    protected $darkThemeDimming;

    /**
     * Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
     *
     * @var bool|null
     */
    protected $isBlurred;

    /**
     * Optional. True, if the background moves slightly when the device is tilted
     *
     * @var bool|null
     */
    protected $isMoving;

    /**
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param Document $document
     * @return void
     */
    public function setDocument(Document $document)
    {
        $this->document = $document;
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

    /**
     * @return bool|null
     */
    public function getIsBlurred()
    {
        return $this->isBlurred;
    }

    /**
     * @param bool $isBlurred
     * @return void
     */
    public function setIsBlurred($isBlurred)
    {
        $this->isBlurred = $isBlurred;
    }

    /**
     * @return bool|null
     */
    public function getIsMoving()
    {
        return $this->isMoving;
    }

    /**
     * @param bool $isMoving
     * @return void
     */
    public function setIsMoving($isMoving)
    {
        $this->isMoving = $isMoving;
    }
}
