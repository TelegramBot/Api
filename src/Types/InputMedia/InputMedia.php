<?php

namespace TelegramBot\Api\Types\InputMedia;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Collection\CollectionItemInterface;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\InvalidArgumentException;

/**
 * Class InputMedia
 * This object represents the content of a media message to be sent.
 * It should be one of InputMediaAnimation, InputMediaDocument, InputMediaAudio, InputMediaPhoto, InputMediaVideo.
 *
 * @package TelegramBot\Api\Types
 */
class InputMedia extends BaseType implements TypeInterface, CollectionItemInterface
{
    /**
     * @psalm-suppress LessSpecificImplementedReturnType
     *
     * Factory method to create an instance of the appropriate InputMedia subclass based on the type.
     *
     * @param array $data
     * @return InputMediaAnimation|InputMediaDocument|InputMediaAudio|InputMediaPhoto|InputMediaVideo
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        $type = $data['type'];

        switch ($type) {
            case 'animation':
                return InputMediaAnimation::fromResponse($data);
            case 'document':
                return InputMediaDocument::fromResponse($data);
            case 'audio':
                return InputMediaAudio::fromResponse($data);
            case 'photo':
                return InputMediaPhoto::fromResponse($data);
            case 'video':
                return InputMediaVideo::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown media type: ' . $data['type']);
        }
    }
}
