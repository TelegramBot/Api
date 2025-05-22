<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\InvalidArgumentException;
use TelegramBot\\Api\\TypeInterface;

abstract class InputPaidMedia extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type', 'media'];

    protected static $map = [
        'type' => true,
        'media' => true
    ];

    /**
     * @psalm-suppress LessSpecificReturnType,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'photo':
                return InputPaidMediaPhoto::fromResponse($data);
            case 'video':
                return InputPaidMediaVideo::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown input paid media type: ' . $data['type']);
        }
    }

    protected $type;
    protected $media;

    public function __construct($media = null)
    {
        if ($media !== null) {
            $this->media = $media;
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

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia($media)
    {
        $this->media = $media;
    }
}
