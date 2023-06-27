<?php

namespace TelegramBot\Api\Types\InputMedia;

/**
 * Class InputMediaVideo
 * Represents a video to be sent.
 *
 * @package TelegramBot\Api
 */
class InputMediaVideo extends InputMedia
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'media' => true,
        'caption' => true,
        'parse_mode' => true,
        'width' => true,
        'height' => true,
        'duration' => true,
        'supports_streaming' => true
    ];

    /**
     * Optional. Video width.
     *
     * @var int|null
     */
    protected $width;

    /**
     * Optional. Video height.
     *
     * @var int|null
     */
    protected $height;

    /**
     * Optional. Video duration.
     *
     * @var int|null
     */
    protected $duration;

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming.
     *
     * @var bool|null
     */
    protected $supportsStreaming;

    /**
     * InputMediaVideo constructor.
     *
     * @param string $media
     * @param string|null $caption
     * @param string|null $parseMode
     * @param int|null $width
     * @param int|null $height
     * @param int|null $duration
     * @param bool $supportsStreaming
     */
    public function __construct(
        $media,
        $caption = null,
        $parseMode = null,
        $width = null,
        $height = null,
        $duration = null,
        $supportsStreaming = false
    ) {
        $this->type = 'video';
        $this->media = $media;
        $this->caption = $caption;
        $this->parseMode = $parseMode;
        $this->width = $width;
        $this->height = $height;
        $this->duration = $duration;
        $this->supportsStreaming = $supportsStreaming;
    }

    /**
     * @return int|null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return void
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int|null
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return void
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int|null
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     *
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return bool|null
     */
    public function getSupportsStreaming()
    {
        return $this->supportsStreaming;
    }

    /**
     * @param bool|null $supportsStreaming
     *
     * @return void
     */
    public function setSupportsStreaming($supportsStreaming)
    {
        $this->supportsStreaming = $supportsStreaming;
    }
}
