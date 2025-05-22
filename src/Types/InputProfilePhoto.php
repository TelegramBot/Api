<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\InvalidArgumentException;
use TelegramBot\\Api\\TypeInterface;

abstract class InputProfilePhoto extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    /**
     * @psalm-suppress LessSpecificReturnType,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'static':
                return InputProfilePhotoStatic::fromResponse($data);
            case 'animated':
                return InputProfilePhotoAnimated::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown input profile photo type: ' . $data['type']);
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
