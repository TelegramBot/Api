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
    static protected $map = [
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
     * @var string
     */
    protected $width;

    /**
     * Optional. Video height.
     *
     * @var string
     */
    protected $height;

    /**
     * Optional. Video duration.
     *
     * @var string
     */
    protected $duration;

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming.
     *
     * @var bool
     */
    protected $supportsStreaming;

    /**
     * InputMediaVideo constructor.
     *
     * @param string $media
     * @param null $caption
     * @param null $parseMode
     * @param null $width
     * @param null $height
     * @param null $duration
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
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return bool
     */
    public function getSupportsStreaming()
    {
        return $this->supportsStreaming;
    }

    /**
     * @param bool $supportsStreaming
     */
    public function setSupportsStreaming($supportsStreaming)
    {
        $this->supportsStreaming = $supportsStreaming;
    }
}
