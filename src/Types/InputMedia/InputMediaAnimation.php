<?php

namespace TelegramBot\Api\Types\InputMedia;

use TelegramBot\Api\InvalidArgumentException;

/**
 * Class InputMediaAnimation
 * Represents an animation file to be sent.
 *
 * @package TelegramBot\Api\Types
 */
class InputMediaAnimation extends InputMedia
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'media'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'media' => true,
        'thumbnail' => true,
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => true,
        'show_caption_above_media' => true,
        'width' => true,
        'height' => true,
        'duration' => true,
        'has_spoiler' => true
    ];

    /**
     * Type of the result, must be animation
     *
     * @var string
     */
    protected $type = 'animation';

    /**
     * File to send
     *
     * @var string
     */
    protected $media;

    /**
     * Optional. Thumbnail of the file sent
     *
     * @var string|null
     */
    protected $thumbnail;

    /**
     * Optional. Caption of the animation to be sent, 0-1024 characters after entities parsing
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the animation caption
     *
     * @var string|null
     */
    protected $parseMode;

    /**
     * Optional. List of special entities that appear in the caption
     *
     * @var array|null
     */
    protected $captionEntities;

    /**
     * Optional. Pass True, if the caption must be shown above the message media
     *
     * @var bool|null
     */
    protected $showCaptionAboveMedia;

    /**
     * Optional. Animation width
     *
     * @var int|null
     */
    protected $width;

    /**
     * Optional. Animation height
     *
     * @var int|null
     */
    protected $height;

    /**
     * Optional. Animation duration in seconds
     *
     * @var int|null
     */
    protected $duration;

    /**
     * Optional. Pass True if the animation needs to be covered with a spoiler animation
     *
     * @var bool|null
     */
    protected $hasSpoiler;

    /**
     * @param array $data
     * @return static
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

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

    /**
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
    }

    /**
     * @param string $media
     */
    public function setMedia(string $media): void
    {
        $this->media = $media;
    }

    /**
     * @return string|null
     */
    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    /**
     * @param string|null $thumbnail
     */
    public function setThumbnail(?string $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     */
    public function setParseMode(?string $parseMode): void
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return array|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param array|null $captionEntities
     */
    public function setCaptionEntities(?array $captionEntities): void
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->showCaptionAboveMedia;
    }

    /**
     * @param bool|null $showCaptionAboveMedia
     */
    public function setShowCaptionAboveMedia(?bool $showCaptionAboveMedia): void
    {
        $this->showCaptionAboveMedia = $showCaptionAboveMedia;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     */
    public function setWidth(?int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     */
    public function setHeight(?int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     */
    public function setDuration(?int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->hasSpoiler;
    }

    /**
     * @param bool|null $hasSpoiler
     */
    public function setHasSpoiler(?bool $hasSpoiler): void
    {
        $this->hasSpoiler = $hasSpoiler;
    }
}
