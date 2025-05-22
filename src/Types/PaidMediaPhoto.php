<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class PaidMediaPhoto
 * The paid media is a photo.
 */
class PaidMediaPhoto extends PaidMedia
{
    protected static $requiredParams = ['type', 'photo'];

    protected static $map = [
        'type' => true,
        'photo' => ArrayOfPhotoSize::class
    ];

    protected $type = 'photo';
    protected $photo;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
}
