<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class InputPaidMediaVideo
 * The paid media to send is a video.
 */
class InputPaidMediaVideo extends InputPaidMedia
{
    protected static $requiredParams = ['type', 'media'];

    protected static $map = [
        'type' => true,
        'media' => true,
        'thumbnail' => true,
        'cover' => true,
        'start_timestamp' => true,
        'width' => true,
        'height' => true,
        'duration' => true,
        'supports_streaming' => true
    ];

    protected $type = 'video';
    protected $thumbnail;
    protected $cover;
    protected $startTimestamp;
    protected $width;
    protected $height;
    protected $duration;
    protected $supportsStreaming;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    public function getCover()
    {
        return $this->cover;
    }

    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    public function getStartTimestamp()
    {
        return $this->startTimestamp;
    }

    public function setStartTimestamp($start)
    {
        $this->startTimestamp = $start;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getSupportsStreaming()
    {
        return $this->supportsStreaming;
    }

    public function setSupportsStreaming($supports)
    {
        $this->supportsStreaming = $supports;
    }
}
