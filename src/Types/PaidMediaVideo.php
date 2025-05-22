<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class PaidMediaVideo
 * The paid media is a video.
 */
class PaidMediaVideo extends PaidMedia
{
    protected static $requiredParams = ['type', 'video'];

    protected static $map = [
        'type' => true,
        'video' => Video::class
    ];

    protected $type = 'video';
    protected $video;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;
    }
}
