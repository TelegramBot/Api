<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class PaidMediaPreview
 * The paid media isn't available before the payment.
 */
class PaidMediaPreview extends PaidMedia
{
    protected static $map = [
        'type' => true,
        'width' => true,
        'height' => true,
        'duration' => true
    ];

    protected static $requiredParams = ['type'];

    protected $type = 'preview';
    protected $width;
    protected $height;
    protected $duration;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
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
}
