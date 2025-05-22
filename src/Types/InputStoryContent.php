<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\InvalidArgumentException;
use TelegramBot\\Api\\TypeInterface;

abstract class InputStoryContent extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type', 'photo'];

    /**
     * @psalm-suppress LessSpecificReturnType,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'photo':
                return InputStoryContentPhoto::fromResponse($data);
            case 'video':
                return InputStoryContentVideo::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown input story content type: ' . $data['type']);
        }
    }

    protected $type;
    protected $photo;

    public function __construct($photo = null)
    {
        if ($photo !== null) {
            $this->photo = $photo;
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
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
