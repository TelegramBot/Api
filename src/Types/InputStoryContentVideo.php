<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class InputStoryContentVideo
 * Describes a video to post as a story.
 */
class InputStoryContentVideo extends InputStoryContent
{
    protected static $requiredParams = ['type', 'video'];

    protected static $map = [
        'type' => true,
        'video' => true,
        'duration' => true,
        'cover_frame_timestamp' => true,
        'is_animation' => true
    ];

    protected $type = 'video';
    protected $video;
    protected $duration;
    protected $coverFrameTimestamp;
    protected $isAnimation;

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

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getCoverFrameTimestamp()
    {
        return $this->coverFrameTimestamp;
    }

    public function setCoverFrameTimestamp($ts)
    {
        $this->coverFrameTimestamp = $ts;
    }

    public function getIsAnimation()
    {
        return $this->isAnimation;
    }

    public function setIsAnimation($isAnimation)
    {
        $this->isAnimation = $isAnimation;
    }
}
