<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class InputProfilePhotoAnimated
 * An animated profile photo in the MPEG4 format.
 */
class InputProfilePhotoAnimated extends InputProfilePhoto
{
    protected static $requiredParams = ['type', 'animation'];

    protected static $map = [
        'type' => true,
        'animation' => true,
        'main_frame_timestamp' => true
    ];

    protected $type = 'animated';
    protected $animation;
    protected $mainFrameTimestamp;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getAnimation()
    {
        return $this->animation;
    }

    public function setAnimation($animation)
    {
        $this->animation = $animation;
    }

    public function getMainFrameTimestamp()
    {
        return $this->mainFrameTimestamp;
    }

    public function setMainFrameTimestamp($ts)
    {
        $this->mainFrameTimestamp = $ts;
    }
}
