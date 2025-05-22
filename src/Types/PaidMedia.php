<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\InvalidArgumentException;
use TelegramBot\\Api\\TypeInterface;

abstract class PaidMedia extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type'];

    protected static $map = ['type' => true];

    /**
     * @psalm-suppress LessSpecificReturnStatement,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'preview':
                return PaidMediaPreview::fromResponse($data);
            case 'photo':
                return PaidMediaPhoto::fromResponse($data);
            case 'video':
                return PaidMediaVideo::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown paid media type: ' . $data['type']);
        }
    }

    protected $type;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
