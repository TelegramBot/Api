<?php

namespace TelegramBot\Api\Types;

/**
 * Class BackgroundTypePattern
 * The background is a PNG or TGV pattern to be combined with the background fill chosen by the user.
 *
 * @package TelegramBot\Api\Types
 */
class BackgroundTypePattern extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'document', 'fill', 'intensity'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'document' => Document::class,
        'fill' => BackgroundFill::class,
        'intensity' => true,
        'is_inverted' => true,
        'is_moving' => true,
    ];

    /**
     * Document with the pattern
     *
     * @var Document
     */
    protected $document;

    /**
     * The background fill that is combined with the pattern
     *
     * @var BackgroundFill
     */
    protected $fill;

    /**
     * Intensity of the pattern when it is shown above the filled background; 0-100
     *
     * @var int
     */
    protected $intensity;

    /**
     * Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in this case. For dark themes only
     *
     * @var bool|null
     */
    protected $isInverted;

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
    public function getIntensity()
    {
        return $this->intensity;
    }

    /**
     * @param int $intensity
     * @return void
     */
    public function setIntensity($intensity)
    {
        $this->intensity = $intensity;
    }

    /**
     * @return bool|null
     */
    public function getIsInverted()
    {
        return $this->isInverted;
    }

    /**
     * @param bool $isInverted
     * @return void
     */
    public function setIsInverted($isInverted)
    {
        $this->isInverted = $isInverted;
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
