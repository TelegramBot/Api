<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfChatMemberEntity
{
    /**
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfChatMemberEntity = [];
        foreach ($data as $chatMemberEntity) {
            $arrayOfChatMemberEntity[] = ChatMember::fromResponse($chatMemberEntity);
        }

        return $arrayOfChatMemberEntity;
    }
}
