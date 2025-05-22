<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\InvalidArgumentException;
use TelegramBot\\Api\\TypeInterface;

abstract class StoryAreaType extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    /**
     * @psalm-suppress LessSpecificReturnStatement,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'location':
                return StoryAreaTypeLocation::fromResponse($data);
            case 'suggested_reaction':
                return StoryAreaTypeSuggestedReaction::fromResponse($data);
            case 'link':
                return StoryAreaTypeLink::fromResponse($data);
            case 'weather':
                return StoryAreaTypeWeather::fromResponse($data);
            case 'unique_gift':
                return StoryAreaTypeUniqueGift::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown story area type: ' . $data['type']);
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
