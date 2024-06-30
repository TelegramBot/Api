<?php
/**
 * Created by PhpStorm.
 * User: iGusev
 * Date: 13/04/16
 * Time: 04:16
 */

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

abstract class ArrayOfMessageEntity
{
    /**
     * @param array $data
     * @return MessageEntity[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfMessageEntity = [];
        foreach ($data as $messageEntity) {
            $arrayOfMessageEntity[] = MessageEntity::fromResponse($messageEntity);
        }

        return $arrayOfMessageEntity;
    }
}
